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
        Route::get('/book/list/stock', 'Admin\BookController@stock')->name('book.stock');
        Route::get('/book/list/active', 'Admin\BookController@active')->name('book.active');
        Route::get('/book/list/non-active', 'Admin\BookController@NonActive')->name('book.NonActive');
        Route::get('/book/add', 'Admin\BookController@add')->name('book.add');
        Route::post('/book/add', 'Admin\BookController@store')->name('book.store');


        Route::get('/book/edit/{id}', 'Admin\BookController@edit')->name('book.edit');
        Route::post('/book/edit/{id}', 'Admin\BookController@update')->name('book.update');
        Route::delete('/book/edit/{id}', 'Admin\BookController@delete')->name('book.delete');
        Route::get('/book/status/{id}', 'Admin\BookController@status')->name('book.status');

        //Peminjaman
        Route::get('/peminjaman','Admin\PeminjamanController@index')->name('index.pinjam.buku');
        Route::get('/peminjaman/{id}','Admin\PeminjamanController@store')->name('pinjam.buku');
        Route::get('/peminjaman/peretujuan/{id}','Admin\PeminjamanController@setujui')->name('setujui.peminjaman');
        Route::get('/peminjaman/pembatalan/{id}','Admin\PeminjamanController@batalkan')->name('batalkan.peminjaman');
        Route::get('/peminjaman/penolakan/{id}','Admin\PeminjamanController@tolak')->name('tolak.peminjaman');

        Route::get('pengembalian-buku', 'Admin\PengembalianController@index')->name('pengembalian.index');
        Route::get('pengembalian-buku/{id}', 'Admin\PengembalianController@pengembalian')->name('pengembalian.buku');
        Route::get('pengembalian-buku/delete/{id}', 'Admin\PengembalianController@clear_riwayat')->name('hapus.riwayat');

        Route::get('anggota-perpustakaan','Admin\AnggotaController@index')->name('anggota.index');
        Route::get('anggota-perpustakaan/add','Admin\AnggotaController@add')->name('anggota.add');
        Route::post('anggota-perpustakaan/add','Admin\AnggotaController@store')->name('anggota.store');
        Route::get('anggota-perpustakaan/edit/{id}', 'Admin\AnggotaController@edit')->name('anggota.edit');
        Route::put('anggota-perpustakaan/edit/{id}', 'Admin\AnggotaController@update')->name('anggota.update');
        Route::delete('anggota-perpustakaan/delete/{id}', 'Admin\AnggotaController@delete')->name('anggota.delete');


    });

});


Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');