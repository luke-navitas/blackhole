<?php

namespace Navitas\Blackhole;

use Illuminate\Mail\MailManager;

class BlackholeMailManager extends MailManager
{
    protected function createBlackholeTransport()
    {
        return new BlackholeTransport();
    }
}