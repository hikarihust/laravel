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
$prefixAdmin = "admin";

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Route::get('category/{id}', function ($id) {
//     return 'Category '.$id;
// })->where('id', '[0-9]+');

Route::get('category/{name?}', function ($name = 'John') {
    return $name;
});

// Route::prefix($prefixAdmin)->group(function () {
//     Route::get('user', function () {
//         return "/admin/user";
//     });
//     Route::get('slider', function () {
//         return "/admin/slider";
//     });
//     Route::get('category', function () {
//         return "/admin/category";
//     });
// });

Route::group(['prefix' => $prefixAdmin], function () {
    Route::get('user', function () {
        return "/admin/user";
    });

    Route::group(['prefix' => 'slider'], function () {
        Route::get('', function () {
            return "slider List";
        });
        Route::get('edit/{id}', function ($id) {
            return "slider Edit" . $id;
        })->where('id', '[0-9]+');
        Route::get('delete/{id}', function ($id) {
            return "slider Delete" . $id;
        })->where('id', '[0-9]+');
    });

    Route::get('category', function () {
        return "/admin/category";
    });
});