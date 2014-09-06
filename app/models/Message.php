<?php

class Message extends \Illuminate\Database\Eloquent\Model {

    /**
     * @var string
     */
    protected $table = 'messages';

    /**
     * @var array
     */
    protected $fillable = array('body');

    /**
     * @var array
     */
    protected $with = array('user');

    /**
     * @param $query
     * @param $lastId
     * @return mixed
     */
    public function scopeAfterId($query, $lastId)
    {
        return $query->where('id', '>', $lastId);
    }

    /**
     * @param $query
     * @param $chatRoom
     * @return mixed
     */
    public function scopeByChatRoom($query, $chatRoom)
    {
        return $query->where('chat_room_id', $chatRoom->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chatRoom()
    {
        return $this->belongsTo('ChatRoom', 'chat_room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}