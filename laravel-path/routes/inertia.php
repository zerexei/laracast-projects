<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

Route::prefix('inertia')->group(function () {

    Route::get('', function () {
        return Inertia::render('Welcome', [
            'name' => 'Inertia'
        ]);
    });


    Route::get('users', function () {
        // sleep(2);

        return Inertia::render('Users', [
            'users' => \App\Models\User::all(['name'])
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('UserCreate');
    });

    Route::post('/users', function (Request $request) {
        $safe = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            // TODO: make laravel password validation work
            'password' => ['required', 'max:255', Password::default()],
        ]);

        \App\Models\User::create($safe);

        return redirect('/inertia/users');
        // return Inertia::render('UserCreate', []);
    });

    Route::get('posts', function () {
        // sleep(2);

        $search = request('search', '');
        return Inertia::render('Posts', [
            'posts' => \App\Models\Post::query()
                ->when(
                    $search,
                    fn ($query) => $query->where('title', 'like', "%$search%")
                )
                ->select(['title'])
                ->paginate()
                ->withQueryString(),
            // ->through(fn($user) => ['id' => $user->id])

            'filters' => request(['search']),
        ]);
    });


    Route::post('/logout', function (Request $request) {
        dd($request->all());
    });
});
