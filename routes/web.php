<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, TransactionController, CreditCardController, UserController};

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

/*
|--------------------------------------------------------------------------
| Configuration routes
|--------------------------------------------------------------------------
|
| Rotas criadas a part do template Black Dashboard
| Para maiores informações: https://black-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

/*
|--------------------------------------------------------------------------
| Rotas do projeto
|--------------------------------------------------------------------------
|
| Abaixo estão as rotas criadas para o Projeto
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('home')->middleware('auth')->group(function ()
{
    Route::get('', [HomeController::class, 'index'])->name('home');
});

Route::prefix('transactions')->middleware('auth')->group(function()
{
    Route::post('', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/extract', [TransactionController::class, 'index'])->name('transaction.index');
});

Route::prefix('credit-cards')->middleware('auth')->group(function()
{
    Route::get('/create',[CreditCardController::class, 'create'])->name('credit_card.create');
    Route::post('/create', [CreditCardController::class, 'store'])->name('credit_card.store');
    Route::get('', [CreditCardController::class, 'index'])->name('credit_card.index');
    Route::delete('/{credit_card}', [CreditCardController::class, 'destroy'])->name('credit_card.destroy');
    Route::put('/{credit_card}', [CreditCardController::class, 'update'])->name('credit_card.update');
});

Route::prefix('users')->middleware('auth')->group(function()
{
    Route::get('',[UserController::class, 'index'])->name('users.index');
});



