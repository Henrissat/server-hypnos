<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
//paramètre des champs du formulaire
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class RoomCrudController extends AbstractCrudController
{
    //chemin pour les images de mes chambres
    public const ROOM_BASE_PATH = 'upload/images/rooms';
    public const ROOM_UPLOAD_DIR = 'public/upload/images/rooms';
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'label')->setRequired(true),
            TextEditorField::new('description'),
            TextEditorField::new('Shortdescription'),
            ImageField::new('Pictures')
                ->setBasePath(self::ROOM_BASE_PATH)
                ->setUploadDir(self::ROOM_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            MoneyField::new('Price')->setCurrency('EUR'),
        ];
    }
    
}
