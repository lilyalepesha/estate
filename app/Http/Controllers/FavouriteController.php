<?php

namespace App\Http\Controllers;

use App\Enums\FavouriteType;
use App\Enums\ObjectEnum;
use App\Enums\UserTypeEnum;
use App\Models\Estate;
use App\Models\ObjectImage;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use SebastianBergmann\Type\ObjectType;

class FavouriteController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check()) {
            $objects = Estate::query()
                ->selectRaw(
                    '
                    estates.id as id,
                    estates.total_area as area,
                    estates.price as price'
                )->join('regions', 'regions.id', '=', 'estates.region_id')
                ->join('users', 'users.id', '=', 'estates.user_id')
                ->where('users.id', '=', auth()->id())
                ->join('favourites', 'users.id', '=', 'favourites.user_id')
                ->where('favourites.favourite_type', '=', FavouriteType::ESTATE->value)
                ->where('favourites.user_type', '=', UserTypeEnum::USER->value)
                ->get();

            $objects->transform(function ($item) {
                $images = ObjectImage::query()
                    ->where('type', '=', ObjectEnum::ESTATE->value)
                    ->where('object_id', '=', $item?->id)
                    ->first();

                if (empty($images)) {
                    $item->setAttribute('image_url', asset('images/default/images.png'));
                } else {
                    $item->setAttribute('image_url', asset('storage/' . $images->url));
                }

                return $item;
            });
        } else {
            $objects = Project::query()
                ->selectRaw(
                    '
                    projects.id as id,
                    projects.area as area,
                    projects.price_per_meter as price'
                )
                ->join('users', 'users.id', '=', 'estates.user_id')
                ->where('users.id', '=', auth()->id())
                ->join('favourites', 'users.id', '=', 'favourites.user_id')
                ->where('favourites.favourite_type', '=', FavouriteType::PROJECT->value)
                ->where('favourites.user_type', '=', UserTypeEnum::ARCHITECT->value)
                ->get();

            $objects->transform(function ($item) {
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
        }

        return view('favourite', [
            'objects' => $objects->paginate(30),
        ]);
    }
}
