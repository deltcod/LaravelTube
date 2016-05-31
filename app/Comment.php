<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment.
 */
class Comment extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'video_id', 'comment'];

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
}
