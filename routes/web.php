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
    return view('sipelda');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    //sektoral
    Route::get('/sektoral', 'SektoralController@index')->name('sektoral.index');
    Route::post('/sektoral', 'SektoralController@store')->name('sektoral.store');
    Route::delete('/sektoral/{id}', 'SektoralController@delete')->name('sektoral.delete');
    Route::put('/sektoral/{id}/update', 'SektoralController@update')->name('sektoral.update');

    //permintaan data
    Route::get('/permohonan-data', 'PermintaanDataController@index')->name('permintaan.index');
    Route::post('/permohonan-data', 'PermintaanDataController@store')->name('permintaan.store');
    Route::delete('/permohonan-data/{id}', 'PermintaanDataController@delete')->name('permintaan.delete');
    Route::put('/permohonan-data/{id}/update', 'PermintaanDataController@update')->name('permintaan.update');

    //proses data
    Route::get('/data/data-masuk', 'ProsesDataController@index')->name('data.masuk');
    Route::get('/data/data-diterima/{id}', 'ProsesDataController@dataMenunggu')->name('data.diterima');
    Route::get('/data/data-ditolak/{id}', 'ProsesDataController@dataDitolak')->name('data.ditolak');
    Route::get('/data/data-diproses', 'ProsesDataController@proses')->name('data.proses');
    Route::get('/data/detail-data-diproses/{id}', 'ProsesDataController@detailProses')->name('detail.proses');
    Route::post('/data/data-disetujui/{id}', 'FileDataController@store')->name('data.disetujui');
    Route::get('/data/data-dikirim/{id}', 'FileDataController@kirimData')->name('data.dikirim');
    Route::post('/data/data-diupdate/{data}/file/{id}', 'FileDataController@update')->name('data.diupdate');
    Route::delete('/data/data-didelete/{data}/file/{id}', 'FileDataController@delete')->name('data.didelete');
    Route::get('/data/data-terkirim', 'ProsesDataController@dataTerkirim')->name('data.terkirim');
    Route::get('/data/detail-data-terkirim/{id}', 'ProsesDataController@showDetailDataTerkirim')->name('terkirim.detail');

    //rekap-data
    Route::get('/rekap-data', 'RekapDataController@index')->name('rekap.index');

    //profile
    Route::get('/profile', 'ProfileController@show')->name('profile.show');
    Route::post('/profile/{id}', 'ProfileController@updateProfile')->name('profile.update');
    Route::post('/profile/password/{id}', 'ProfileController@updatePassword')->name('password.update');
    Route::get('/profile/detail/{id}', 'ProfileController@showDetail')->name('profile.detail');

    //users admin
    Route::get('/users/admin', 'UsersController@adminIndex')->name('admin.index');
    Route::post('/users/admin', 'UsersController@tambahAdmin')->name('admin.create');
    Route::delete('/users/admin/{id}', 'UsersController@destroyAdmin')->name('admin.destroy');
    Route::put('/users/admin/{id}/update', 'UsersController@updateAdmin')->name('admin.update');

    //user member
    Route::get('/users/members', 'UsersController@memberIndex')->name('member.index');

    //about
    Route::get('/about-us', 'HomeController@about')->name('about.index');

    //feedback
    Route::get('/feedback-all', 'FeedbackController@index')->name('feedback.index');
    Route::get('/feedback', 'FeedbackController@create')->name('feedback.create');
    Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');
});
