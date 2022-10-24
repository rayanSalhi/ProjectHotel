<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    'Monsieur' => 'monsieur',
                    'Madame' => 'madame',
                ],
            ])

            ->add('LastName', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom',
                    'class' => 'bootstrap-class'
                ]
            ])

            ->add('FirstName', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom',
                    'class' => 'bootstrap-class'
                ]
            ])

            // ->add('Adresse', TextType::class, [
            //     'label' => 'Votre adresse',
            //     'constraints' => new Length([
            //         'min' => 2,
            //         'max' => 150
            //     ]),
            //     'attr' => [
            //         'placeholder' => 'Merci de saisir votre adresse',
            //         'class' => 'bootstrap-class'
            //     ]
            // ])

            // ->add('CP', NumberType::class, [
            //     'label' => 'Votre code postal',
            //     'constraints' => new Length([
            //         'min' => 2,
            //         'max' => 5
            //     ]),
            //     'attr' => [
            //         'placeholder' => 'Merci de saisir votre code postal',
            //         'class' => 'bootstrap-class'
            //     ]
            // ])

            // ->add('Ville', TextType::class, [
            //     'label' => 'Votre ville',
            //     'constraints' => new Length([
            //         'min' => 2,
            //         'max' => 30
            //     ]),
            //     'attr' => [
            //         'placeholder' => 'Merci de saisir votre ville',
            //         'class' => 'bootstrap-class'
            //     ]
            // ])

            // ->add('Telephone', TelType::class, [
            //     'label' => 'Votre numéro de téléphone',
            //     'constraints' => new Length([
            //         'min' => 10,
            //         'max' => 10
            //     ]),
            //     'attr' => [
            //         'placeholder' => 'Merci de saisir votre numéro de téléphone',
            //         'class' => 'bootstrap-class'
            //     ]
            // ])


            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre email',
                    'class' => 'bootstrap-class',
                    'pattern' => "[a-z0-9._%+-]+@[a-z0-9.-]+\.(?:[a-z]{2}|com|org|gouv|net)$"
                ]
            ])

            ->add('Password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique.',
                'label' => 'Votre mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de saisir votre mot de passe',
                        'class' => 'bootstrap-class'
                    ]
                ],

                'second_options' => [
                    'label' => 'Confirmez votre mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de confirmer votre mot de passe',
                        'class' => 'bootstrap-class'
                    ]
                ],

            ])

            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
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
