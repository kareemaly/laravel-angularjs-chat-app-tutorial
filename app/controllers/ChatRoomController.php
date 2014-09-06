<?php

class ChatRoomController extends BaseController {

    /**
     * @param ChatRoom $chatRooms
     */
    public function __construct(ChatRoom $chatRooms)
    {
        $this->chatRooms = $chatRooms;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->chatRooms->all();
    }


    /**
     * @param ChatRoom $chatRoom
     * @return ChatRoom
     */
    public function show(ChatRoom $chatRoom)
    {
        return $chatRoom;
    }


    /**
     * @return static
     */
    public function create()
    {
        return $this->chatRooms->create(Input::all());
    }

} 