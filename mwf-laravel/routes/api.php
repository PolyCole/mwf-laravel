<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('posts', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Post::all();
});

Route::get('posts/{id}', function($id) {
    return Post::find($id);
});

Route::post('posts', function(Request $request) {
    return Post::create($request->all);
});

Route::put('posts/{id}', function(Request $request, $id) {
    $article = Post::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('posts/{id}', function($id) {
    Post::find($id)->delete();

    return 204;
});

Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'
], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');

});

//Route::get('articles', 'ArticleController@index');
//Route::get('articles/{id}', 'ArticleController@show');
//Route::post('articles', 'ArticleController@store');
//Route::put('articles/{id}', 'ArticleController@update');
//Route::delete('articles/{id}', 'ArticleController@delete');
