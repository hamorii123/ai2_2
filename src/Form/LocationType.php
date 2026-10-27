<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder
            ->add('city', TextType::class, [
                'label' => 'Miejscowość',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Podaj nazwę miejscowości',
                ],
            ])
            ->add('country', ChoiceType::class, [
                'label' => 'Państwo',
                'required' => false,
                'choices' => [
                    'Polska' => 'PL',
                    'Niemcy' => 'DE',
                    'Francja' => 'FR',
                    'Hiszpania' => 'ES',
                    'Włochy' => 'IT',
                    'Wielka Brytania' => 'GB',
                    'Stany Zjednoczone' => 'US',
                ],
                'placeholder' => 'Wybierz państwo',
            ])
            ->add('latitude', NumberType::class, [
                'label' => 'Szerokość geograficzna',
                'required' => false,
                'scale' => 7,
                'html5' => false,
            ])
            ->add('longitude', NumberType::class, [
                'label' => 'Długość geograficzna',
                'required' => false,
                'scale' => 7,
                'html5' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
