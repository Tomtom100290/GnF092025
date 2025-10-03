<?php

namespace App\Controller\Admin;

use App\Entity\TypeProduit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TypeProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeProduit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('Libelle'),
            TextField::new('slug'),
            TextareaField::new('Description'),
            MoneyField::new('prix')->setCurrency('EUR'),
            //DateField::new('DateAchat')->setLabel('Date d\'achat'),
            //DateField::new('Dlc')->setLabel('DLC'),
            //TextField::new('NumLot')->setLabel('Numéro de lot'),
            AssociationField::new('fkCategorieProduit')->setLabel('Catégorie'),
            BooleanField::new('topActif')->setLabel('Activé'),
             // Affiche l'image seulement dans la liste et détail
        ImageField::new('illustration')
            //->setUploadDir('public/images/')
            ->setBasePath('/images')
            ->onlyOnIndex(),

        // Champ upload avec VichUploader, uniquement dans les formulaires (new/edit)
        Field::new('imageFile')
            ->setFormType(VichImageType::class)
            ->onlyOnForms()
            ->setLabel('Image d\'illustartion'),
        TextField::new('illustration')
    ->onlyOnIndex(), // Pour voir le contenu de la colonne
        ];
    }
    
}
