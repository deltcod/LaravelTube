<?php

use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->createUser();
        $video = new Video();
        $video->name = 'demo';
        $video->category = 'Movie';
        $video->path = Storage::url('videos/demo');

        $user->getVideos()->save($video);
    }

    /**
     * Create fake user.
     *
     * @return mixed
     */
    public function createUser()
    {
        $user = factory(App\User::class)->create();
        $this->createUserApiKey($user);

        return $user;
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    private function createUserApiKey(User $user)
    {
        $apiKey = ApiKey::make($user->id);
        $user->apiKey()->save($apiKey);
    }
}
