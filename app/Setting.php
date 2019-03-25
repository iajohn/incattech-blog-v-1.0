<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    
    protected $fillable = [
        'site_name', 'contact_address', 'contact_email', 'contact_number', 
        'facebook', 'instagram', 'whatsapp', 'twitter', 'youtube', 'about_us'
    ];

}
