<?php

namespace App\Controller;


use Stripe\Stripe;
use App\Form\OrderType;
use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NullFilter;
use Stripe\Checkout\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{


    #[Route('/commande', name: 'order')]
    public function index(): Response
    {
        if (!$this->getUser()->getAdresses()->getValues()) 
        {
            return $this->redirectToRoute('adresse_add');
        }

        $form = $this->createForm(OrderType::class, null, [
            'user' => $this->getUser()
        ]);

        return $this->render('order/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
