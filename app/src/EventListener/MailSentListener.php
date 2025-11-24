<?php

namespace App\EventListener;

use App\Event\MailSentEvent;
use Psr\Log\LoggerInterface;

class MailSentListener
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param MailSentEvent $event
     */
    public function onEmailSent(MailSentEvent $event): void
    {
        $this->logger->info(sprintf('Nuova email inviata a %s :', $event->getTo()));
    }
}
