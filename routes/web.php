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

use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});
/*
|
|   Akses Admin
|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/', function(){
            return view('admin.pages.dashboard');
        })->name('admin.home');
        Route::prefix('user')->group(function(){
            //Route GET
            Route::get('/', 'UserController@daftar')->name('admin.user')->middleware('akses.admin');
            Route::get('/add', 'UserController@add')->name('admin.user.add')->middleware('akses.admin');
            Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit')
                ->middleware('akses.admin');
            Route::get('/setting', 'UserSettingController@form')->name('admin.user.setting');
            //Route POST
            Route::post('/add', 'UserController@save')->middleware('akses.admin');
            Route::post('/edit/{id}', 'UserController@update')
                ->middleware('akses.admin');
            Route::post('setting', 'UserSettingController@update');
            //Route DELETE
            Route::delete('/', 'UserController@delete')->middleware('akses.admin');            
        });
        Route::group(['prefix' => 'rooms','middleware' => 'akses.admin'], function () {
            //Route GET
            Route::get('/', 'RoomsController@create')->name('admin.rooms');
            Route::get('/add', 'RoomsController@add')->name('admin.rooms.add');
            Route::get('/edit/{id}', 'RoomsController@edit')->name('admin.rooms.edit');
            Route::get('/booking', 'BookingController@bookingList')->name('admin.booking');
            //Route POST
            Route::post('/add','RoomsController@save')->name('admin.rooms.save');
            Route::post('/edit/{id}','RoomsController@update')->name('admin.rooms.update');
            // Route::post('/respon/{id}','BookingController@respon')->name('admin.rooms.update');
            //Route DELETE
            Route::delete('/', 'RoomsController@delete')->middleware('akses.admin');
        }); 
    });
});
/*
|
|   Akses User
|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/', function(){
            return view('admin.pages.dashboard');
        })->name('admin.home');
        Route::prefix('rooms')->group(function(){
                Route::get('/browse', 'BrowseController@browse')->name('user.browse')->middleware('akses.user');
                Route::get('/booking/{id}', 'BookingController@create')->name('user.browse.book');
                Route::post('/booking/{id}', 'BookingController@booking')->name('user.booking');
            });
    });
});

Route::any('register', function(){ return abort(404);});
Auth::routes();

