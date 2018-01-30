<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $fillable = ['url', 'user_id', 'description'];

    public $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * User relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Checks if a slide is published.
     *
     * @return bool
     */
    public function isPublished()
    {
        return $this->is_published;
    }

    /**
     * Add a new slide.
     *
     * @param [type] $request
     * @return void
     */
    public function add($request)
    {
        return self::create([
            'url' => $request->get('url'),
            'description' => $request->get('description'),
            'user_id' => $request->user()->id,
        ]);
    }
}
