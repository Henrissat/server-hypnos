<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
//paramètre des champs du hotel
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class HotelCrudController extends AbstractCrudController
{
    //chemin pour les images de mes chambres
    public const HOTEL_BASE_PATH = 'upload/images/hotels';
    public const HOTEL_UPLOAD_DIR = 'public/upload/images/hotels';

    public static function getEntityFqcn(): string
    {
        return Hotel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('city'),
            TextField::new('Adress'),
            TextField::new('Title'),
            TextEditorField::new('Description'),
            ImageField::new('img_header')
                ->setBasePath(self::HOTEL_BASE_PATH)
                ->setUploadDir(self::HOTEL_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            ImageField::new('Vignette')
                ->setBasePath(self::HOTEL_BASE_PATH)
                ->setUploadDir(self::HOTEL_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            IntegerField::new('stars'),
        ];
    }
    
}
