<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Chambre;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

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
        yield MenuItem::linkToCrud('Type de chambre', 'fas fa-school', Category::class);
        yield MenuItem::linkToCrud('Chambre', 'fas fa-bed', Chambre::class);
        yield MenuItem::linkToDashboard('Chambre libre', 'fa fa-key');
        yield MenuItem::linkToRoute('Calendrier', 'fa fa-clock', 'app_calendrier');
        yield MenuItem::linkToDashboard('Modifier une réservation ', 'fa fa-edit');
        yield MenuItem::linkToDashboard('Annulation d’une réservation ', 'fa fa-undo');
    }
}
