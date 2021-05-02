<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Societes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societes', EntityType::class,[
                'label'=>'Société',
                'required'=>true,
                'class'=>Societes::class
            ])
            // ->add('adresses', EntityType::class,[
            //     'label'=>'adresse',
            //     'required'=>true,
            //     'class'=>Adresses::class
            // ])
            // ->add('listejuridiques', EntityType::class,[
            //     'label'=>'forme juridique',
            //     'required'=>true,
            //     'class'=>Adresses::class
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            
        ]);
    }
}
