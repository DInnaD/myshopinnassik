<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Baum\Node;

class Category extends Node
{
    //use Sluggable;

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

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
