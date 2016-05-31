<?php

namespace App\Transformers;

/**
 * Class VideoTransformer.
 */
class VideoTransformer extends Transformer
{
    /**
     * @param $video
     *
     * @return array
     */
    public function transform($video)
    {
        return [
            'id'        => $video['id'],
            'name'      => $video['name'],
            'category'  => $video['category'],
            'path'      => $video['path'],
            'likes'     => $video->likes()->count(),
            'dislikes'  => $video->dislikes()->count(),
            'comments'  => $video->getComments,
        ];
    }
}
