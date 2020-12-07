<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Description')
            ->add('Categorie')
            ->add('lienGit')
            ->add('lienLinkedin')
            ->add('imageFile', FileType::class, [
                'required' =>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }

}
