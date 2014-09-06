'use strict';

angular.module('chatApp')

	.factory('Message', function(WebService) {

		return {
			getByChatRoom: function(chatRoom) {
				return WebService.get('messages/'+chatRoom.id);
			},
			createInChatRoom: function(chatRoom, message) {
				return WebService.post('messages/'+chatRoom.id, message);
			},
			getUpdates: function(chatRoom, lastMessage) {
				var lastMessageId;
				
				if(! lastMessage) {
					lastMessageId = 0;
				} else {
					lastMessageId = lastMessage.id;
				}
				return WebService.get('messages/' + lastMessageId + '/' + chatRoom.id);
			},
		}

	});