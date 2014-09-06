'use strict';

angular.module('chatApp')
	.controller('ChatRoomsCtrl', function($scope, ChatRoom, $location) {


		var chatRoomsLoaded = function(chatRooms) {
			$scope.chatRooms = chatRooms;
		}

		var handleErrors = function(response) {
			console.error(response);
		}


		$scope.selectChatRoom = function(chatRoom) {

			$location.path('chat-room/' + chatRoom.id);
		}

		$scope.createChatRoom = function(chatRoom) {

			ChatRoom.create(chatRoom).then($scope.selectChatRoom);
		}


		ChatRoom.getAll()
			.then(chatRoomsLoaded)
			.catch(handleErrors);

	});