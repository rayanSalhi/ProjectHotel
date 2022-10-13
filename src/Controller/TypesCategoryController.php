<?php

namespace App\Controller;


use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypesCategoryController extends AbstractController
{

    #[Route('/types/category/{category}', name: 'typeCategory')]
    public function typesSupérieur(ChambreRepository $repository, $category): Response
    {

        $chambres = $repository->getChambreParCategory($category);

        return $this->render('types_category/types_superieur.html.twig', [
            'chambres' => $chambres,

        ]);
    }
   

    
}
