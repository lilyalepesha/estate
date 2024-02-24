<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::query()->with(['region', 'architect'])->paginate(30)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/projects/', $request->file('image'), $name);

        $project = Project::query()->create($request->validated());

        $project->update([
            'image_url' => 'projects/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/projects/', $request->file('image'), $name);

        $project->update([
            'name' => $request->string('name'),
            'description' => $request->string('description'),
            'image_url' => 'projects/' . $name,
            'type' => $request->integer('type'),
            'price_per_meter' => $request->integer('price_per_meter'),
            'area' => $request->integer('area')
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.index')->with('success', 'Успешно удалён');
    }
}
