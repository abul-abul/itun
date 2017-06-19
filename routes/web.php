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
    return view('welcome');
});



Route::get('admin/login','AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin');
Route::get('admin/logout','AdminController@getLogout');
Route::get('admin/dashboard','AdminController@getDashboard');

//Blog
Route::get('admin/blog','AdminController@getBlog');
Route::get('admin/add-blog','AdminController@getAddBlog');
Route::post('admin/add-blog','AdminController@postAddBlog');
Route::get('admin/view-blog-gallery/{id}','AdminController@getViewBlogGallery');
Route::get('admin/edit-blog/{id}','AdminController@getEditBlog');
Route::get('admin/blog-delete/{id}','AdminController@getBlogDelete');
Route::get('admin/blog-gallery-delete/{id}','AdminController@getBlogGalleryDelete');
Route::post('admin/edit-blog','AdminController@postEditBlog');
//end Blog
