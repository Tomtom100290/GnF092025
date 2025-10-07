<?php

namespace App\Controller\Admin;

use App\Entity\HomePage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HomePageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomePage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('h1'),
            TextField::new('h2'),
            TextareaField::new('paragraphe'),
            ImageField::new('img')->setUploadDir('assets/images/'),
        ];
    }
    
}
