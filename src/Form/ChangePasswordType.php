<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                ],
                'empty_data' => '',
            ])

            ->add('LastName', TextType::class, [
                'label' => 'Votre nom',
                'empty_data' => '',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ])
            ])

            ->add('FirstName', TextType::class, [
                'label' => 'Votre prénom',
                'empty_data' => '',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
            ])

            ->add('Adresse', TextType::class, [
                'label' => 'Votre adresse',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 150
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre adresse',
                    'class' => 'bootstrap-class'
                ]
            ])

            ->add('CP', NumberType::class, [
                'label' => 'Votre code postal',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 5
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre code postal',
                    'class' => 'bootstrap-class'
                ]
            ])

            ->add('Ville', TextType::class, [
                'label' => 'Votre ville',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre ville',
                    'class' => 'bootstrap-class'
                ]
            ])

            ->add('Telephone', TelType::class, [
                'label' => 'Votre numéro de téléphone',
                'constraints' => new Length([
                    'min' => 10,
                    'max' => 10
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre numéro de téléphone',
                    'class' => 'bootstrap-class'
                ]
            ])


            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Mon mot de passe actuel',
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe'
                ]


            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique !',
                'label' => 'Mon nouveau mot de passe',
                'required' => false,
                'first_options' => ['label' => 'Mon nouveau mot de passe', 'attr' => ['placeholder' => 'Veuillez saisir votre nouveau mot de passe']],
                'second_options' => ['label' => 'Mon nouveau mot de passe', 'attr' => ['placeholder' => 'Confirmez votre nouveau mot de passe']],

            ])
            // ajout password confirm si  passwordtype
            //     ->add('password_confirm', PasswordType::class, ['label' => 'Confirmez votre mot de passe',
            //     'mapped' => false,
            //     'attr' => [
            //         'placeholder'=> 'Confirmez votre mot de passe'
            //     ]
            // ])
            ->add('submit', SubmitType::class, [
                'label' => "ENREGISTRER",
                'attr' => [
                    'class' => "btn-dark w-150 ",
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
