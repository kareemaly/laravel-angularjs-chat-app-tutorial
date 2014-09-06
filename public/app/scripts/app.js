'use strict';

angular.module('chatApp', ['ngRoute'])

	.config(function($routeProvider) {


		$routeProvider

		.when('/chat-rooms', {
			templateUrl: 'partials/chat-rooms.html',
			controller: 'ChatRoomsCtrl'
		})

		.when('/chat-room/:chatRoom', {
			templateUrl: 'partials/chat-room.html',
			controller: 'ChatRoomCtrl'
		});

	});