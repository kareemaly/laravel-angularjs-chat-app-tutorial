<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


// Chat rooms
Route::get('/api/chat-rooms', array('uses' => 'ChatRoomController@getAll'));
Route::get('/api/chat-rooms/{chatRoom}', array('uses' => 'ChatRoomController@show'));
Route::post('/api/chat-rooms', array('uses' => 'ChatRoomController@create'));

// Messages api
Route::get('/api/messages/{chatRoom}', array('uses' => 'MessageController@getByChatRoom'));
Route::post('/api/messages/{chatRoom}', array('uses' => 'MessageController@createInChatRoom'));
Route::get('/api/messages/{lastMessageId}/{chatRoom}', array('uses' => 'MessageController@getUpdates'));

// Users api
Route::get('/api/users/login/kareem', array('uses' => 'UserController@loginKareem'));
Route::get('/api/users/login/mohamed', array('uses' => 'UserController@loginMohamed'));

Route::model('chatRoom', 'ChatRoom');