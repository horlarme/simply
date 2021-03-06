<?php
//The Main Application which is accessible for the user/end user
Route::prefix('/')->group(function () {
//    Home page link
    Route::get('', function () {
        echo "<a href='" . route('login') . "'>Login</a>";
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/administrator', 'middleware' => 'auth'], function () {

    Route::get('', 'PageController@index')->name('dashboard');

    Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
        Route::get('', 'UserController@index')->name('profile');
    });

    Route::group(['middleware' => 'auth', 'prefix' => 'category'], function () {
        Route::get('', 'CategoryController@index')->name('categories');
        Route::get('/{name}', 'CategoryController@view')->name('category.view');
        Route::get('/edit/{name}', 'CategoryController@edit')->name('category.edit');
        Route::get('/delete/{name}', 'CategoryController@edit')->name('category.delete');
    });

    Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
        Route::get('/new', 'PostController@create')->name('post.new');
        Route::get('/trash', 'PostController@new')->name('post.deleted');
        Route::get('/scheduled', 'PostController@new')->name('post.scheduled');
        Route::get('/published', 'PostController@new')->name('post.published');
    });
});

/**
 * Possible Mistyped URLs
 */
Route::any('dashboard', function (){
    //Redirecting Users to the administration page
    return redirect()
        ->route('dashboard');
});