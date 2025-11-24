<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class MailSentEvent extends Event
{
    public const NAME = 'mail_sent.event';
    private string $to;

    public function __construct(string $to)
    {
        $this->to = $to;
    }

    public function getTo(): string
    {
        return $this->to;
    }
}

