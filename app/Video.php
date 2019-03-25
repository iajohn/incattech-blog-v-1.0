<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title','description', 'video', 'category_id', 'slug', 'user_id', 'imgCredit'
    ];

    public function getVideoAttribute($video)
    {
    	return asset($video);
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}