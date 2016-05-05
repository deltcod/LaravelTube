<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 20/04/16
 * Time: 16:54.
 */
namespace App\Transformers;

class VideoTransformer extends Transformer
{
    public function transform($video)
    {
        return [
            'id'     => $video['id'],
            'name'     => $video['name'],
            'category' => $video['category'],
            'path'     => $video['path'],
            'likes'    => (int) $video['likes'],
            'dislikes' => (int) $video['dislikes'],
        ];
    }
}
