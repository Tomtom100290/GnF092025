<?php

namespace App\Controller;

use App\Repository\TypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(TypeProduitRepository $TypeproduitRepository): Response
    {
        $Typeproduits = $TypeproduitRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'Typeproduits' => $Typeproduits,
        ]);
    }
}
