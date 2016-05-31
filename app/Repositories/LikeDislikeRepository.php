<?php

namespace App\Repositories;

use App\LikeDislike;
use App\Repositories\Eloquent\Repository;

/**
 * Class LikeDislikeRepository.
 */
class LikeDislikeRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return LikeDislike::class;
    }

    /**
     * Get likes count.
     *
     * @param $video_id
     *
     * @return mixed
     */
    public function getLikesCount($video_id)
    {
        $video_likes = $this->getLikes($video_id);

        return $video_likes->count();
    }

    /**
     * Get dislikes count.
     *
     * @param $video_id
     *
     * @return mixed
     */
    public function getDislikesCount($video_id)
    {
        $video_dislikes = $this->getDislikes($video_id);

        return $video_dislikes->count();
    }

    /**
     * Get likes all camps.
     *
     * @param $video_id
     *
     * @return mixed
     */
    public function getLikesAll($video_id)
    {
        $video_likes = $this->getLikes($video_id);

        return $video_likes;
    }

    /**
     * Get dislikes all camps.
     *
     * @param $video_id
     *
     * @return mixed
     */
    public function getDislikesAll($video_id)
    {
        $video_dislikes = $this->getDislikes($video_id);

        return $video_dislikes;
    }

    /**
     * Check if database contains data.
     *
     * @param $data
     *
     * @return int
     */
    public function checkIfDataExists($data)
    {
        $like = LikeDislike::where('video_id', $data->input('video_id'))->where('user_id', $data->input('user_id'))->get();

        if (empty($like[0])) {
            return 0;
        } else {
            return $like[0]->id;
        }
    }

    /**
     * Get likes.
     *
     * @param $id
     *
     * @return mixed
     */
    private function getLikes($id)
    {
        $video = LikeDislike::where('video_id', $id)->get();

        return $video->where('type', 'like');
    }

    /**
     * Get dislikes.
     *
     * @param $id
     *
     * @return mixed
     */
    private function getDislikes($id)
    {
        $video = LikeDislike::where('video_id', $id)->get();

        return $video->where('type', 'dislike');
    }
}
