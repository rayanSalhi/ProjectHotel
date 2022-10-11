<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieChambreController extends AbstractController
{
    #[Route('/categorie/chambre', name: 'categorie_chambre')]
    public function index(): Response
    {
        return $this->render('categorie_chambre/categorie.html.twig', [
            'controller_name' => 'CategorieChambreController',
        ]);
    }
}
