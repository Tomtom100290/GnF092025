<?php

namespace App\Controller\Admin;

use App\Entity\PageGourmandise;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageGourmandiseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageGourmandise::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('h1'),
            TextField::new('h2'),
            TextareaField::new('paragraphe'),
            ImageField::new('img')
            ->setUploadDir('assets/images/'),
            
        ];
    }
    //Configure le titre de chaque page ( INDEX, NOUVEAU...,MODIFIER..., DETAILS DU PRODUIT)
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion de la Page Gourmandise')
            ->setPageTitle(Crud::PAGE_NEW, 'Nouvelle page')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modification Page Gourmandise')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails de la Page Gourmandise');
    }
    //Configure le label des bouton EDIT, DELETE, NEW...
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // Modifier le texte du bouton "Save" sur la page EDIT
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Enregistrer et retour');
            })
            // Modifier le texte du bouton "Save" sur la page EDIT
            //->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
            //return $action->setLabel('Enregistrer les modifications');})
            // Retirer le bouton Save sur la page EDIT
            //->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
            // Modifier le texte du bouton "Edit"
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier la page');
            })
            // Modifier le texte du bouton "Delete"
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer la page GOURMANDISE');
            })
            // Modifier le texte du bouton "New"
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter une nouvelle page GOURMANDISE');
            })

            /*----LIMITATION-----*/
            // Afficher le bouton DELETE seulement pour ROLE_ADMIN
        ->update(Crud::PAGE_INDEX, Action::DELETE, fn(Action $action) => $action->displayIf(fn($entity) => $this->isGranted('ROLE_ADMIN')))

        // Afficher le bouton AJOUTER seulement pour ROLE_ADMIN
        ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $action) => $action->displayIf(fn($entity) => $this->isGranted('ROLE_ADMIN')));
    }
}
