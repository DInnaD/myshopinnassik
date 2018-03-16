<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;

    //protected $fillable = ['id', 'product_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
        // TODO: Implement sluggable() method.
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


//    public function galleries()
//    {
//        return $this->hasMany('App\Gallery');
//    }


    /**
     * get image
     * @return string
     */
    public function getImage()
    {
        if($this->img == null)
        {
            return 'public/img/no-image.png';
        }

        return 'public/uploads/products/' . $this->img;

    }
}
