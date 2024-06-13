<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchitectRequest;
use App\Models\Architect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchitectRequestController extends Controller
{
    /**
     * @param ArchitectRequest $request
     * @return RedirectResponse
     */
    public function store(ArchitectRequest $request): RedirectResponse
    {
        $name = Str::uuid() . '.' . $request->file('avatar')->extension();

        Storage::putFileAs( 'public/architects/avatars/', $request->file('avatar'), $name);

        $architect = Architect::query()->create([
            'name' => $request->string('name'),
            'last_name' => $request->string('last_name'),
            'father_name' => $request->string('father_name'),
            'email' => $request->string('email'),
            'password' => $request->string('password'),
        ]);

        $architect->update([
            'avatar_url' => 'architects/avatars/' . $name,
        ]);

        Auth::guard('architects')->login($architect);

        return redirect()->route('main')->with('success', 'Заявка отправлена, мы с вами свяжемся');
    }
}
