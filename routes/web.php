<?php

/** Posts */
Route::get('/', 'PostController@index');

Route::get('/posts', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create')->name('post.create');

Route::post('/posts/store', 'PostController@store')->name('post.store');

Route::get('/posts/{id}', 'PostController@show')->name('post.show');


/** Comments */
Route::post('/posts/{id}/comments', 'CommentController@store')->name('comment.store');


/** Registration */
Route::get('/register', 'RegistrationController@create')->name('registration.create');

Route::post('/register', 'RegistrationController@store')->name('registration.store');


/** Session */
Route::get('/login', 'SessionController@create')->name('session.create');

Route::post('/login', 'SessionController@store')->name('session.store');

Route::get('/logout', 'SessionController@destroy')->name('session.destroy');


/** Tag */
Route::get('/posts/tags/{tag}', 'TagController@index')->name('tag.index');
