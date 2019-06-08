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
// $prefixAdmin = config('zvn.url.prefix_admin');
$prefixAdmin = Config::get('zvn.url.prefix_admin', 'admin');

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

    // =========================== SLIDER ==============================
    $prefix = 'slider';
    Route::group(['prefix' => $prefix], function () use ($prefix) {
        $controller = ucfirst($prefix) . 'Controller@'; 

        Route::get('', $controller . 'index');
        Route::get('edit/{id}', $controller . 'form')->where('id', '[0-9]+');
        Route::get('delete/{id}', $controller . 'delete')->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', $controller . 'status')->where('id', '[0-9]+');
    });

    // change-status-active/12  -> inactive 12
    // change-status-inactive/14    -> active 14

    // Route::get('category', function () {
    //     return "/admin/category";
    // });
});