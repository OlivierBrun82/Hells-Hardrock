<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //--- creation de l'instance $builder de la classe FormBuilderInterface
        //--- construit dynamiquement un form qui avec la Methode add()permet de faire notre form >add('email', EmailType::class, ['label' => 'Adresse email']) De la le $Builder passe en parametre a la methode buildForm() d'une classe de formulaire (FormType ---//
        $builder
            ->add('Title')
            ->add('GroupName')
            ->add('Style')
            ->add('Year')
            ->add('Medium')
            ->add('img', FileType::class,[
                'label'=> 'illustration',
                'mapped'=> false,
                // 'contraints'=>   
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}