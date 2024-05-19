<?php

namespace App\Http\Controllers;

use App\Enums\FavouriteType;
use App\Enums\ObjectEnum;
use App\Enums\UserTypeEnum;
use App\Models\ObjectImage;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class GoodsController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function index(Request $request): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $projects = Project::query()
            ->selectRaw(
                '
                    projects.id as id,
                    projects.area as area,
                    projects.price_per_meter as price'
            )
            ->when(\request()->filled('name'),
                fn(Builder $query) => $query->where('projects.name', 'like', '%' . \request()->input('name') . '%'))
            ->when(request()->filled('type'),
                fn(Builder $query) => $query->where('type', '=', request()->integer('type'))
            )->get();

        $projects->transform(function ($item) {
            $images = ObjectImage::query()
                ->where('type', '=', ObjectEnum::PROJECT->value)
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

        return view('goods', [
            'projects' => $projects->paginate(30),
            'userType' => $userType,
            'favouriteType' => FavouriteType::PROJECT->value
        ]);
    }

    /**
     * @var int
     */
    private int $limit = 8;

    /**
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\View\View
     */
    public function view(int $id)
    {
        try {
            $project = Project::query()->firstWhere('id', '=', $id);

            $images = ObjectImage::query()
                ->where('object_id', '=', $project?->id)
                ->where('type', '=', ObjectEnum::PROJECT->value)
                ->limit($this->limit)
                ->pluck('url');

            $items = collect();
            $imagesCount = $images->count();

            if ($imagesCount < $this->limit) {
                for ($i = 0; $i < $this->limit - $imagesCount; $i++) {
                    $images->push(asset('images/default/images.png'));
                }
            }

            $project->setAttribute('main_image', asset('storage/' . $images->first()));
            $images = $images->skip(1);

            $images->transform(function ($url) use ($project, &$items, $images) {
                $items->push(Str::contains($url, 'default') ? $url : asset('storage/' . $url));
            });

            $smallImages = $items->slice(0, min(3, $imagesCount));
            $bigImages = $items->slice(3);

            $project->setAttribute('small_images', $smallImages);
            $project->setAttribute('big_images', $bigImages);

            $properties = ObjectImage::query()
                ->where('type', '=', ObjectEnum::PROJECT->value)
                ->where('object_id', '=', $project->id)
                ->pluck('value');

            return view('goods.view', compact('project', 'properties'));
        } catch (\Throwable $e) {
            return redirect()->route('main');
        }
    }
}
