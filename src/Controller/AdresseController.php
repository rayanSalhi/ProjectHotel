<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdresseController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/adresse', name: 'adresse')]
    public function index(): Response
    {

        return $this->render('adresse/adresse.html.twig');
    }
    #[Route('/ajouter-une-adresse', name: 'adresse_add')]
    public function add(Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresse->setUser($this->getUser());
            $this->entityManager->persist($adresse);
            $this->entityManager->flush();
            
            return $this->redirectToRoute('adresse');
        }
        return $this->render('adresse/adresse_form.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/modifier-une-adresse/{id}', name: 'adresse_edit')]
    public function edit(Request $request, $id): Response
    {
        $adresse = $this->entityManager->getRepository(Adresse::class)->findOneById($id);

        if (!$adresse || $adresse->getUser() != $this->getUser()) {
            return $this->redirectToRoute('adresse');
        }

        $form = $this->createForm(AdresseType::class, $adresse);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->entityManager->flush();
            return $this->redirectToRoute('adresse');
        }
        return $this->render('adresse/adresse_form.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/supprimer-une-adresse/{id}', name: 'adresse_delete')]
    public function delete(Request $request, $id): Response
    {
        $adresse = $this->entityManager->getRepository(Adresse::class)->findOneById($id);

        if ($adresse && $adresse->getUser() == $this->getUser()) {

            $this->entityManager->remove($adresse);
            $this->entityManager->flush();
        }


        return $this->redirectToRoute('adresse');
    }
}
