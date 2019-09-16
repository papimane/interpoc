<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', TextType::class, array('required' => true,'label' => 'Numéro','attr' => ['html5' => false,],))
            ->add('type_voie', TextType::class, array('required' => true,'label' => 'Type de voie','attr' => ['html5' => false,],))
            ->add('nom_voie', TextType::class, array('required' => true,'label' => 'Nom de voie','attr' => ['html5' => false,],))
            ->add('ville', TextType::class, array('required' => true,'label' => 'Ville','attr' => ['html5' => false,],))
            ->add('cp', TextType::class, array('required' => true,'label' => 'Code postal','attr' => ['html5' => false,],))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
