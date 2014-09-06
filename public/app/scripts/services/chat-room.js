'use strict';

angular.module('chatApp')

	.factory('ChatRoom', function(WebService) {

		return {
			getAll: function() {
				return WebService.get('chat-rooms');
			},
			show: function(id) {
				return WebService.get('chat-rooms/' + id);
			},
			create: function(chatRoom) {
				return WebService.post('chat-rooms', chatRoom);
			},
		}

	});