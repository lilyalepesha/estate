<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstateController extends Controller
{
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
                $images = ProjectImage::query()->firstWhere('project_id','=', $item?->project_id);

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
}
