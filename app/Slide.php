<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $fillable = ['url', 'user_id', 'description'];
    
    public $casts = [
        'is_published' => 'boolean'
    ];

    /**
     * User relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Checks if a slide is published
     *
     * @return boolean
     */
    public function isPublished()
    {
        return $this->is_published;
    }
}
