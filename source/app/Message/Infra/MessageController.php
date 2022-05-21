<?php

namespace App\Message\Infra;

use App\Message\Domain\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MessageController extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list(): array
    {
        return ["akbar" => "asghar"];
    }

    function create(Request $request): void
    {
        $request->validate([
            "id" => "required|uuid",
            "phone" => "required|regex:/09[0-9]{9}/",
            "message" => "required|string"
        ]);
        $message = new Message(
            $request->input("id"),
            $request->input("phone"),
            $request->input("message")
        );
        Message::saveOrThrow($message);
    }
}
