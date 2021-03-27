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
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

        //Category
        Route::get('/category/list', 'Admin\CategoryController@index')->name('category.index');
        Route::get('/category/add', 'Admin\CategoryController@add')->name('category.add');
        Route::post('/category/add', 'Admin\CategoryController@store')->name('category.store');
        Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
        Route::put('/category/edit/{id}', 'Admin\CategoryController@update')->name('category.update');
        Route::delete('/category/delete/{id}', 'Admin\CategoryController@delete')->name('category.delete');

        //Book
        Route::get('/book/list', 'Admin\BookController@index')->name('book.index');
        Route::get('/book/add', 'Admin\BookController@add')->name('book.add');
        Route::post('/book/add', 'Admin\BookController@store')->name('book.store');

    });

});


Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');