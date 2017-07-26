<?php

use App\Comment;
use App\User;
use App\Video;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = Video::find(1);

        for ($i = 1; $i <= 3; $i++) {
            $data = [
                'user_id'  => User::find($i)->id,
                'video_id' => $video->id,
                'comment'  => 'Lorem ipsum comment',
            ];

            Comment::create($data);
        }
    }
}
