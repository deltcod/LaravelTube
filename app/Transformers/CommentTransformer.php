<?php

namespace App\Transformers;

/**
 * Class CommentTransformer.
 */
class CommentTransformer extends Transformer
{
    /**
     * @param $comment
     *
     * @return array
     */
    public function transform($comment)
    {
        return [
            'id'          => (int) $comment['id'],
            'user_id'     => (int) $comment['user_id'],
            'video_id'    => (int) $comment['video_id'],
            'comment'     => $comment['comment'],
        ];
    }
}
