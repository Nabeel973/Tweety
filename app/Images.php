<?php


namespace App;


trait Images
{
    /**
     *returns avatars according to user's email
     */
    public function avatar()
    {
        if($this->avatar == null)
        {
            return "/images/default-user.png";
        }
        else
        {
            return "/images/".$this->avatar;
        }
    }

    /**
     *returns backgrounds according to user's email
     */

    public function background()
    {
        if($this->background == null)
        {
            return "/images/gray-background-edited.jpg";
        }
        else
        {
            return "/images/".$this->background;
        }
    }


}
