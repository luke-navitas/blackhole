<?php

namespace Navitas\Blackhole;

use Illuminate\Mail\Transport\Transport;
use Swift_Mime_SimpleMessage;

class BlackholeTransport extends Transport
{
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        return $this->numberOfRecipients($message);
    }

    public function __toString(): string
    {
        return 'blackhole';
    }
}
