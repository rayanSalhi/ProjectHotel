<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\OrderType;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    #[Route('/commande/{id}', name: 'order')]
    public function index(ChambreRepository $repository, $id): Response
    {




        $chambres = $repository->getChambreParId($id);


        return $this->render('order/index.html.twig', [
            'chambres' => $chambres
        ]);
    }
}
