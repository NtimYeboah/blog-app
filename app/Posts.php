<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $fillables = ['draft_id', 'slug'];

    public function draft()
    {
        return $this->belongsTo(Draft::class, 'draft_id');
    }

    /**
     * Add a new post
     *
     * @param Draft $draft
     * @return self
     */
    public function add(Draft $draft) : self
    {
        return self::create([
            'draft_id' => $draft->id,
            'slug' => $draft->title
        ]);
    }
}
