<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\TeamUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', TeamUser::class])->group(function () {
    Route::resource('teams', TeamController::class)->names([
        'edit' => 'teams.edit',
        'update' => 'teams.update',
        'destroy' => 'teams.destroy'
    ]);
});

//teams
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::get('teams/{team}',[TeamController::class,'show'])->name('teams.show');
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

Route::post('teams/{team}',[TeamController::class,'add_user'])->name('teams.add_user');

//todos
Route::get('teams/{team}/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('teams/{team}/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('teams/{team}/todos', [TodoController::class, 'store'])->name('todos.store');
Route::get('teams/{team}/todos/{todo}', [TodoController::class, 'show'])->name('todos.show');
Route::get('teams/{team}/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('teams/{team}/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('teams/{team}/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::post('teams/{team}/todos/{todo}',[TodoController::class,'check'])->name('todos.check');
Route::put('teams/{team}/todos/{todo}/tags', [TodoController::class, 'attach_tag'])->name('todos.attach_tag');
Route::delete('teams/{team}/todos/{todo}/tags/{tag}', [TodoController::class, 'detach_tag'])->name('todos.detach_tag');
//tags
Route::get('teams/{team}/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('teams/{team}/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('teams/{team}/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('teams/{team}/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('teams/{team}/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('teams/{team}/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::delete('teams/{team}/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

//Route::resource('tags', TagController::class);
