<?php

namespace App\Controller\Admin;

//use Doctrine\ORM\EntityManagerInterface;
//use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
//import des Entity
use App\Entity\Room;
use App\Entity\Hotel;
use App\Entity\Gerant;

class DashboardController extends AbstractDashboardController
{
    //génère l'url
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {       
        //créer la rediction vers les CRUD entity déjà créées
        $url = $this->adminUrlGenerator
            ->setController(RoomCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hypnos Admin');
    }

    //Gérer le menu Dashboard des Hotels et Chambres
    public function configureMenuItems(): iterable
    {
        //Partie pour les Gérants
        //ajout des hotels dans le menu
        yield MenuItem::section('Hotels')
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Hotel', 'fas fa-plus', Hotel::class)->setAction(crud::PAGE_NEW)
                ->setPermission('ROLE_SUPERADMIN'),
            MenuItem::linkToCrud('Voir les Hotels', 'fas fa-eye', Hotel::class)
        ]);
        //ajout des chambres dans le menu
        yield MenuItem::section('Chambres')
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Chambre', 'fas fa-plus', Room::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Chambres', 'fas fa-eye', Room::class)
        ]);

        //partie pour les Admins
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Gérant');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter gérant', 'fas fa-plus', Gerant::class)->setAction(crud::PAGE_NEW)
                ->setPermission('ROLE_SUPERADMIN'),
            MenuItem::linkToCrud('Voir les gérants', 'fas fa-eye', Gerant::class)
        ]);
    }
}
