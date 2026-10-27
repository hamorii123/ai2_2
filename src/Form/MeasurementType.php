<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => static function (Location $location): string {
                    return $location->getCity()
                        . ' ('
                        . $location->getCountry()
                        . ')';
                },
                'label' => 'Miejscowość',
                'placeholder' => 'Wybierz miejscowość',
                'required' => false,
            ])
            ->add('date', DateType::class, [
                'label' => 'Data pomiaru',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('celsius', NumberType::class, [
                'label' => 'Temperatura (°C)',
                'required' => false,
                'html5' => false,
                'scale' => 0,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
