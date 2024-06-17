<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class GoodsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function goods(Request $request): JsonResponse
    {
        try {
            $regions = Project::query()
                ->selectRaw(
                    '
                    projects.is_favourite as is_favourite,
                    projects.id as id,
                    projects.area as area,
                    projects.price as price,
                    regions.name as region_name,
                    regions.street as street'
                )
                ->when($request->filled('type'),
                    fn(Builder $query) => $query->where('type', '=', $request->integer('type'))
                )->when($request->filled('region'),
                    fn(Builder $query) => $query->where('region_id', '=', $request->integer('region'))
                )->get();

            $regions = $regions->transform(function ($item) {
                $images = ProjectImage::query()->firstWhere('project_id', '=', $item?->id);

                if (empty($images)) {
                    $item->setAttribute('image_url', asset('images/default/images.png'));
                } else {
                    $item->setAttribute('image_url', asset('storage/' . $images->url));
                }

                $item->is_architect = auth()->guard('architects')->check();
                return $item;
            });

            return response()->json([
                'success' => true,
                'data' => $regions
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateFavorite(Request $request): JsonResponse
    {
        try {
            if (
                $request->filled('user_type')
                && $request->filled('favourite_id')
                && $request->filled('user_id')
            ) {
                $favourite = Favourite::query()
                    ->where('user_type', $request->string('user_type'))
                    ->where('estate_id', $request->integer('favourite_id'))
                    ->where('user_id', $request->integer('user_id'))
                    ->first();

                if ($favourite) {
                    $favourite->delete();
                    return response()->json([
                       'success' => false,
                       'message' => 'Already exists'
                    ]);
                } else {
                    Favourite::query()->create([
                        'user_type' => $request->string('user_type'),
                        'estate_id' => $request->integer('favourite_id'),
                        'user_id' => $request->integer('user_id'),
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'data' => true
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check(Request $request): JsonResponse
    {
        try {
            if (
                $request->filled('user_type')
                && $request->filled('favourite_type')
                && $request->filled('favourite_id')
                && $request->filled('user_id')
            ) {
                $favourite = Favourite::query()
                    ->where('user_type', $request->string('user_type'))
                    ->where('estate_id', $request->integer('favourite_id'))
                    ->where('user_id', $request->integer('user_id'))
                    ->exists();
            }

            return response()->json([
                'success' => true,
                'data' => $favourite
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
