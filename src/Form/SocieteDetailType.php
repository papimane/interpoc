<?php

namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SocieteDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('required' => true,'label' => 'Nom/Raison sociale','attr' => ['html5' => false,],))
            ->add('siren', TextType::class, array('required' => true,'label' => 'SIREN','attr' => ['html5' => false,],))
            ->add('ville_immat', TextType::class, array('required' => true,'label' => 'Ville d\'immatriculation','attr' => ['html5' => false,],))
            ->add('date_immat', DateTimeType::class, array('required' => true,'widget' => 'single_text', 'label'=> 'Date d\'immatriculation'
                    ,'attr' => ['class' => 'form-control input-inline datetimepicker','data-provide' => 'datetimepicker','html5' => false,],))
            ->add('capital', TextType::class, array('required' => true,'label' => 'Capital','attr' => ['html5' => false,],))
            ->add('forme_juridique')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
