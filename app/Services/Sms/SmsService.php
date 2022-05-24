<?php
/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 5/22/22
 * Time: 12:09 AM
 */

namespace App\Services\Sms;


use App\Services\Sms\Adapters\Ghasedak;
use App\Services\Sms\Adapters\Kavenegar;
use App\Services\Sms\Interfaces\SmsInterface;

class SmsService
{
    private $message;
    private $receptor;
    private $sender;
    private const PROVIDERS = [
        "kavenegar" => Kavenegar::class,
        "ghasedak" => Ghasedak::class,
    ];

    /**
     * @param $smsProvider
     * @param $message
     * @param $receptor
     * @param $sender
     */
    public static function send($smsProvider, $message, $receptor, $sender)
    {
        $receptors = explode(",", $receptor);
        $providerName = self::PROVIDERS[$smsProvider];
        $provider = new $providerName();
        $result = $provider->send($receptors, $message, $sender);
        return $result;
    }


}
