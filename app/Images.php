<?php


namespace App;


trait Images
{
//returns different images from pvatar according to email of users
    public function avatar()
    {
        //return "https://i.pravatar.cc/200?u=".$this->email;
        return "/images/".$this->avatar;

    }
    public function background()
    {
        return "/images/".$this->background;

    }

    public function default_user()
    {
        return "/images/default-user.png";
    }
}
