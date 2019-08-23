<?php

namespace App\Form;

use App\Entity\Sesion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SesionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('inicio')
            ->add('fin')
            ->add('tiempo_total')
            ->add('tiempo_efectivo')
            ->add('rendimiento')
            ->add('tema')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sesion::class,
        ]);
    }
}
