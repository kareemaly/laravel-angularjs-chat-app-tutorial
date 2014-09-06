'use strict';

angular.module('chatApp')
	.controller('ChatRoomCtrl', function($scope, Message, ChatRoom, $routeParams, $interval) {


		var chatRoomLoaded = function(chatRoom) {

			$scope.chatRoom = chatRoom;

			return chatRoom;
		}

		var getMessagesInRoom = function(chatRoom) {

			return Message.getByChatRoom(chatRoom);
		}

		var MessagesLoaded = function(messages) {
			$scope.messages = messages;
		}

		var handleErrors = function(errors) {

			console.error(errors);
		}


		var getLastMessage = function() {
			return $scope.messages[$scope.messages.length - 1];
		}


		var getUpdates = function() {

			return Message.getUpdates($scope.chatRoom, getLastMessage()).then(updatesLoaded);
		}


		var updatesLoaded = function(updates) {
			$scope.messages = $scope.messages.concat(updates);
		}


		$scope.createMessage = function(chatRoom, message) {
			Message.createInChatRoom(chatRoom, message)
				.then(getUpdates);
		}


		$interval(getUpdates, 3000);


		ChatRoom.show($routeParams.chatRoom)
			.then(chatRoomLoaded)
			.then(getMessagesInRoom)
			.then(MessagesLoaded)
			.catch(handleErrors);

	});