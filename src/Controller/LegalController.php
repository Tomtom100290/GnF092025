<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LegalController extends AbstractController
{
    #[Route('/mentions-legales', name: 'legal_mentions')]
    public function mentionsLegales(): Response
    {
        return $this->render('legal/mentionslegales.html.twig');
    }

    #[Route('/cgv', name: 'legal_cgv')]
    public function cgv(): Response
    {
        return $this->render('legal/cgv.html.twig');
    }
}
