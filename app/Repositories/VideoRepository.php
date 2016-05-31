<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\Video;

class VideoRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Video::class;
    }

    /**
     * @return Video|best
     */
    public function best()
    {
        $videos = Video::all();
        $best_vidos = [];
        $id_best_videos = [];

        foreach ($videos as $video) {
            $id_best_videos[] = [$video->likes()->count(), $video->id];
        }

        arsort($id_best_videos);

        $id_best_videos = array_slice($id_best_videos, 0, 10);

        foreach ($id_best_videos as $value) {
            $best_vidos[] = Video::find($value[1]);
        }

        return $best_vidos;
    }
}
