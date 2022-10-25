<?php

namespace App\Controller;

use App\Form\AdresseType;
use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface as ORMEntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    private $entityManager;

    public function __construct(ORMEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/home/profil', name: 'app_profil')]
    public function password(Request $request, UserPasswordHasherInterface $encoder)
    {
        $notification = null;

        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $old_pwd = $form->get('old_password')->getData();


            if ($encoder->isPasswordValid($user, $old_pwd)) {
                $new_pwd = $form->get('new_password')->getData();
                $password = $encoder->hashPassword($user, $new_pwd);

                $user->setPassword($password);
                // $this->entityManager->persist($user); pas obligatoire car mise a jour de la donnée 
                $this->entityManager->flush();
                $notification = "Votre mdp a été mise a jour.";
            } else {
                $notification = "Votre mdp n'est pas le bon ";
            }
        }

        return $this->render('profil/profil.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
    #[Route('/home/profil/', name: 'app_profil')]
    public function adresse(Request $request, EntityManagerInterface $entityManager)
    {

        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('profil/profil.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
