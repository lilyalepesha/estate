<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::query()->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $name = Str::uuid() . '.' . $request->file('image')->extension();

        Storage::putFileAs( 'public/avatars/', $request->file('image'), $name);

        $user = User::query()->create($request->validated());

        $user->update([
            'avatar_url' => 'avatars/' . $name,
        ]);

        return redirect()->route('admin.index')->with('success', 'Успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function edit(int $id)
    {
        try {
            return view('admin.users.edit', ['user' => User::query()->firstWhere('id', '=', $id)]);
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('admin.index')->with('danger', 'Такой пользователь не найден');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        try {
            if ($request->has('image')) {
                $name = Str::uuid() . '.' . $request->file('image')->extension();

                Storage::putFileAs( 'public/avatars/', $request->file('image'), $name);

                User::query()->whereKey($id)->update([
                    'avatar_url' => 'avatars/' . $name,
                ]);
            }

            User::query()->where('id','=', $id)->update([
                'surname' => $request->string('surname'),
                'phone' => $request->string('phone'),
                'father_name' => $request->string('father_name'),
                'email' => $request->string('email'),
                'password' => Hash::make($request->string('password')),
                'name' => $request->string('name'),
                'role' => $request->integer('role'),
            ]);

            return redirect()->route('admin.index')->with('success', 'Успешно отредактирован');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('admin.index')->with('danger', 'Такой пользователь не найден');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            User::query()->where('id','=', $id)->delete();

            return redirect()->route('admin.index')->with('success', 'Успешно удалён');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('admin.index')->with('danger', 'Такой пользователь не найден');
        }
    }
}
