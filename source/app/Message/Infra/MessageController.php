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

    function list(Request $request): array
    {
        $request->validate([
            "page" => "int",
            "pageSize" => "int"
        ]);
        $page = $request->input('page') == "" ? 0 : intval($request->input('page'));
        $pageSize = $request->input('pageSize') == "" ? 15 : intval($request->input('pageSize'));
        return $this->messageApplication->list($page, $pageSize);
    }

    function create(Request $request): void
    {
        $request->validate([
            "uuid" => "required|uuid",
            "phone" => "required|regex:/09[0-9]{9}/",
            "message" => "required|string"
        ]);
        $this->messageApplication->create(
            new CreateMessageCommand(
                $request->input("uuid"),
                $request->input("phone"),
                $request->input("message")
            )
        );
    }
}
