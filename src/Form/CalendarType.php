<?php

namespace App\Form;
use App\Entity\Calendar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Start', DateTimeType::class, [
                // 'date_widget' => 'single_text',
                'data' => new \DateTime(), //mets par défaut la date du jour
                'attr' => ['min' => date('Y-m-d')], // déclare la date min
                'years' => range(date('Y') +2, date('Y')), // définit la limites années sélectionnable
                // 'html5' => false,
                // 'attr' => ['class' => 'js-datepicker'],
                // 'format' => 'yyyy-MM-dd',
                ])
                ->add('End', DateTimeType::class, [
                    // 'date_widget' => 'single_text',
                    'data' => new \DateTime(),
                    'attr' => ['max' => date('Y-m-d')],
                    'years' => range(date('Y') +2, date('Y')),
                    // 'html5' => false,
                // 'attr' => ['class' => 'js-datepicker'],
                // 'format' => 'yyyy-MM-dd',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}
