<?php
/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 5/22/22
 * Time: 3:56 PM
 */

namespace App\Repositories;


use App\Models\Message;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class MessageRepository implements MessageRepositoryInterface
{
    public function store(Request $request): Message
    {
        $message = new Message;
        $message->sender = $request->sender;
        $message->receptor = $request->receptor;
        $message->message = $request->message;
        $message->save();

        return $message;
    }
    public function report(Request $request): Object
    {
        return Message::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
    }
}
