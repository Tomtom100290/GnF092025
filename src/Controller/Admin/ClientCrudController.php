<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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

    public function configureActions(Actions $actions): Actions
    {
        // --- Nouveau bouton "Voir" ---
        $voirClient = Action::new('voirClient', 'Voir', 'fa fa-eye')
            ->linkToCrudAction('detail')
            ->addCssClass('btn btn-primary btn-sm'); // bouton bleu

        return $actions
            ->add(Crud::PAGE_INDEX, $voirClient)

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
