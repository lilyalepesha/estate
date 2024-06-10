<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

final class ReviewController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Review::query()->create($request->validated());

        return redirect()->back()->with('success', 'Спасибо что оставили отзыв!');
    }
}
