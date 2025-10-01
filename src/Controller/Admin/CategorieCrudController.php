<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
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
