<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['draft_id', 'slug'];

    public function draft()
    {
        return $this->belongsTo(Draft::class, 'draft_id');
    }

    /**
     * Add a new post.
     *
     * @param Draft $draft
     * @return self
     */
    public function add(Draft $draft) : self
    {
        return self::create([
            'draft_id' => $draft->id,
            'slug' => str_slug($draft->title),
        ]);
    }
}
