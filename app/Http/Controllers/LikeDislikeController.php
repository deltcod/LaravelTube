<?php

namespace App\Http\Controllers;

use App\Events\LikeDislikePush;
use App\Http\Requests\LikeDislikeStoreRequest;
use App\Repositories\LikeDislikeRepository as LikeDislike;
use App\Transformers\LikeDislikeTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

/**
 * Class LikeDislikeController.
 */
class LikeDislikeController extends ApiGuardController
{
    /**
     * @var LikeDislikeTransformer
     */
    protected $likeDislikeTransformer;

    /**
     * LikeDislike repository.
     *
     * @var LikeDislike
     */
    private $likeDislike;

    /**
     * @var array
     */
    protected $apiMethods = [
        'getLikes' => [
            'keyAuthentication' => false,
        ],
        'getDislikes' => [
            'keyAuthentication' => false,
        ],
        'getLikesCount' => [
            'keyAuthentication' => false,
        ],
        'getDislikesCount' => [
            'keyAuthentication' => false,
        ],
    ];

    /**
     * LikeDislikeController constructor.
     *
     * @param LikeDislike            $likeDislike
     * @param LikeDislikeTransformer $likeDislikeTransformer
     */
    public function __construct(LikeDislike $likeDislike, LikeDislikeTransformer $likeDislikeTransformer)
    {
        parent::__construct();

        $this->likeDislikeTransformer = $likeDislikeTransformer;
        $this->likeDislike = $likeDislike;
    }

    /**
     * Return likes.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getLikes($id)
    {
        $likes = $this->likeDislike->getLikesAll($id);

        return $this->response->withCollection($likes, $this->likeDislikeTransformer);
    }

    /**
     * Return likes count.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getLikesCount($id)
    {
        $count = $this->likeDislike->getLikesCount($id);

        return $count;
    }

    /**
     * Return dislikes.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getDislikes($id)
    {
        $dislikes = $this->likeDislike->getDislikesAll($id);

        return $this->response->withCollection($dislikes, $this->likeDislikeTransformer);
    }

    /**
     * Return dislikes count.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getDislikesCount($id)
    {
        $count = $this->likeDislike->getDislikesCount($id);

        return $count;
    }

    /**
     * Create and store like or dislike.
     *
     * @param LikeDislikeStoreRequest $request
     *
     * @return mixed
     */
    public function store(LikeDislikeStoreRequest $request)
    {
        $check = $this->likeDislike->checkIfDataExists($request);

        if ($check == 0) {
            $like = $this->likeDislike->create($request->all());
            $this->callEventPushLikeDislike($like);

            return $this->response->withItem($like, $this->likeDislikeTransformer);
        } else {
            $like = $this->likeDislike->findOrFail($check);
            $this->callEventPushLikeDislike($like);
            if ($request->input('type') != $like->type) {
                $like = $this->likeDislike->update($request->all(), $like->id);

                return $this->response->withItem($like, $this->likeDislikeTransformer);
            } else {
                $this->likeDislike->delete($like->id);
            }
        }
    }

    /**
     * Call event push like/dislike.
     *
     * @param $likeDislike
     */
    private function callEventPushLikeDislike($likeDislike)
    {
        event(new LikeDislikePush($likeDislike));
    }
}
