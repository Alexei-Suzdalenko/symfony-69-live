<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SentMailController extends AbstractController
{
    /**
     * @Route("/email", name="sent_mail")
     */
    public function index(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('alexei.saron@gmail.com')
            ->to('alexander.web.app.developer@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

     //   dump($email);

        $mailer->send($email);

        echo 'ok';

        die();

    }
}
