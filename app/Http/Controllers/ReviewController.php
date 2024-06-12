<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Models\Architect;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class ReviewController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->back()->with('danger', 'Авторизуйтесь!');
        }

        $architect = Architect::query()
            ->with('projects')
            ->whereKey($request->integer('architect_id'))
            ->first();

        $ids = $architect->projects->pluck('id')->toArray();

        if (Order::query()->where([
            'user_id' => Auth::id(),
        ])->whereIn('project_id', $ids)
            ->doesntExist()
        ) {
            return redirect()->back()->with('danger', 'Закажите что-то, чтобы оставить комментарий!');
        }

        Review::query()->create($request->validated());

        return redirect()->back()->with('success', 'Спасибо что оставили отзыв!');
    }
}
