<?php

use App\Comment;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentAPITest extends TestCase
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

        return $video;
    }

    private function createFakeComment($user_id, $video_id)
    {
        $data = [
                'user_id'  => $user_id,
                'video_id' => $video_id,
                'comment'  => 'Lorem ipsum comment',
            ];

        $comment = Comment::create($data);

        return $comment;
    }

    /**
     * Test comments in database are listed by API.
     *
     * @return void
     */
    public function testCommentsInDatabaseAreListedByAPI()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $this->createFakeComment($user->id, $video->id);

        $this->get('/api/videos/'.$video->id.'/comments')
            ->seeJsonStructure([
                '*' => [
                    '*' => [
                        'user_id', 'video_id', 'comment',
                    ],
                ],
            ])->seeStatusCode(200);
    }

    /**
     * Test store comments and see in DB.
     *
     * @return void
     */
    public function testCanBePostCommentAndSeeInDB()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);

        $data = [
            'user_id'  => $user->id,
            'video_id' => $video->id,
            'comment'  => 'This is example comment',
        ];

        $this->post('/api/videos/'.$video->id.'/comments', $data, ['X-Authorization' => $user->apiKey->key])->seeInDatabase('comments', $data);
        $this->get('/api/videos/'.$video->id.'/comments')->seeJsonContains($data)->seeStatusCode(200);
    }

    /**
     * Test videos can be update and see changes on database.
     *
     * @return void
     */
    public function testCommentsCanBeUpdatedAndSeeChangesInDatabase()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $comment = $this->createFakeComment($user->id, $video->id);
        $request = [
            'id'      => $comment->id,
            'comment' => 'This is example update comment',
        ];
        $data = [
            'id'       => $comment->id,
            'user_id'  => $comment->user_id,
            'video_id' => $comment->video_id,
            'comment'  => 'This is example update comment',
        ];
        $this->put('/api/videos/'.$video->id.'/comments/', $request, ['X-Authorization' => $user->apiKey->key])->seeInDatabase('comments', $data);
        $this->get('/api/videos/'.$video->id.'/comments/')->seeJsonContains($data)->seeStatusCode(200);
    }

    /**
     * Test comments can be deleted and not see on database.
     *
     * @return void
     */
    public function testCommentsCanBeDeletedAndNotSeenOnDatabase()
    {
        $user = $this->createUser();
        $video = $this->createFakeVideo($user);
        $comment = $this->createFakeComment($user->id, $video->id);

        $data = [
            'id'       => $comment->id,
            'user_id'  => $comment->user_id,
            'video_id' => $comment->video_id,
            'comment'  => $comment->comment,
        ];

        $request = [
            'id' => $comment->id,
        ];

        $this->delete('/api/videos/'.$video->id.'/comments', $request, ['X-Authorization' => $user->apiKey->key])->notSeeInDatabase('comments', $data);
        $this->get('/api/videos/'.$video->id.'/comments/')->dontSeeJson($data)->seeStatusCode(200);
    }
}
