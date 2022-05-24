<?php
/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 5/22/22
 * Time: 12:05 AM
 */

namespace App\Services\Sms\Interfaces;
/**
 * Interface SmsInterface
 * @package App\Services\Sms\Interfaces
 */
interface SmsInterface
{
    public function send(array $receptor, string $message, int $sender);
}
