<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypesCategoryController extends AbstractController
{

    #[Route('/types/category/{category}', name: 'typeCategory')]
    public function types(ChambreRepository $repository, $category): Response
    {

        $chambres = $repository->getChambreParCategory($category);

        return $this->render('types_category/types_category.html.twig', [
            'chambres' => $chambres,

        ]);
    }

    // #[Route('/types/category/{categorys}', name: 'category ')]
    // public function cat(CategoryRepository $repository, Category $categorys ): Response
    // {
    //     $categorys = $repository->findAll();
    //     return $this->render('types_category/types_category.html.twig', [

    //         'categorys' => $categorys
    //     ]);
    // }
}
