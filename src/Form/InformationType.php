<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('description2')
            ->add('statut')
            ->add('adresse')
            ->add('facebook')
            ->add('github')
            ->add('linkedIn')
            ->add('instagram')
            ->add('formation')
            ->add('imageFileProfil', FileType::class, [
                'label' => 'photo de profil',
                'required' =>false
            ])
            ->add('imageFileCV', FileType::class, [
                'label' => 'CV au format pdf',
                'required' =>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
