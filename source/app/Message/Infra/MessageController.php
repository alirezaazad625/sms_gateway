<?php

namespace App\Message\Infra;

use App\Message\Application\MessagesApplication;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Message\Domain\Commands\CreateMessageCommand;

class MessageController extends BaseController
{
    private MessagesApplication $messageApplication;

    public function __construct(MessagesApplication $messageApplication)
    {
        $this->messageApplication = $messageApplication;
    }

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
        $this->messageApplication->create(
            new CreateMessageCommand(
                $request->input("id"),
                $request->input("phone"),
                $request->input("message")
            )
        );
    }
}
