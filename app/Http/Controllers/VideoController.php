<?php

namespace App\Http\Controllers;

use App\Transformers\VideoTransformer;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Response;

/**
 * Class VideoController.
 */
class VideoController extends ApiGuardController
{
    protected $videoTransformer;

    protected $apiMethods = [
        'index' => [
            'keyAuthentication' => false,
        ],
        'show' => [
            'keyAuthentication' => false,
        ],
        'getBestVideos' => [
            'keyAuthentication' => false,
        ],
        'getVideosUser' => [
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
     * VideoController constructor.
     */
    public function __construct(VideoTransformer $videoTransformer)
    {
        parent::__construct();

        $this->videoTransformer = $videoTransformer;
    }

    /**
     * Return all Videos.
     */
    public function index()
    {
        $video = Video::all();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return the best Videos.
     */
    public function getBestVideos()
    {
        $video = Video::limit(50)->orderBy('likes', 'desc')->get();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos only user.
     */
    public function getVideosUser($id)
    {
        $user = User::findOrFail($id);
        $video = Video::where('user_id', $user->id)->get();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Store a newly created video in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!Input::get('name') || !Input::get('category') || !Input::get('path') || $user == null) {
            return Response::json([
                'error' => [
                    'message' => 'Parameters failed validation for a video.',
                ],
            ], IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $video = new Video();
        $video->name = $request->name;
        $video->category = $request->category;
        $video->path = $request->path;
        $video->likes = 0;
        $video->dislikes = 0;

        $user->getVideos()->save($video);

        return $this->response->withItem($video, $this->videoTransformer);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return $this->response->withItem($video, $this->videoTransformer);
    }

    /**
     * Update the specified video in storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->name = $request->name;
        $video->category = $request->category;
        $video->path = $request->path;
        $video->likes = $request->likes;
        $video->dislikes = $request->dislikes;
        $video->save();
    }

    /**
     * Remove the specified video from storage.
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        Video::destroy($video->id);
    }
}
