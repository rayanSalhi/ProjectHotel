<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CatController extends AbstractController
{
    #[Route('/cats', name: 'app_cats')]
    // #[ParamConverter('id', options: ['mapping' => ['category_id' => 'slug']])]
    public function index(CategoryRepository $repository): Response
    {

        $cats = $repository->findAll();
        return $this->render('cat/index.html.twig', [
            'cats' => $cats,
        ]);
    }

    #[Route('/cat/{id}', name: 'app_cat')]
    // #[ParamConverter('id', options: ['mapping' => ['category_id' => 'slug']])]
    public function cat(Category $cat): Response
    {

       
        return $this->render('cat/index.html.twig', [
            'cat' => $cat,
        ]);
    }
}
