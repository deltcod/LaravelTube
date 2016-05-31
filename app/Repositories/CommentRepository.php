<?php

namespace App\Repositories;

use App\Comment;
use App\Repositories\Eloquent\Repository;

/**
 * Class LikeDislikeRepository.
 */
class CommentRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Comment::class;
    }

    public function getCommentsVideo($video_id)
    {
        $comments = Comment::where('video_id', $video_id)->get();

        return $comments;
    }
}
