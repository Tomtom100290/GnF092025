<?php

namespace App\Controller\Admin;

use App\Entity\Papetterie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PapetterieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Papetterie::class;
    }
    // Paramettrage de la page , titre par exemple
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //Parametrage de l'affichage listing, edition, details
            ->setPageTitle(Crud::PAGE_INDEX, 'Page Papeterie')      // titre de la page listing
            ->setPageTitle(Crud::PAGE_EDIT, 'Modification') // titre de la page édition
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détail produit'); // si tu as activé la vue détail
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
                return $action->setLabel('Modifier la Page Papeterie');
            })
            // Modifier le texte du bouton "Delete"
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer produit');
            })
            // Modifier le texte du bouton "New"
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un produit');
            });
    }
}
