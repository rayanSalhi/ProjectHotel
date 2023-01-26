<?php

namespace App\Controller;

use App\Entity\Chambre;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'app_payment')]
    public function index(): Response
    {
        return $this->render('payment/stripe.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }

    #[Route('/checkout', name: 'app_checkout')]
    public function checkout($stripeSK, ChambreRepository $repository): Response
    {
        Stripe::setApiKey($stripeSK);

        $session = Session::create([
            // 'billing_address_collection' => 'required',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'EUR',
                    'product_data' => [
                        'name' => 'chambre',
                    ],
                    'unit_amount' => 20000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('app_success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('app_cancel', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($session->url, 303);
        // dd($session);

        return $this->redirect($session->url, 303);
    }

    #[Route('/payment/success-url', name: 'app_success')]
    public function success(): Response
    {
        return $this->render('payment/success.html.twig', []);
    }

    #[Route('/payment/cancel-url', name: 'app_cancel')]
    public function cancel(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }

    // #[Route('/order/{id}', name: 'order')]
    // public function order(ChambreRepository $repository, $id): Response
    // {




    //     $chambres = $repository->getChambreParId($id);


    //     return $this->render('order/index.html.twig', [
    //         'chambres' => $chambres
    //     ]);
    // }

}
