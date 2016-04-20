<?php

namespace App\Http\Controllers;

use App\Transformers\VideoTransformer;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends ApiController
{

    protected $videoTransformer;

    /**
     * VideoController constructor.
     */
    public function __construct(VideoTransformer $videoTransformer)
    {
        $this->videoTransformer = $videoTransformer;
    }

    /**
     * Return all Videos
     */
    public function index()
    {
        $video = Video::all();
        if (!$video){
            return $this->respondNotFound('No video');
        }
        return $this->respond($this->videoTransformer->transformCollection($video->all()));
    }

    /**
     * Store a newly created video in storage.
     */
    public function store()
    {
        $user = User::find(1); //TODO

        if (!Input::get('name') or !Input::get('category') or !Input::get('path'))
        {
            return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
                ->respondWithError('Parameters failed validation for a video.');
        }

        $video = new Video();
        $video->name = Input::get('name');
        $video->category = Input::get('category');
        $video->path = Input::get('path');
        $video->likes = 0;
        $video->dislikes = 0;

        $user->getVideos()->save($video);
        return $this->respondCreated('Video successfully store.');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return $this->respondNotFound('Video does not exsist');
        }
        return $this->respond([
            'data' => $this->videoTransformer->transform($video)
        ]);
    }

    /**
     * Update the specified video in storage.
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        if (!$video)
        {
            return $this->respondNotFound('Video does not exist');
        }
        $video->name = $request->name;
        $video->category = $request->category;
        $video->path = $request->path;
        $video->likes = $request->likes;
        $video->dislikes = $request->dislikes;
        $video->save();
    }

    /**
     * Remove the specified video from storage.
     * @param $id
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if (!$video)
        {
            return $this->respondNotFound('Video does not exist');
        }

        Video::destroy($id);
    }
}
