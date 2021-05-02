<?php

namespace App\Form;

use App\Entity\Adresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', NumberType::class, [
                'label' => 'N°',
                'constraints' => [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                ],
                'attr' => [
                    'placeholder' => '7'
                ],
            ])
            ->add('typevoie', TextType::class, [
                'label' => 'type de voie',
                'constraints' => [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'rue'
                ],
            ])
            ->add('nomvoie', TextType::class, [
                'label' => 'nom de voie',
                'constraints' => [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'de la poste'
                ],
            ])
            ->add('ville', TextType::class, [
                'label' => 'ville',
                'constraints' => [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Paris'
                ],
            ])
            ->add('cp', TextType::class, [
                'label' => 'Code Postal',
                'constraints' => [
                    new Regex([
                        'pattern' => "/^((0[1-9])|([1-8][0-9])|(9[0-8]))[0-9]{3}$/",
                        'message' => 'le code postal n\'est pas valide'
                    ])
                ],
                'attr' => [
                    'placeholder' => '75000'
                ],
            ])
            ->add('createdat', DateTimeType::class,[
                'label'=>'date de creation',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> 'jj/mm/aa']
            ])
		    //->add('societe')
            // ->add('submit', SubmitType::class, [
            //     'label' => 'valider',
            //     'attr' => [
            //         'class' => 'btn btn-info'
            //     ]
            // ])
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresses::class,
        ]);
    }
}
