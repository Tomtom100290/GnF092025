<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('Tel1')->setLabel('Tel 1')->setMaxLength(13),
            TextField::new('Tel2')->setLabel('Tel 2')->setMaxLength(13),
            TextField::new('Rue'),
            TextField::new('codePostal')->setMaxLength(5),
            TextareaField::new('infocompl')->setLabel('Infos'),
            TextField::new('Ville'),
            BooleanField::new('topActif')->setLabel('Activé'),
        ];
    }
    
}
