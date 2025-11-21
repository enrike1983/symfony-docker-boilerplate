<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class MailController extends AbstractController
{
    #[Route('/mail', name: 'app_mail')]
    public function index(MailerService $mailerService): JsonResponse
    {
        $mailerService->send('test@test.com', 'test@test.com', 'ciao!', 'test body');

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MailController.php',
        ]);
    }
}
