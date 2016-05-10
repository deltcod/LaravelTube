<?php

namespace App\Http\Controllers;

use App\Transformers\VideoTransformer;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * Class VideoController.
 */
class VideoController extends ApiGuardController
{
    /**
     * @var VideoTransformer
     */
    protected $videoTransformer;

    /**
     * @var array
     */
    protected $apiMethods = [
        'getAllVideos' => [
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
        'getVideosForCategory' => [
            'keyAuthentication' => false,
        ],
        'getVideosForSearch' => [
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
     * @param VideoTransformer $videoTransformer
     */
    public function __construct(VideoTransformer $videoTransformer)
    {
        parent::__construct();

        $this->videoTransformer = $videoTransformer;
    }

    /**
     * Return all Videos.
     */
    public function getAllVideos()
    {
        $video = Video::all();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return the best Videos.
     */
    public function getBestVideos()
    {
        $video = Video::all()->sortByDesc('likes');

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos only user.
     */
    public function getVideosUser($id)
    {
        $user = User::findOrFail($id);
        $video = $user->getVideos;

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos for Category.
     */
    public function getVideosForCategory($name)
    {
        $video = Video::where('category', $name)->get()->sortByDesc('likes');

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos for Search.
     */
    public function getVideosForSearch($search)
    {
        $video = Video::where("name", "LIKE", "%$search%")->get()->sortBy('name');

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
        $file = $request->file('video');

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category' => 'required',
            'video' => 'mimes:mp4',
        ]);


        if ($validator->fails() || $file == null) {return $this->response->errorWrongArgsValidator($validator);}

        Storage::disk('public')->put('videos/'.$request->input('name').$user->id.'.'.$file->getClientOriginalExtension(), file_get_contents($file->getRealPath()));

        $video = new Video();
        $video->name = $request->input('name');
        $video->category = $request->input('category');
        $video->path = Storage::url('videos/'.$request->input('name').$user->id.'.'.$file->getClientOriginalExtension());
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

        $video->name = $request->input('name');
        $video->category = $request->input('category');
        $video->path =$request->input('path');
        $video->likes = $request->input('likes');
        $video->dislikes = $request->input('dislikes');
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
        Storage::disk('public')->delete($video->path);
        Video::destroy($video->id);
    }
}
