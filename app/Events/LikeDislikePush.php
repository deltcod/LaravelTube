<?php

namespace App\Events;

use App\LikeDislike;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

/**
 * Class LikeDislikePush.
 */
class LikeDislikePush extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var LikeDislike
     */
    public $likeDislike;

    /**
     * LikeDislikePush constructor.
     *
     * @param LikeDislike $likeDislike
     */
    public function __construct(LikeDislike $likeDislike)
    {
        $this->likeDislike = $likeDislike;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['likedislike-push'];
    }
}
