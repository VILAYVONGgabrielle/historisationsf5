<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Listejuridique;
use App\Entity\Societes;
use App\Form\AdresseType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=>'Nom de la société',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> 'Amazon'
                ]
            ])
            ->add('siren', NumberType::class,[
                'label'=>'N° de siren',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    new Length([
                        'max' => 9,
                        'maxMessage' => 'max de chiffre est de 9'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> '123456789'
                ]
            ])
            ->add('villeimmatriculation', TextType::class,[
                'label'=>'Ville d\'immatriculation',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> 'Paris']
            ])
            ->add('dateimmatriculation', DateType::class,[
                'label'=>'date d\'immatriculation',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> 'jj/mm/aa']
            ])
            ->add('capital', NumberType::class,[
                'label'=>'capital de la société',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> '8000']
            ])
            ->add('libelle', TextType::class,[
                'label'=>'forme juridique',
                'constraints'=> [
                    new NotBlank([
                        'message' => 'le champ ne peut pas être vide'
                    ]),
                    ],
                'attr'=>[
                    'placeholder'=> 'sarl']
            ])
            // ->add('libelle', EntityType::class,[
            //     "class"=>Listejuridique::class,
            //     "choice_label"=>'libelle',
            //     "multiple"=>true
            // ])
            ->add('adresses', CollectionType::class,[
                'entry_type'=>AdresseType::class,
                'entry_options'=>['label'=>false],
                'allow_add'=>true,
                'allow_delete'=>false,
                'by_reference' => false
            ])
         

            ->add('submit', SubmitType::class, [
                'label'=>'valider',
                'attr'=>[
                    'class'=>'btn btn-info']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societes::class,
        ]);
    }
}
