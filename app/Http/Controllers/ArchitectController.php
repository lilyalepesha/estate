<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArchitectRequest;
use App\Http\Requests\UpdateArchitectRequest;
use App\Models\Architect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchitectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.architects.index', ['architects' => Architect::query()->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.architects.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreArchitectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreArchitectRequest $request)
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/architects/avatars/', $request->file('image'), $name);

        Architect::query()->create([
            'name' => $request->string('name'),
            'last_name' => $request->string('last_name'),
            'father_name' => $request->string('father_name'),
            'description' => $request->string('description'),
            'email' => $request->string('email'),
            'password' => $request->string('password'),
            'experience' => $request->string('experience'),
            'verified' => $request->boolean('verified'),
            'avatar_url' => 'architects/avatars/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Architect $architect)
    {
        return view('admin.architects.edit', ['architect' => $architect]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArchitectRequest $request, Architect $architect)
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/architects/avatars/', $request->file('image'), $name);

        $architect->update([
            'name' => $request->string('name'),
            'last_name' => $request->string('last_name'),
            'father_name' => $request->string('father_name'),
            'description' => $request->string('description'),
            'email' => $request->string('email'),
            'password' => $request->string('password'),
            'experience' => $request->string('experience'),
            'verified' => $request->boolean('verified'),
            'avatar_url' => 'architects/avatars/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Architect $architect)
    {
        $architect->delete();

        return redirect()->route('admin.index')->with('success', 'Успешно удалён');
    }
}
