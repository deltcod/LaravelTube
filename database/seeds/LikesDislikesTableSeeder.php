<?php

use App\LikeDislike;
use App\User;
use App\Video;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Database\Seeder;

class LikesDislikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = Video::find(1);
        $type = [
            'like',
            'dislike',
        ];

        for ($i = 0; $i < 100; $i++) {
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
