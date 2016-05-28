<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Transformers\CommentTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use App\Repositories\CommentRepository as Comment;

use App\Http\Requests;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends ApiGuardController
{
    /**
     * @var CommentTransformer
     */
    protected $commentTransformer;

    /**
     * @var array
     */
    protected $apiMethods = [
        'getComments' => [
            'keyAuthentication' => false,
        ],
        'store' => [
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit'     => 10,
                ],
            ],
        ],
    ];

    /**
     * CommentController constructor.
     * @param Comment $comment
     * @param CommentTransformer $commentTransformer
     */
    public function __construct(Comment $comment, CommentTransformer $commentTransformer)
    {
        parent::__construct();

        $this->commentTransformer = $commentTransformer;
        $this->comment = $comment;

    }

    /**
     * Get comments of video
     *
     * @param $video_id
     * @return mixed
     */
    public function getComments($video_id)
    {
        $comments = $this->comment->getCommentsVideo($video_id);

        return $this->response->withCollection($comments, $this->commentTransformer);
    }

    /**
     * Store comment
     *
     * @param CommentStoreRequest $request
     * @return mixed
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = $this->comment->create($request->all());
        return $this->response->withItem($comment, $this->likeDislikeTransformer);
    }

    /**
     * Update comment
     *
     * @param CommentUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CommentUpdateRequest $request, $id)
    {
        $comment = $this->comment->findOrFail($id);

        $this->comment->update($request->all(), $id);

        return $this->response->withItem($comment, $this->videoTransformer);
    }

    /**
     * Delete comment
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->comment->delete($id);
    }
}
