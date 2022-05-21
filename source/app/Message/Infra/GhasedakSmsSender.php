<?php


namespace App\Message\Infra;


use App\Message\Application\Ports\MessageSenderService;
use Ghasedak\GhasedakApi;

class GhasedakSmsSender implements MessageSenderService
{

    private GhasedakApi $ghasedakApi;

    /**
     * @param GhasedakApi $ghasedakApi
     */
    public function __construct(GhasedakApi $ghasedakApi)
    {
        $this->ghasedakApi = $ghasedakApi;
    }


    function send(string $receiver, string $message)
    {
        $this->ghasedakApi->SendSimple($receiver, $message);
    }
}
