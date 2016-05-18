<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoUploadRequest;
use App\Transformers\VideoTransformer;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Linkthrow\Ffmpeg\Classes\FFMPEG;

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
     * @var Video
     */
    protected $video;

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
     * @param Video $video
     */
    public function __construct(Video $video, VideoTransformer $videoTransformer)
    {
        parent::__construct();

        $this->videoTransformer = $videoTransformer;
        $this->video = $video;
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
     * @param VideoUploadRequest $request
     *
     * @return mixed
     */
    public function store(VideoUploadRequest $request)
    {

        $user = Auth::user();
        $file = $request->video;
        $nameFile = str_replace(' ', '', $request->input('name').$user->id);

        $this->saveAndConvert($file, $nameFile);

        $video = $this->video;
        $video->name = $request->input('name');
        $video->category = $request->input('category');
        $video->path = Storage::url('videos/'.$nameFile);

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
        $video->likes = $request->input('likes');
        $video->dislikes = $request->input('dislikes');
        $video->save();

        return $this->response->withItem($video, $this->videoTransformer);
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

        $nameFile = str_replace('storage/', '', $video->path);

        Storage::disk('public')->delete([$nameFile.'.mp4', $nameFile.'.webm']);

        Video::destroy($video->id);
    }

    private function saveAndConvert($video, $name)
    {
        Storage::disk('public')->put('videos/'.$name.'.mp4', file_get_contents($video->getRealPath()));

        FFMPEG::convert()
            ->input($video->getRealPath())
            ->output(storage_path('app/public/videos/').$name.'.webm')
            ->go();
    }
}
