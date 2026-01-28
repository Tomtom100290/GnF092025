<?php

namespace App\Controller;

use App\Entity\TypeProduit;
use App\Repository\PapetterieRepository;
use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PapetterieController extends AbstractController
{
    #[Route('/papetterie', name: 'app_papetterie')]
    public function index(PapetterieRepository $Pagepapetterie, TypeProduitRepository $typeProduitRepository): Response
    {

        $produitsCatP = $typeProduitRepository->findProduitsPapetterie();
        $papetteries = $Pagepapetterie->findAll();
        return $this->render('papetterie/index.html.twig', [
            'Typeproduits' => $produitsCatP,
            'papetteries' => $papetteries,
        ]);
    }
    #[Route('/papetterie/{id}', name: 'app_page_gourmandise_detail', methods: ['GET'])]
    public function detail(TypeProduit $Typeproduit): Response
    {
        // $Typeproduit est injecté automatiquement grâce au ParamConverter
        return $this->render('page_gourmandise/detail.html.twig', [
            'Typeproduit' => $Typeproduit,
        ]);
    }
}
