<?php

namespace App\Controller;

use App\Entity\Calendar;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/{id}/edit', name: 'api_event_edit', methods:['PUT'])]
    public function majEvent(Calendar $calendar, Request $request): Response
    {

        //on récupére les données
        $donnees = json_decode($request->getContent());

        if (
            isset($donnees->start) && !empty($donnees->start) &&
            isset($donnees->end) && !empty($donnees->end)
        ) {
            //les données sont complètes
            //on initialise un code
            $code = 200;
            //on vérifier si l'id existe
            if (!$calendar) {
                // on instancie un rdv
                $calendar = new Calendar;
                //on change le code
                $code = 201;
            }

            //on hydrate l'objet avec les données
            $calendar->setStart(new DateTime($donnees->start));
            $calendar->setEnd(new DateTime($donnees->end));
        } else {
            // les données sont incomplètes
            return new Response('Données incomplètes', 404);
        }
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
