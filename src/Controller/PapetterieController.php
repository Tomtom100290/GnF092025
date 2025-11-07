<?php

namespace App\Controller;

use App\Repository\PapetterieRepository;
use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PapetterieController extends AbstractController
{
    #[Route('/papetterie', name: 'app_papetterie')]
    public function index(PapetterieRepository $papetterie, TypeProduitRepository $typeProduitRepository): Response
    {

       $produitsCatP = $typeProduitRepository->findProduitsPapetterie();
        $papetteries = $papetterie->findAll();
        return $this->render('papetterie/index.html.twig', [
            'Typeproduits' => $produitsCatP,
            'papetteries' => $papetteries,
        ]);
    }
}
