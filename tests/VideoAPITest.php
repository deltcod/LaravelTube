<?php

use App\User;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: adam
 * Date: 22/04/16
 * Time: 09:18.
 */
class VideoAPITest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Create fake user.
     *
     * @return mixed
     */
    public function createUser()
    {
        $user = factory(App\User::class)->create();
        $user->apiKey = $this->createUserApiKey($user);

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
        $apiKey->save();

        return $apiKey->key;
    }

    /**
     * Create fake video.
     *
     * @return \App\Video
     */
    private function createFakeVideo($user)
    {
        $faker = Faker\Factory::create();
        $video = new \App\Video();
        $video->name = $faker->sentence;
        $video->category = $faker->word;
        $video->path = $faker->url;
        $video->likes = $faker->randomDigitNotNull;
        $video->dislikes = $faker->randomDigitNotNull;
        $user->getVideos()->save($video);

        return $video;
    }

    /**
     * Create fake videos.
     *
     * @param int $count
     *
     * @return \App\Video
     */
    private function createFakeVideos($count = 10)
    {
        $user = $this->createUser();
        foreach (range(0, $count) as $number) {
            $this->createFakeVideo($user);
        }
    }

    /**
     * Test video is an api then returns JSON.
     *
     * @return void
     */
    public function testVideoUseJson()
    {
        $this->get('/api/videos')->seeJson()->seeStatusCode(200);
    }

    /**
     * Test videos in database are listed by API.
     *
     * @return void
     */
    public function testVideosInDatabaseAreListedByAPI()
    {
        $this->createFakeVideos();
        $this->get('/api/videos')
            ->seeJsonStructure([
                '*' => [
                    '*' => [
                        'category', 'dislikes', 'likes', 'name', 'path',
                    ],
                ],
            ])->seeStatusCode(200);
    }

    /**
     * Test Video Return 404 on video not exsists.
     *
     * @return void
     */
    public function testVideoReturn404OnVideoNotExsists()
    {
        $this->get('/api/videos/50000')->seeJson()->seeStatusCode(404);
    }

    /**
     * Test best videos is an api then returns JSON.
     *
     * @return void
     */
    public function testBestVideosUseJson()
    {
        $this->get('/api/videos/best')->seeJson()->seeStatusCode(200);
    }

    /**
     * Test videos user is an api then returns JSON.
     *
     * @return void
     */
    public function testVideosUserUseJson()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $this->get('/api/videos/user'.$user->id)->seeJsonContains(['name' => $video->name, 'category' => $video->category, 'path' => $video->path, 'likes' => $video->likes, 'dislikes' => $video->dislikes])
            ->seeStatusCode(200);
    }

    /**
     * Test videos for category is an api then returns JSON.
     *
     * @return void
     */
    public function testVideosForCategory()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $this->get('/api/videos/category/'.$video->category)->seeJsonContains(['name' => $video->name, 'category' => $video->category, 'path' => $video->path, 'likes' => $video->likes, 'dislikes' => $video->dislikes])
            ->seeStatusCode(200);
    }

    /**
     * Test video in database is shown by API.
     *
     * @return void
     */
    public function testVideoInDatabaseAreShownByAPI()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $this->get('/api/videos/'.$video->id)->seeJsonContains(['name' => $video->name, 'category' => $video->category, 'path' => $video->path, 'likes' => $video->likes, 'dislikes' => $video->dislikes])
            ->seeStatusCode(200);
    }

    /**
     * Test videos Unauthorized posted without apikey.
     *
     * @return void
     */
    public function testVideosUnauthorizedPostedWithoutApiKey()
    {
        $data = ['name' => 'Foobar', 'category' => 'Movie', 'path' => '/videos/foobar.mp4', 'likes' => 0, 'dislikes' => 0];
        $this->post('/api/videos', $data)->seeStatusCode(401)->seeJsonContains(['message' => 'Unauthorized']);
    }

    /**
     * Test videos can be posted and saved to database.
     *
     * @return void
     */
    public function testVideosCanBePostedAndSavedIntoDatabase()
    {
        $user = $this->createUser();
        $data = ['name' => 'Foobar', 'category' => 'Movie', 'path' => '/videos/foobar.mp4', 'likes' => 0, 'dislikes' => 0];
        $this->post('/api/videos', $data, ['X-Authorization' => $user->apiKey])->seeInDatabase('videos', $data);
        $this->get('/api/videos')->seeJsonContains(['name' => 'Foobar', 'category' => 'Movie', 'path' => '/videos/foobar.mp4', 'likes' => 0, 'dislikes' => 0])
            ->seeStatusCode(200);
    }

    /**
     * Test videos can be update and see changes on database.
     *
     * @return void
     */
    public function testVideosCanBeUpdatedAndSeeChangesInDatabase()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $data = ['name' => 'V for Vendetta', 'category' => 'Movie', 'path' => '/videos/foobar.mp4', 'likes' => 450, 'dislikes' => 254];
        $this->put('/api/videos/'.$video->id, $data, ['X-Authorization' => $user->apiKey])->seeInDatabase('videos', $data);
        $this->get('/api/videos')->seeJsonContains([$data = ['name' => 'V for Vendetta', 'category' => 'Movie', 'path' => '/videos/foobar.mp4', 'likes' => 450, 'dislikes' => 254]])->seeStatusCode(200);
    }

    /**
     * Test videos can be deleted and not see on database.
     *
     * @return void
     */
    public function testVideosCanBeDeletedAndNotSeenOnDatabase()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $data = ['name' => $video->name, 'category' => $video->category, 'path' => $video->path];
        $this->delete('/api/videos/'.$video->id, ['X-Authorization' => $user->apiKey])->notSeeInDatabase('videos', $data);
        $this->get('/api/videos')->dontSeeJson($data)->seeStatusCode(200);
    }
}
