<?php

namespace App\Controller;

use App\Repository\PageCadeauRepository;
use App\Repository\PageGourmandiseRepository;
use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageGourmandiseController extends AbstractController
{
    #[Route('/gourmandise', name: 'app_page_gourmandise')]
    public function index(PageGourmandiseRepository $pageGourmandiseRepository, TypeProduitRepository $TypeProduitRepository): Response
    {
        $produitsCatG = $TypeProduitRepository->findAllActifs();
        $gourmandises = $pageGourmandiseRepository->findAll();
        return $this->render('page_gourmandise/index.html.twig', [
            'Typeproduits' => $produitsCatG,
            'gourmandises' => $gourmandises,
        ]);
    }
}
