<?php

namespace App\Controller\Admin;

use App\Entity\PageCadeau;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCadeauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageCadeau::class;
    }


    //Configure le tableau et ses champs à afficher
    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('H1')->setLabel('Titre principal'),
            TextField::new('H2')->setLabel('Sous-titre'),
            TextareaField::new('Paragraphe')->setLabel('Contenue Texte'),
            ImageField::new('Img')->setLabel('Illustration')
                ->setUploadDir('assets/images/'),

        ];
    }

    //Configure le titre de chaque page ( INDEX, NOUVEAU...,MODIFIER..., DETAILS DU PRODUIT)
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setPageTitle(Crud::PAGE_INDEX, 'Page Cadeaux')
            ->setPageTitle(Crud::PAGE_NEW, 'Nouvelle page')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modification')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détail produit ');
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
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
            // Modifier le texte du bouton "Edit"
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier la Page Cadeau');
            })
            // Modifier le texte du bouton "Delete"
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer le cadeau');
            })
            // Modifier le texte du bouton "New"
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un cadeau');
            });
    }
}
