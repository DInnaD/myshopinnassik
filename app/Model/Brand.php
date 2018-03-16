<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return 'public/img/no-image.png';
        }

        return 'public/uploads/' . $this->img;
    }
}
