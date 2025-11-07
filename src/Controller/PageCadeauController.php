<?php

namespace App\Controller;

use App\Repository\PageCadeauRepository;
use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCadeauController extends AbstractController
{
    #[Route('/cadeauPersonnalise', name: 'app_page_cadeau')]
    public function index(PageCadeauRepository $pageCadeauRepository, TypeProduitRepository $TypeproduitRepository): Response
    {
        $produitsCatC = $TypeproduitRepository->findProduitsCadeaux();
        $cadeaux = $pageCadeauRepository->findAll();

        return $this->render('pages/page_cadeau/index.html.twig', [
            'Typeproduits' => $produitsCatC,
            'cadeaux' => $cadeaux,
        ]);
    }
}
