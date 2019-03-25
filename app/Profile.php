<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{

	use SoftDeletes;

	protected $fillable = [
        'user_id', 'avatar', 'about', 'facebook', 'instagram', 'twitter', 'youtube', 'whatsapp', 'job'
    ];

    protected $date =['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
