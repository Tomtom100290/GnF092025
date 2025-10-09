<?php

namespace App\Controller\Admin;

use App\Entity\BestSellers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BestSellersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BestSellers::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            ImageField::new('produit1')->setUploadDir('assets/images/')->setLabel('produit 1'),
            ImageField::new('produit2')->setUploadDir('assets/images/')->setLabel('produit 2'),
            ImageField::new('produit3')->setUploadDir('assets/images/')->setLabel('produit 3'),
        ];
    }
    
}
