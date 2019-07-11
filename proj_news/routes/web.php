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
$prefixNews = Config::get('zvn.url.prefix_news', 'news68');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('category/{id}', function ($id) {
//     return 'Category '.$id;
// })->where('id', '[0-9]+');

// Route::get('category/{name?}', function ($name = 'John') {
//     return $name;
// });

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
// Admin
Route::group(['prefix' => $prefixAdmin], function () {
    // =========================== DASHBOARD ==============================
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@'; 
        Route::get('', ['as' => $controllerName, 'uses' => $controller . 'index']);
    });

    // =========================== SLIDER ==============================
    $prefix = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@'; 
        Route::get('', ['as' => $controllerName, 'uses' => $controller . 'index']);

        Route::get('form/{id?}', ['as' => $controllerName . '/form','uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save','uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete','uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status','uses' => $controller . 'status']);
    });

    // =========================== CATEGORY ==============================
    $prefix = 'category';
    $controllerName = 'category';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@'; 
        Route::get('', ['as' => $controllerName, 'uses' => $controller . 'index']);

        Route::get('form/{id?}', ['as' => $controllerName . '/form','uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save','uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete','uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status','uses' => $controller . 'status']);
    });
});

// News
Route::group(['prefix' => $prefixNews], function () {
    // =========================== HOMEPAGE ==============================
    // config để homepage có url là /news
    $prefix = '';
    $controllerName = 'home';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@'; 
        Route::get('', ['as' => $controllerName, 'uses' => $controller . 'index']);
    });
});