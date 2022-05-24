<?php

namespace App\Services\Sms\Jobs;

use Ghasedak\Laravel\GhasedakFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GhasedakJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $receptor;
    private $message;
    private $sender;
    /**
     * KaveanegarJob constructor.
     * @param $receptor
     * @param $message
     * @param $sender
     */
    public function __construct($receptor, $message, $sender)
    {

        $this->receptor = $receptor;
        $this->message = $message;
        $this->sender = $sender;
    }

    public function handle()
    {
        GhasedakFacade::SendSimple($this->receptor, $this->message, $this->sender);
    }
}
