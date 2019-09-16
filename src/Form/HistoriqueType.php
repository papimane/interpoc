<?php

namespace App\Form;

use App\Entity\Historique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class HistoriqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class, array(
                'required' => true,
                'label' => false,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control datetimepicker',
                    'data-provide' => 'datetimepicker',
                    'html5' => false,
                ],
                ))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Historique::class,
        ]);
    }
}
