<?php
/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 5/22/22
 * Time: 12:07 AM
 */

namespace App\Services\Sms\Adapters;


use App\Services\JsonResult;
use App\Services\Sms\Interfaces\SmsInterface;
use App\Services\Sms\Jobs\GhasedakJob;

class Ghasedak implements SmsInterface
{
    use JsonResult;
    /**
     * @param array $receptor
     * @param string $message
     * @param int $sender
     * @return object
     */

    public function send(array $receptor, string $message, int $sender)
    {
        try {
            dispatch(new GhasedakJob($receptor, $message, $sender));
            return $this->result("Message Sent!", "success");
        } catch (\Exception $e) {
            return $e->errorMessage();
        }
    }
}
