<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ObjectEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstateRequest;
use App\Http\Requests\UpdateEstateRequest;
use App\Models\Estate;
use App\Models\EstateProperty;
use App\Models\ObjectImage;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.estate.index', [
            'estates' => Estate::query()->when(Auth::user()->role == RoleEnum::REGISTERED->value,
                fn(Builder $query) => $query->where('user_id', '=', Auth::id()))
                ->with('region')
                ->paginate(30),
            'properties' => Property::query()->pluck('value'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.estate.create', [
            'properties' => Property::query()->pluck('value')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstateRequest $request): RedirectResponse
    {
        $estate = Estate::query()->create($request->validated());

        if (!empty($request->images)) {
            foreach ($request->images as $image) {
                $name = Str::uuid() . '.' . $image->extension();

                Storage::putFileAs('public/projects/', $image, $name);

                ObjectImage::query()->create([
                    'type' => ObjectEnum::ESTATE->value,
                    'url' => 'projects/' . $name,
                    'object_id' => $estate->id,
                ]);
            }
        }

        if (!empty($request->properties)) {
            foreach ($request->properties as $property) {
                $property = Property::query()
                    ->firstWhere('value', '=', $property)
                    ->value('id');

                EstateProperty::query()->create([
                    'property_id' => $property,
                    'estate_id' => $estate->id
                ]);
            }
        }

        return redirect()->route('admin.index')->with('success', 'Успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estate $estate)
    {
        return view('admin.estate.edit', [
            'properties' => Property::query()->pluck('value'),
            'estate' => $estate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstateRequest $request, Estate $estate): RedirectResponse
    {
        $estate->update($request->validated());

        if (!empty($request->images)) {
            foreach ($request->images as $image) {
                $name = Str::uuid() . '.' . $image->extension();

                Storage::putFileAs('public/projects/', $image, $name);

                ObjectImage::query()->create([
                    'type' => ObjectEnum::ESTATE->value,
                    'url' => 'projects/' . $name,
                    'object_id' => $estate->id,
                ]);
            }
        }

        if (!empty($request->properties)) {
            foreach ($request->properties as $property) {
                $property = Property::query()
                    ->firstWhere('value', '=', $property)
                    ->value('id');

                EstateProperty::query()->create([
                    'property_id' => $property,
                    'estate_id' => $estate->id
                ]);
            }
        }

        return redirect()->route('admin.index')->with('success', 'Успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estate $estate): RedirectResponse
    {
        $estate->delete();

        return redirect()->route('admin.index')->with('success', 'Успешно удалён');
    }
}
