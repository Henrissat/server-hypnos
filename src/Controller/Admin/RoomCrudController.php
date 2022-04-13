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
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class RoomCrudController extends AbstractCrudController
{
    //public const ACTION_DUPLICATE = 'dupliquer';
    //chemin pour les images de mes chambres
    public const ROOM_BASE_PATH = 'upload/images/rooms';
    public const ROOM_UPLOAD_DIR = 'public/upload/images/rooms';

    public static function getEntityFqcn(): string
    {
        return Room::class;
    }

    /*
    //ajout d'image multiple
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('GaleryImg', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
        ]);
    }*/

    /*ajout d'un bouton dupliquer une chambre
    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(seld::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicateProduct');
        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate);
    }*/

    /*
    //gestion des manager
    public function __construc(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }
    */
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom de la suite'),
            TextEditorField::new('description', 'Description'),
            TextEditorField::new('Shortdescription', 'Courte description'),
            ImageField::new('Pictures', 'Photo')
                ->setBasePath(self::ROOM_BASE_PATH)
                ->setUploadDir(self::ROOM_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            ImageField::new('header_room', 'Photo du header')
                ->setBasePath(self::ROOM_BASE_PATH)
                ->setUploadDir(self::ROOM_UPLOAD_DIR)
                //Autoriser le clic sur la colonne pour trier le contenu du contrôle en fonction du champ de cette colonne.
                ->setSortable(false),
            MoneyField::new('Price', 'Prix')->setCurrency('EUR'),
            IntegerField::new('capacity', 'Capacité'),
            IntegerField::new('size', 'Taille'),
            IntegerField::new('bed', 'Nombre de lit'),
            IntegerField::new('quantity_rooms', 'Nombre de suite'),
            TextField::new('breaksfast', 'Petit déjeuné'),
            AssociationField::new('Hotel'),
        ];
    }
    
}