<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('mots', SearchType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'write your name product'
                    ],
                    'required' => false
                ])
                ->add('search', SubmitType::class, [
                    'attr' => [
                        'class' => 'btn success',
                    ]
                ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
