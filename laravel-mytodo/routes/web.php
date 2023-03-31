<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\TeamMember;
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

Route::resource('todos', TodoController::class);
Route::post('todos/{todo}',[TodoController::class,'check'])->name('todos.check');

//Route::resource('teams', TeamController::class);

Route::middleware(['auth', TeamMember::class])->group(function () {
    Route::resource('teams', TeamController::class)->names([
        'create' => 'teams.create',
        'store' => 'teams.store',
        //'show' => 'teams.show',
        'edit' => 'teams.edit',
        'update' => 'teams.update',
        'destroy' => 'teams.destroy'
    ]);
});
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::get('teams/{team}',[TeamController::class,'show'])->name('teams.show');
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

Route::post('teams/{team}',[MemberController::class,'add_user'])->name('teams.add_user');

