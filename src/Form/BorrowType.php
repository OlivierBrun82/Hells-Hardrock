<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formulaire pour gérer les emprunts de médias
 * 
 * Ce formulaire permet de créer ou modifier un emprunt en associant
 * un média à un emprunteur (User) tout en conservant les informations
 * du média et de son propriétaire.
 */
class BorrowType extends AbstractType
{
    /**
     * Construit le formulaire d'emprunt
     * 
     * Cette méthode définit tous les champs du formulaire :
     * - Les champs du média (titre, groupe, style, année, support)
     * - Le propriétaire du média (Owner)
     * - L'emprunteur du média (Borrower)
     * 
     * @param FormBuilderInterface $builder Le constructeur de formulaire Symfony
     * @param array $options Les options du formulaire
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Borrower', EntityType::class, [
                'class' => User::class,
                'choice_label' => function(User $user) {
                    return $user->getFirstName() . ' ' . $user->getLastName() . ' (' . $user->getEmail() . ')';
                },
                'placeholder' => 'Sélectionner un emprunteur',
                'label' => 'Emprunteur',
                'required' => false, // Permet d'annuler un emprunt
                'empty_data' => null, // Valeur par défaut si rien n'est sélectionné
            ])
        ;
    }

    /**
     * Configure les options par défaut du formulaire
     * 
     * Cette méthode définit que le formulaire est lié à l'entité Media,
     * ce qui permet à Symfony de mapper automatiquement les données
     * entre le formulaire et l'entité.
     * 
     * @param OptionsResolver $resolver Le résolveur d'options Symfony
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Définit que ce formulaire est associé à l'entité Media
            // Cela permet la validation automatique et le mapping des données
            'data_class' => Media::class,
        ]);
    }
}
