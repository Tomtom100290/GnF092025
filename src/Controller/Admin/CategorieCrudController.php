<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

     public function configureActions(Actions $actions): Actions
    {

        return $actions
            // Modifier le texte du bouton "Save" sur la page EDIT
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Enregistrer et retour');
            })

            // Mettre "EDIT" dans les trois petits points
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })

            // Même chose pour DELETE si tu veux
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            // Modifier le texte du bouton "New"
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter une Catégorie');
            })
            // Ordre dans la colonne Actions
            ->reorder(Crud::PAGE_INDEX, [
                Action::EDIT,
                Action::DELETE,
            ]);
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextareaField::new('description'),
            TextField::new('slug'),
            TextField::new('codecategorie')->setFormTypeOption('attr', [
            'maxlength' => 3,                // Limite de 3 caractères
            'style' => 'text-transform: uppercase', // Forçage visuel des majuscules
            //'pattern' => '[A-Z]{3}',         // Validation HTML5 : 3 lettres majuscules
            'title' => 'Utiliser uniquement 3 lettres majuscules',
            ])->setLabel('Code Catégorie'),
            BooleanField::new('topActif')->setLabel('Activé'),
        ];
    }
    
}
