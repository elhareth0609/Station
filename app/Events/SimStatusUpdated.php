<?php
namespace App\Events;

use App\Models\Sim;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SimStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sim;

    public function __construct(Sim $sim)
    {
        $this->sim = $sim;
    }
}
