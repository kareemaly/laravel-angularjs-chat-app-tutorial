<?php

class UserController extends BaseController {

    /**
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }


    public function loginKareem()
    {
        Auth::loginUsingId(1);
    }

    public function loginMohamed()
    {
        Auth::loginUsingId(2);
    }
}