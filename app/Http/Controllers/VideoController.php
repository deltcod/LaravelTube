<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoUploadRequest;
use App\Repositories\UserRepository as User;
use App\Repositories\VideoRepository as Video;
use App\Transformers\VideoTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
     *
     * @param VideoTransformer $videoTransformer
     * @param Video            $video
     * @param User             $user
     */
    public function __construct(Video $video, User $user, VideoTransformer $videoTransformer)
    {
        parent::__construct();

        $this->videoTransformer = $videoTransformer;
        $this->video = $video;
        $this->user = $user;
    }

    /**
     * Return all Videos.
     */
    public function getAllVideos()
    {
        $video = $this->video->all();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return the best Videos.
     */
    public function getBestVideos()
    {
        $video = $this->video->best();

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos only user.
     */
    public function getVideosUser($id)
    {
        $user = $this->user->findOrFail($id);
        $video = $user->getVideos;

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos for Category.
     */
    public function getVideosForCategory($name)
    {
        $video = $this->video->findBy('category', $name);

        return $this->response->withCollection($video, $this->videoTransformer);
    }

    /**
     * Return Videos for Search.
     */
    public function getVideosForSearch($search)
    {
        $video = $this->video->search('name', $search);

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
        $user = $this->user->authenticated();
        $file = $request->video;
        $nameFile = str_replace(' ', '', $request->input('name').$user->id);

        $data = [
            'name'     => $request->input('name'),
            'category' => $request->input('category'),
            'path'     => Storage::url('videos/'.$nameFile),
            'user_id'  => $user->id,
        ];

        $video = $this->video->create($data);

        $this->saveAndConvert($file, $nameFile);

        return $this->response->withItem($video, $this->videoTransformer);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $video = $this->video->findOrFail($id);

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
        $video = $this->video->findOrFail($id);

        $this->video->update($request->all(), $id);

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
        $video = $this->video->findOrFail($id);

        $nameFile = str_replace('storage/', '', $video->path);

        Storage::disk('public')->delete([$nameFile.'.mp4', $nameFile.'.webm']);

        $this->video->delete($id);
    }

    /**
     * Save and Convert to webm video.
     *
     * @param $video
     * @param $name
     */
    private function saveAndConvert($video, $name)
    {
        Storage::disk('public')->put('videos/'.$name.'.mp4', file_get_contents($video->getRealPath()));

        FFMPEG::convert()
            ->input($video->getRealPath())
            ->output(storage_path('app/public/videos/').$name.'.webm')
            ->overwrite(true)
            ->go();
    }
}
