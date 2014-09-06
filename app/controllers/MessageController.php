<?php

class MessageController extends BaseController {

    /**
     * @param Message $messages
     */
    public function __construct(Message $messages)
    {
        $this->messages = $messages;
    }

    /**
     * @param ChatRoom $chatRoom
     * @return mixed
     */
    public function getByChatRoom(ChatRoom $chatRoom)
    {
        return $chatRoom->messages;
    }

    /**
     * @param ChatRoom $chatRoom
     * @return static
     */
    public function createInChatRoom(ChatRoom $chatRoom)
    {
        $message = $this->messages->newInstance(Input::all());

        $message->chatRoom()->associate($chatRoom);
        $message->user()->associate($this->me());

        $message->save();

        return $message;
    }


    /**
     * @param $lastMessageId
     * @param ChatRoom $chatRoom
     * @return mixed
     */
    public function getUpdates($lastMessageId, ChatRoom $chatRoom)
    {
        return $this->messages->byChatRoom($chatRoom)->afterId($lastMessageId)->get();
    }
}