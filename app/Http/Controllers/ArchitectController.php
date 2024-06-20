<?php

namespace App\Http\Controllers;

use App\Enums\ObjectEnum;
use App\Models\Architect;
use App\Models\ObjectImage;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchitectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('architect.index', [
            'architects' => Architect::query()
                ->leftJoinSub(
                    Review::query()->select('architect_id', DB::raw('AVG(rating) as avg_rating'))
                        ->groupBy('architect_id'),
                    'reviews',
                    'architects.id',
                    'reviews.architect_id'
                )
                ->select('architects.*', 'reviews.avg_rating')
                ->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $projects = Project::query()->where('architect_id', '=', $id)->get();

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

            return $item;
        });

        return view('architect.show', [
            'architect' => Architect::query()->whereKey($id)->first(),
            'projects' => $projects->paginate(20),
            'comments' => Review::query()
                ->where('architect_id', '=', $id)
                ->paginate(20),
            'rating' => Review::query()
                ->where('architect_id', '=', $id)
                ->pluck('rating')
                ->avg()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
