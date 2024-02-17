<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::query()->create($request->only(['email', 'password']));

        Auth::login($user);

        $name = Str::uuid() . '.' . $request->file('avatar')->extension();

        Storage::putFileAs( 'public/avatars/', $request->file('avatar'), $name);

        $user->update([
            'avatar_url' => 'avatars/' . $name,
        ]);

        return redirect()->back()->with('success', 'Вы успешно зарегистрированы');
    }
}
