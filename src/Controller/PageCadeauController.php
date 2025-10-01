<?php

namespace App\Controller;

use App\Repository\PageCadeauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCadeauController extends AbstractController
{
    #[Route('/cadeauPersonnalise', name: 'app_page_cadeau')]
    public function index(PageCadeauRepository $pageCadeauRepository): Response
    {
        $cadeaux = $pageCadeauRepository->findAll();

        return $this->render('pages/page_cadeau/index.html.twig', [
            'cadeaux' => $cadeaux,
        ]);
    }
}
