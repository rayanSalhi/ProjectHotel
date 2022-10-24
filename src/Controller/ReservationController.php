<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/home/reservation', name: 'reservation')]
    public function reservation(): Response
    {
        return $this->render('reservation/reservation.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    #[Route('/no_reservation', name: 'no_reservation')]
    public function nonReserver(): Response
    {
        return $this->render('reservation/no_reservation.html.twig', [
            'controller_name' => 'No_ReservationController',
        ]);
    }
}
