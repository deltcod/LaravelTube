<?php

use App\LikeDislike;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LikeDislikeAPITest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Create fake user.
     *
     * @return mixed
     */
    public function createUser()
    {
        $user = factory(User::class)->create();
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

    /**
     * Create fake video.
     *
     * @return \App\Video
     */
    private function createFakeVideo($user)
    {
        $faker = Faker\Factory::create();
        $video = new Video();
        $video->name = $faker->sentence;
        $video->category = $faker->word;
        $video->path = $faker->url;
        $user->getVideos()->save($video);

        $this->createFakeLikes($video->id);

        return $video;
    }

    private function createFakeLikes($video_id)
    {
        $video = Video::find($video_id);
        $type = [
            'like',
            'dislike',
        ];

        for ($i = 0; $i < 10; $i++) {
            $user = $this->createUser();
            $key = array_rand($type);

            $data = [
                'user_id'  => $user->id,
                'video_id' => $video->id,
                'type'     => $type[$key],
            ];

            LikeDislike::create($data);
        }
    }

    /**
     * Test likes in database are listed by API.
     *
     * @return void
     */
    public function testLikesInDatabaseAreListedByAPI()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);

        $this->get('/api/videos/'.$video->id.'/likes')
            ->seeJsonStructure([
                '*' => [
                    '*' => [
                        'user_id', 'video_id', 'type',
                    ],
                ],
            ])->seeStatusCode(200);
    }

    /**
     * Test dislikes in database are listed by API.
     *
     * @return void
     */
    public function testDislikesInDatabaseAreListedByAPI()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $this->get('/api/videos/'.$video->id.'/dislikes')
            ->seeJsonStructure([
                '*' => [
                    '*' => [
                        'user_id', 'video_id', 'type',
                    ],
                ],
            ])->seeStatusCode(200);
    }

    /**
     * Test likes count return integer.
     *
     * @return void
     */
    public function testLikesCountReturnInteger()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $count = $this->get('/api/videos/'.$video->id.'/likes/count');

        $this->assertTrue(is_int($count->response->original));
    }

    /**
     * Test dislikes count return integer.
     *
     * @return void
     */
    public function testDisikesCountReturnInteger()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $count = $this->get('/api/videos/'.$video->id.'/dislikes/count');

        $this->assertTrue(is_int($count->response->original));
    }

    /**
     * Test store like and see in DB.
     *
     * @return void
     */
    public function testCanBePostLikeAndSeeInDB()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);

        $data = [
            'user_id'  => $user->id,
            'video_id' => $video->id,
            'type'     => 'like',
        ];

        $this->post('/api/videos/'.$video->id.'/like-dislike', $data, ['X-Authorization' => $user->apiKey->key])->seeInDatabase('likes_dislikes', $data);
        $this->get('/api/videos/'.$video->id.'/likes')->seeJsonContains($data)->seeStatusCode(200);
    }

    /**
     * Test delete likeDislike and not see in DB.
     *
     * @return void
     */
    public function testCanBeDeleteLikeAndSeeInDB()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);

        $data = [
            'user_id'  => $user->id,
            'video_id' => $video->id,
            'type'     => 'like',
        ];

        LikeDislike::create($data);

        $this->post('/api/videos/'.$video->id.'/like-dislike', $data, ['X-Authorization' => $user->apiKey->key])->notSeeInDatabase('likes_dislikes', $data);
        $this->get('/api/videos/'.$video->id.'/likes')->dontSeeJson([$data])->seeStatusCode(200);
    }

    /**
     * Test update type likeDislike and not see in DB.
     *
     * @return void
     */
    public function testCanBeUpdateTypeLikeAndSeeInDB()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);

        $data = [
            'user_id'  => $user->id,
            'video_id' => $video->id,
            'type'     => 'like',
        ];

        LikeDislike::create($data);

        $dataUpdate = [
            'user_id'  => $user->id,
            'video_id' => $video->id,
            'type'     => 'dislike',
        ];

        $this->post('/api/videos/'.$video->id.'/like-dislike', $dataUpdate, ['X-Authorization' => $user->apiKey->key])->seeInDatabase('likes_dislikes', $dataUpdate);
        $this->get('/api/videos/'.$video->id.'/dislikes')->seeJsonContains($dataUpdate)->seeStatusCode(200);
    }
}
