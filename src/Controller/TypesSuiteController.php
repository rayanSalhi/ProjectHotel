<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypesSuiteController extends AbstractController
{
    #[Route('/types/suite/{category}', name: 'typeSuite')]
    public function typesSuite(ChambreRepository $repository, $category): Response
    {
        $chambres = $repository->getChambreParCategory($category);
        return $this->render('types_suite/types_suite.html.twig', [
            'chambres' => $chambres,
        ]);
    }
}
