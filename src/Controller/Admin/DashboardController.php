<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use App\Entity\Room;
use App\Entity\Hotel;

class DashboardController extends AbstractDashboardController
{
    //génère l'url
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        //return parent::index();
        
        //return $this->render('admin/dashboard.html.twig');

        //créer la rediction vers les CRUD entity déjà créées
        $url = $this->adminUrlGenerator
            ->setController(RoomCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        /*$adminUrlGenerator = $this->container->get(RoomCrudController::class);
        return $this->redirect($adminUrlGenerator->setController(RoomCrudController::class)->generateUrl());*/

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hypnos Admin');
    }

    //Gérer le menu Dashboard des Hotels et Chambres
    public function configureMenuItems(): iterable
    {
        //ajout des hotels dans le menu
        yield MenuItem::section('Hotels');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Hotel', 'fas fa-plus', Hotel::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Hotels', 'fas fa-eye', Hotel::class)
        ]);
        //ajout des chambres dans le menu
        yield MenuItem::section('Chambres');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Chambre', 'fas fa-plus', Room::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Chambres', 'fas fa-eye', Room::class)
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
