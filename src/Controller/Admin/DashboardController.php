<?php

namespace App\Controller\Admin;

use App\Entity\BestSellers;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\HomePage;
use App\Entity\PageCadeau;
use App\Entity\PageGourmandise;
use App\Entity\Papetterie;
use App\Entity\TypeProduit;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // 1.1) If you have enabled the "pretty URLs" feature:
        //return $this->redirectToRoute('admin_user_index');
        //
        // 1.2) Same example but using the "ugly URLs" that were used in previous EasyAdmin versions:
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(TypeProduitCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gift & Fun');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home')->setCssClass('my-dashboard-link');;
        yield MenuItem::section('Paramètre des Données');
        // Lien vers tous les produits
        yield MenuItem::linkToCrud('Tous les produits', 'fa fa-shopping-basket', TypeProduit::class);

        // Section séparée pour les filtres par catégorie
        //yield MenuItem::section('Filtrer par catégorie');

        // Gourmandises
        yield MenuItem::linkToCrud('Gourmandises', 'fa fa-cookie-bite', TypeProduit::class)
            ->setQueryParameter('filters[fkCategorieProduit][comparison]', '=')
            ->setQueryParameter('filters[fkCategorieProduit][value]', 1) // ID de la catégorie Gourmandises
            ->setController(TypeProduitCrudController::class);

        // Cadeaux
        yield MenuItem::linkToCrud('Cadeaux', 'fa fa-gift', TypeProduit::class)
            ->setQueryParameter('filters[fkCategorieProduit][comparison]', '=')
            ->setQueryParameter('filters[fkCategorieProduit][value]', 2) // ID de la catégorie Cadeaux
            ->setController(TypeProduitCrudController::class);

        // Papeterie
        yield MenuItem::linkToCrud('Papeterie', 'fa fa-pencil-alt', TypeProduit::class)
            ->setQueryParameter('filters[fkCategorieProduit][comparison]', '=')
            ->setQueryParameter('filters[fkCategorieProduit][value]', 3) // ID de la catégorie Papeterie
            ->setController(TypeProduitCrudController::class);
        yield MenuItem::section('Paramètre des Clients');
        yield MenuItem::linkToCrud('Clients', 'fas fa-users', Client::class);
        yield MenuItem::section('Paramètre des Catégories');
        yield MenuItem::linkToCrud('Catégories', 'fas fa-tag', Categorie::class);
        // Construction des pages 
        yield MenuItem::section('Paramètre des Pages');
        yield MenuItem::linkToCrud('Page CADEAU', 'fas fa-file', PageCadeau::class);
        yield MenuItem::linkToCrud('Page PAPETTERIE', 'fas fa-file', Papetterie::class);
        yield MenuItem::linkToCrud('Page GOURMANDISE', 'fas fa-file', PageGourmandise::class);
        yield MenuItem::subMenu('Page d\'accueil', 'fa fa-house')->setSubItems([
            MenuItem::linkToCrud('Présentation', 'fa fa-info-circle', HomePage::class),
            MenuItem::linkToCrud('Best Sellers', 'fa fa-star', BestSellers::class),
        ]);
        yield MenuItem::section('Visualisation');
        yield MenuItem::linkToRoute('Aller au site Web', 'fas fa-solid fa-pager', 'app_home');
    }
}
