<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentDeleteRequest;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Repositories\CommentRepository as Comment;
use App\Transformers\CommentTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

/**
 * Class CommentController.
 */
class CommentController extends ApiGuardController
{
    /**
     * @var CommentTransformer
     */
    protected $commentTransformer;

    /**
     * Comment repository.
     *
     * @var Comment
     */
    private $comment;

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
     *
     * @param Comment            $comment
     * @param CommentTransformer $commentTransformer
     */
    public function __construct(Comment $comment, CommentTransformer $commentTransformer)
    {
        parent::__construct();

        $this->commentTransformer = $commentTransformer;
        $this->comment = $comment;
    }

    /**
     * Get comments of video.
     *
     * @param $video_id
     *
     * @return mixed
     */
    public function getComments($video_id)
    {
        $comments = $this->comment->getCommentsVideo($video_id);

        return $this->response->withCollection($comments, $this->commentTransformer);
    }

    /**
     * Store comment.
     *
     * @param CommentStoreRequest $request
     *
     * @return mixed
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = $this->comment->create($request->all());

        return $this->response->withItem($comment, $this->commentTransformer);
    }

    /**
     * Update comment.
     *
     * @param CommentUpdateRequest $request
     * @param $id
     *
     * @return mixed
     */
    public function update(CommentUpdateRequest $request)
    {
        $comment = $this->comment->findOrFail($request->input('id'));

        $this->comment->update($request->all(), $request->input('id'));

        return $this->response->withItem($comment, $this->commentTransformer);
    }

    /**
     * Delete comment.
     *
     * @param $id
     */
    public function delete(CommentDeleteRequest $request)
    {
        $this->comment->delete($request->input('id'));
    }
}
