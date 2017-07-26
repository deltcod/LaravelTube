<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LikeDislike.
 */
class LikeDislike extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'likes_dislikes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'video_id', 'type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * User relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Video relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function video()
    {
        return $this->belongsTo(\App\Video::class);
    }

    /**
     * Return all instances when type is likes.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeLikes($query)
    {
        return $query->where('type', 'like');
    }

    /**
     * Return all instances when type is dislikes.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeDislikes($query)
    {
        return $query->where('type', 'dislike');
    }
}
