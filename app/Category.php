<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

	// use SoftDeletes;

	protected $fillable = [
        'name', 'slug'
    ];

    // protected $date =['deleted_at'];

    public function posts()
    {
    	return $this->hasMany('App\post');
    }

    public function videos()
    {
        return $this->hasMany('App\video');
    }
}
