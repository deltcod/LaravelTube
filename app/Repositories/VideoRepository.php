<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\Video;

class VideoRepository extends Repository
{
    /**
     * @return mixed
     */
    function model()
    {
        return Video::class;
    }

    /**
     * @return Video|best
     */
    public function best()
    {
        return Video::all()->sortByDesc('likes');
    }
}