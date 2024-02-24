<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class GoodsController extends Controller
{
    public function goods(Request $request)
    {
        try {
            $regions = Project::query()
                ->selectRaw(
                    'projects.area as area,
                     projects.price_per_meter as price,
                     regions.name as region_name,
                     regions.street as street,
                     projects.image_url as image_url'
                )
                ->join('regions', 'projects.region_id', '=', 'regions.id')
                ->when($request->filled('type'),
                    fn(Builder $query) => $query->where('type', '=', $request->integer('type'))
                )->when($request->filled('region'),
                    fn(Builder $query) => $query->where('region_id', '=', $request->integer('region'))
                )->get();

            $regions = $regions->map(function ($item) {
                $item->image_url = asset('storage/' . $item->image_url);
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
}
