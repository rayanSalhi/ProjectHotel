<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Chambre;
use App\Entity\Order;
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
        yield MenuItem::linkToCrud('Orders', 'fas fa-shopping-cart', Order::class);
        yield MenuItem::linkToCrud('Type de chambre', 'fas fa-school', Category::class);
        yield MenuItem::linkToCrud('Chambre', 'fas fa-bed', Chambre::class);
        yield MenuItem::linkToDashboard('Chambre libre', 'fa fa-key');
        yield MenuItem::linkToDashboard('Libérer une chambre', 'fa fa-clock');
        yield MenuItem::linkToDashboard('Modifier une réservation ', 'fa fa-edit');
        yield MenuItem::linkToDashboard('Annuler une réservation ', 'fa fa-undo');
    }
}
