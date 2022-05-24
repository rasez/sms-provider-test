<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\SendRequest;
use App\Services\JsonResult;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Services\Sms\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    use JsonResult;

    private $message;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->message = $messageRepository;
    }

    /**
     * @param SendRequest $request
     */
    public function send(SendRequest $request)
    {
        $this->message->store($request);
        return SmsService::send($request->provider, $request->message, $request->receptor, $request->sender);
    }

    public function report(ReportRequest $request)
    {
        $report = $this->message->report($request);
        return $this->result("Report created!", $report);
    }
}
