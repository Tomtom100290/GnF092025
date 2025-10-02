<?php

namespace App\Controller;

use App\Repository\PageCadeauRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCadeauController extends AbstractController
{
    #[Route('/cadeauPersonnalise', name: 'app_page_cadeau')]
    public function index(PageCadeauRepository $pageCadeauRepository, ProduitRepository $produitRepository): Response
    {   
       $produitsCatF = $produitRepository->findProduitsFriandises();
        $cadeaux = $pageCadeauRepository->findAll();

        return $this->render('pages/page_cadeau/index.html.twig', [
            'produits' => $produitsCatF,
            'cadeaux' => $cadeaux,
        ]);
    }
}
