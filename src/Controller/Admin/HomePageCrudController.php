<?php

namespace App\Controller\Admin;

use App\Entity\HomePage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
//Pour modifier les actions comme "Editer", "Supprimer"..
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
//Pour Parametrer l'affichage d'une page du dashboard
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class HomePageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomePage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('h1')->setLabel('Titre'),
            TextField::new('h2')->setLabel('Sous-Titre'),
            TextareaField::new('paragraphe')->setLabel('Présentation'),
            ImageField::new('img')->setUploadDir('assets/images/')->setLabel('Illustration'),
        ];
    }
    // Pour désactiver l'option supprimer dans le dash bord dans 
    //la configuration de la partie entête de la page d'accueil
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier la page'); //Modifie le libellé du bouton Editer
            })


            ->disable(Action::DELETE, Action::NEW); // Désactive le bouton Supprimer
    }

    // Paramettrage de la page , titre par exemple
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //Parametrage de l'affichage listing, edition, details
            ->setPageTitle(Crud::PAGE_INDEX, 'Parametrage entête page d\'Accueil')      // titre de la page listing
            ->setPageTitle(Crud::PAGE_EDIT, 'Modification') // titre de la page édition
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détail de l\'entête'); // si tu as activé la vue détail
    }
}
