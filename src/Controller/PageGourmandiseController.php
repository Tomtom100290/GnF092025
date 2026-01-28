<?php

namespace App\Controller;

use App\Entity\TypeProduit;
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
        $produitsCatG = $TypeProduitRepository->findProduitsGourmandises();
        $gourmandises = $pageGourmandiseRepository->findAll();
        return $this->render('page_gourmandise/index.html.twig', [
            'Typeproduits' => $produitsCatG,
            'gourmandises' => $gourmandises,
        ]);
    }
    #[Route('/gourmandise/{id}', name: 'app_page_gourmandise_detail', methods: ['GET'])]
    public function detail(TypeProduit $Typeproduit): Response
    {
        // $Typeproduit est injecté automatiquement grâce au ParamConverter
        return $this->render('page_gourmandise/detail.html.twig', [
            'Typeproduit' => $Typeproduit,
        ]);
    }
}
