<?php

class ChatRoom extends \Illuminate\Database\Eloquent\Model {

    /**
     * @var string
     */
    protected $table = 'chat_rooms';

    /**
     * @var array
     */
    protected $fillable = array('name');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('Message', 'chat_room_id');
    }
}