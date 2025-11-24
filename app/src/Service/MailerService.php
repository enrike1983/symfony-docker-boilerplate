<?php

namespace App\Service;

use App\Event\MailSentEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private MailerInterface $mailer;
    private EventDispatcherInterface $eventDispatcher;

    /**
     * @param MailerInterface $mailer
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(MailerInterface $mailer, EventDispatcherInterface $eventDispatcher)
    {
        $this->mailer = $mailer;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function send(string $from, string $to, string $subject, string $body): string
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->text($body)
            ->html($body);

        try {
            $this->mailer->send($email);

            // dispatch mail sent event
            $event = new MailSentEvent($to);
            $this->eventDispatcher->dispatch($event, MailSentEvent::NAME);

            return 'Message sent!';

        } catch (TransportExceptionInterface $e) {
            return $e->getMessage();
        }
    }
}
