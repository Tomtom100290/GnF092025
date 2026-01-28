<?php

namespace App\Controller;

use App\Entity\TypeProduit;
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


        return $this->render('pages/page_cadeau/index2.html.twig', [
            'Typeproduits' => $produitsCatC,
            'cadeaux' => $cadeaux,

        ]);
    }
    #[Route('/cadeauPersonnalise/{id}', name: 'app_page_gourmandise_detail', methods: ['GET'])]
    public function detail(TypeProduit $Typeproduit): Response
    {
        // $Typeproduit est injecté automatiquement grâce au ParamConverter
        return $this->render('page_gourmandise/detail.html.twig', [
            'Typeproduit' => $Typeproduit,
        ]);
    }
}
