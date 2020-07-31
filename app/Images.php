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

    public function default_user()
    {
        return "/images/default-user.png";
    }
    public function default_background()
    {
        return "/images/gray-background-edited.jpg";
    }

    public function background()
    {
        return "/images/".$this->background;

    }
}
