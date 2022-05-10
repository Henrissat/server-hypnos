<?php

namespace App\Controller\Admin;

use App\Entity\Gerant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
//paramètre des champs du Gerant
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class GerantCrudController extends AbstractCrudController
{
    //public const ACTION_DUPLICATE = 'dupliquer';
    //chemin pour les images de mes chambres
    public const TEAM_BASE_PATH = 'upload/images/team';
    public const TEAM_UPLOAD_DIR = 'public/upload/images/team';

    public static function getEntityFqcn(): string
    {
        return Gerant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email', 'email'),
            ArrayField::new('roles', 'Rôle'),
            TextField::new('firstname', 'Nom'),
            TextField::new('lastname', 'Prénom'),
            ImageField::new('picture', 'Photo de profil')
                ->setBasePath(self::TEAM_BASE_PATH)
                ->setUploadDir(self::TEAM_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            IntegerField::new('idHotel', 'id de l\'Hôtel'),
        ];
    }
    
}