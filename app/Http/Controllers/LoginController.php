<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt($request->only(['email', 'password']), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('main')->with('success', 'Вы успешно вошли в аккаунт!');
        }

        return redirect()->route('main')->with('danger', 'Вы не зарегистрированы');
    }
}
