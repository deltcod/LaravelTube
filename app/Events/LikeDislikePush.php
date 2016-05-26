<?php

namespace App\Events;

use App\Events\Event;
use App\LikeDislike;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class LikeDislikePush
 * @package App\Events
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
