<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = new Video();
        $video->name = 'demo';
        $video->category = 'Movie';
        $video->path = storage_path('videos/demo.mp4');
        $video->likes = 450;
        $video->dislikes = 250;
        $video->save();
    }
}
