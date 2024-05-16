<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectProperty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

final class GoodsController extends Controller
{
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

            $images = ProjectImage::query()
                ->where('project_id', '=', $project?->id)
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

            $properties = ProjectProperty::query()
                ->where('project_id', '=', $project->id)
                ->pluck('value');

            return view('goods.view', compact('project', 'properties'));
        } catch (\Throwable $e) {
            return redirect()->route('main');
        }
    }
}
