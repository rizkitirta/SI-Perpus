<?php

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
    return redirect(route('dashboard'));
});
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        //Category
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::get('/category/add', 'CategoryController@add')->name('category.add');
        Route::post('/category/add', 'CategoryController@store')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/category/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

    });

});


Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');