<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                 'attr'=>array(
                     'class'=>'form-control mb-5',
                     'placeholder'=>'Title'
                 )
            ])

            ->add('releaseYear',IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control mb-5',
                    'placeholder'=>'Release Year'
                )
            ])

            ->add('description',TextareaType::class,[
                'attr'=>array(
                    'class'=>'form-control mb-5',
                    'placeholder'=>'Description'
                )
            ])

//            ->add('imagePath',FileType::class,[
//                'attr'=>array(
//                    'class'=>'mb-5',
//                )
//            ])

            ->add('imagePath', FileType::class, array(
                'required' => false,
                'mapped' => false,
            ))
            //->add('actors')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
