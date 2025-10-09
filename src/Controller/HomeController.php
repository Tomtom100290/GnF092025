<?php

namespace App\Controller;

use App\Entity\BestSellers;
use App\Repository\BestSellersRepository;
use App\Repository\HomePageRepository;
use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(TypeProduitRepository $TypeproduitRepository, HomePageRepository $homePageRepository, BestSellersRepository $bestSellersRepository): Response
    {
        $Typeproduits = $TypeproduitRepository->findAll();
        $homepageG = $homePageRepository->findAll();
        $bestsellers =$bestSellersRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'Typeproduits' => $Typeproduits,
            'homepageG' => $homepageG,
            'bestsellers' => $bestsellers
        ]);
    }
}
