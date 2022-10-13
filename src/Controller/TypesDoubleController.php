<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypesDoubleController extends AbstractController
{
    #[Route('/types/double/{category}', name: 'typeDouble')]
    public function typesDouble(ChambreRepository $repository, $category): Response
    {
        $chambres = $repository->getChambreParCategory($category);
        return $this->render('types_double/types_double.html.twig', [
            'chambres' => $chambres,
        ]);
    }
}
