<?php

namespace App\Controller\Admin;

use App\Entity\Papetterie;
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
}
