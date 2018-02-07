<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $fillable = ['name', 'statement', 'image_url', 'facebook_url', 'twitter_url',
    'linkedin_url', 'medium_url', 'cv_url', ];
}
