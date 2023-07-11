<?php

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use App\Data\SearchData;
use App\Entity\Transport;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' =>'Rechercher via un mot clé ',
                ]

            ])
            ->add('transport', EntityType::class,
                [
                    'label' => false,
                    'required' => false,
                    'class' => Transport::class,
                    'expanded' => true,
                    'multiple' => true,


                ])
            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => "prix min",
                ]

            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => "prix max",
                ]

            ])
            ->add('citystart', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => "De",
                ]

            ])
            ->add('cityend', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => "A",
                ]
            ])
            ->add('datestart', DateType::class, [
                'label' => false,
                'required' => false,
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'empty_data' => '',

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return ''; // TODO: Change the autogenerated stub
    }
}
