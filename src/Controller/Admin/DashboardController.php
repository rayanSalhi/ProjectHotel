<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Chambre;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Hotel V2');
        // ->renderContentMaximize();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Type de chambre', 'fas fa-bed-alt', Category::class);
        yield MenuItem::linkToCrud('Chambre', 'fas fa-bed-alt', Chambre::class);
        yield MenuItem::linkToDashboard('Chambre libre', 'fa fa-home');
        yield MenuItem::linkToDashboard('Libérer une chambre', 'fa fa-bed-empty');
        yield MenuItem::linkToDashboard('Modifier une réservation ', 'fa fa-home');
        yield MenuItem::linkToDashboard('Annulation d’une réservation ', 'fa fa-home');
    }
}
