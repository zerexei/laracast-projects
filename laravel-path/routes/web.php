<?php

use App\Exceptions\ModelExceptions\PostException;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravel\SerializableClosure\SerializableClosure;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// guest
Route::get('/', function () {
    try {
        throw PostException::UserMaxPostReached();
        return view('welcome');
    } catch (\Exception $th) {
        dd($th);
    }
});

// auth
// Route::middleware(['auth'])->group(function () {
Route::view('/dashboard', 'dashboard');
// });


Route::get('/post/{post}', [PostController::class, 'previewUnpublished'])
    ->middleware(['signed'])
    ->name('posts.preview');


Route::get('serialize', function () {
    // $data = ['name' => "John Doe"];

    $data = function () {
        return new class
        {
            private $name = "John Doe";

            public function getName()
            {
                return $this->name;
            }

            public function setName($value)
            {
                $this->name = $value;
            }
        };
    };

    // encrypt
    // $serialized = base64_encode(serialize($data));
    // $serialized = base64_encode(json_encode($data));
    $serialized = base64_encode(serialize(new SerializableClosure($data)));

    // dd($serialized);

    // decrypt
    $unserialized = unserialize(base64_decode($serialized));
    // $unserialized = json_decode(base64_decode($serialized), true);
    dd($unserialized());
});
