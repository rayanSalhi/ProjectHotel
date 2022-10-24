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

        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Hotel V2');
  
    }
 
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Catégorie de chambre', 'fas fa-school', Category::class);
        yield MenuItem::linkToCrud('Créer une chambre', 'fas fa-bed', Chambre::class);
        yield MenuItem::linkToRoute('Modifier une réservation', 'fa fa-clock', 'app_calendrier');
        yield MenuItem::linkToDashboard('Work in progress...', 'fa fa-edit', 'app_calendar_edit');
        yield MenuItem::linkToRoute('Retour front office', 'fa fa-undo', 'home');
    }
}
