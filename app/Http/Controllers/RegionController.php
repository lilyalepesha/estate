<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.regions.index', ['regions' => Region::query()->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request)
    {
        $region = Region::query()->create($request->validated());

        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/regions/', $request->file('image'), $name);

        $region->update([
            'image_url' => 'regions/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', ['region' => $region]);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRegionRequest $request
     * @param Region $region
     * @return RedirectResponse
     */
    public function update(UpdateRegionRequest $request, Region $region): RedirectResponse
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/regions/', $request->file('image'), $name);

        $region->update([
            'name' => $request->string('name'),
            'street' => $request->string('street'),
            'image_url' => 'regions/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     * @param Region $region
     * @return RedirectResponse
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('admin.index')->with('success', 'Успешно удалён');
    }
}
