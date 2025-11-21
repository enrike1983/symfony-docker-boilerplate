<?php

namespace App\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
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

            return 'Message sent!';

        } catch (TransportExceptionInterface $e) {
            return $e->getMessage();
        }
    }
}
