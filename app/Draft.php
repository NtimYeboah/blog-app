<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
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
    public function isPublished() : bool
    {
        return (bool) $this->is_published;
    }

    /**
     * Publish a draft as post
     *
     * @return bool
     */
    public function publish() : bool
    {
        return self::update([
            'is_published' => 1
        ]);
    }

    /**
     * Get unpublished drafts
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnpublished($query)
    {
        return $query->where('is_published', false);
    }

    /**
     * Get published drafts
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
