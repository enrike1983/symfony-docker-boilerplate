<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MiscController extends AbstractController
{
    #[Route('/misc', name: 'app_misc')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('success', 'Form inviato con successo!');
            return $this->redirectToRoute('app_misc');
        }

        return $this->render('misc/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
