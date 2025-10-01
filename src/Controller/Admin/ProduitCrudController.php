<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('Libelle'),
            TextareaField::new('Description'),
            DateField::new('DateAchat')->setLabel('Date d\'achat'),
            DateField::new('Dlc')->setLabel('DLC'),
            TextField::new('NumLot')->setLabel('Numéro de lot'),
           // AssociationField::new('categorie')->setLabel('Catégorie'),
            BooleanField::new('topActif')->setLabel('Activé'),
        ];
    }
    
}
