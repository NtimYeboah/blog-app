<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drafts extends Model
{
    public $fillable = ['title', 'body', 'user_id', 'is_published'];

    /**
     * Casts to different types.
     *
     * @return array
     */
    public function casts() : array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    /**
     * Post relationship.
     *
     * @return void
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    /**
     * User relationship.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    /**
     * Checks if draft is published.
     *
     * @return bool
     */
    public function isPublished()
    {
        return (bool) $this->is_published;
    }
}
