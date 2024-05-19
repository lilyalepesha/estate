<?php

namespace App\Http\Controllers\Api;

use App\Enums\FavouriteType;
use App\Enums\ObjectEnum;
use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\EstateProperty;
use App\Models\ObjectImage;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class EstateController extends Controller
{
    public function index(Request $request)
    {
        $estates = Estate::query()
            ->selectRaw(
                '
                    estates.id as id,
                    estates.total_area as area,
                    estates.price as price'
            )->join('regions', 'regions.id', '=', 'estates.region_id')
            ->when(\request()->filled('area'),
                fn(Builder $query) => $query->where('regions.area', '=', $request->string('area')))
            ->when(\request()->filled('region'),
                fn(Builder $query) => $query->where('regions.name', '=', $request->string('region')))
            ->when(request()->filled('type'),
                fn(Builder $query) => $query->where('type', '=', request()->integer('type'))
            )->get();

        $estates->transform(function ($item) {
            $images = ObjectImage::query()
                ->where('type', '=', ObjectEnum::ESTATE->value)
                ->where('object_id', '=', $item?->id)
                ->first();

            if (empty($images)) {
                $item->setAttribute('image_url', asset('images/default/images.png'));
            } else {
                $item->setAttribute('image_url', asset('storage/' . $images->url));
            }

            $item->is_architect = auth()->guard('architects')->check();
            return $item;
        });

        $userType = UserTypeEnum::USER->value;

        if (auth()->guard('architects')->check()) {
            $userType = UserTypeEnum::ARCHITECT->value;
        }

        return view('estate', [
            'estates' => $estates->paginate(30),
            'userType' => $userType,
            'favouriteType' => FavouriteType::ESTATE->value
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse
    {
        try {
            $query = Project::query()
                ->selectRaw(
                    'regions.name as region_name,
                    regions.street as region_street,
                    projects.price_per_meter as price,
                    projects.area as area,
                    projects.id as project_id'
                )
                ->join('regions', 'projects.region_id', '=', 'regions.id');

            if (!empty($request->input('show-more'))) {
                $data = $query->get();
            } else {
                $data = $query->limit(6)->get();
            }

            $data = $data->map(function (?Project $item) {
                $images = ObjectImage::query()->firstWhere('project_id','=', $item?->project_id);

                if (empty($images)) {
                    $item->setAttribute('image_url', asset('images/default/images.png'));
                } else {
                    $item->setAttribute('image_url',  asset('storage/' . $images->url));
                }

                return $item;
            });

            return response()->json([
                'success' => true,
                'message' => $data
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function view(int $id)
    {
        try {
            $project = Estate::query()
                ->firstWhere('id', '=', $id);

            $images = ObjectImage::query()
                ->where('object_id', '=', $project?->id)
                ->where('type', '=', ObjectEnum::ESTATE->value)
                ->limit(8)
                ->pluck('url');

            $items = collect();
            $imagesCount = $images->count();

            $project->setAttribute('main_image', asset('storage/' . $images->first()));
            $images = $images->skip(1);

            $images->transform(function ($url) use ($project, &$items, $images) {
                $items->push(Str::contains($url, 'default') ? $url : asset('storage/' . $url));
            });

            $smallImages = $items->slice(0, min(3, $imagesCount));
            $bigImages = $items->slice(3);

            $project->setAttribute('small_images', $smallImages);
            $project->setAttribute('big_images', $bigImages);

            $properties = EstateProperty::query()
                ->with('property')
                ->where('estate_id', '=', $project->id)
                ->get();

            return view('estate.view', [
                'project' => $project,
                'properties' => $properties
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('main');
        }
    }
}
