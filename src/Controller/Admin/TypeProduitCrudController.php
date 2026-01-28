<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\TypeProduit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TypeProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeProduit::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        // --- Nouveau bouton "Voir" ---
        $voirProduit = Action::new('voirClient', 'Voir', 'fa fa-eye')
            ->linkToCrudAction('detail')
            ->addCssClass('btn btn-primary btn-sm'); // bouton bleu

        return $actions
            ->add(Crud::PAGE_INDEX, $voirProduit)

            // Mettre "EDIT" dans les trois petits points
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })

            // Même chose pour DELETE si tu veux
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })

            // Ordre dans la colonne Actions
            ->reorder(Crud::PAGE_INDEX, [
                'voirClient',
                Action::EDIT,
                Action::DELETE,
            ]);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(
                EntityFilter::new('fkCategorieProduit')
                    ->setLabel('Catégorie')
            );
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('fkCategorieProduit')->setLabel('Catégorie'),
            TextField::new('Libelle'),
            TextField::new('slug'),
            TextareaField::new('Description'),
            MoneyField::new('prix')->setCurrency('EUR')
                ->setStoredAsCents(false)
                ->setNumDecimals(2),
            //DateField::new('DateAchat')->setLabel('Date d\'achat'),
            //DateField::new('Dlc')->setLabel('DLC'),
            //TextField::new('NumLot')->setLabel('Numéro de lot'),
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
