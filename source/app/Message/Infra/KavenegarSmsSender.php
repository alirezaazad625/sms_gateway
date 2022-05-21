<?php


namespace App\Message\Infra;


use App\Message\Application\Ports\MessageSenderService;
use Kavenegar\KavenegarApi;

class KavenegarSmsSender implements MessageSenderService
{

    private KavenegarApi $kavenegarApi;
    private string $senderPhoneNumber;

    /**
     * @param KavenegarApi $kavenegarApi
     * @param string $senderPhoneNumber
     */
    public function __construct(KavenegarApi $kavenegarApi, string $senderPhoneNumber)
    {
        $this->kavenegarApi = $kavenegarApi;
        $this->senderPhoneNumber = $senderPhoneNumber;
    }


    function send(string $receiver, string $message)
    {
        $this->kavenegarApi->Send($this->senderPhoneNumber, $receiver, $message);
    }
}
