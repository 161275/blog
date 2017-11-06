<?php

//user Routes
Route::group(['namespace'=>'User'],function()
{
Route::get('/', 'Homecontroller@index');
Route::get('post', 'Postcontroller@index')->name('post');
});
//Admin Routes
Route::group(['namespace'=>'admin'],function()
{
Route::get('admin/home', 'Homecontrolle@index')->name('admin.home');
Route::resource('admin/user','usercontroller');
Route::resource('admin/post','postcontroller');
Route::resource('admin/tag','tagcontroller');
Route::resource('admin/category','categorycontroller');
});
