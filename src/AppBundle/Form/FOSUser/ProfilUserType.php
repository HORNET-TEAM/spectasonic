<?php

namespace AppBundle\Form\FOSUser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\User;


class ProfilUserType extends AbstractType
{


  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      $builder
          ->add('firstname', null, array(
            'label' => 'Nom'
          ))
          ->add('lastname', null, array(
            'label' => 'Prénom'
          ))
          ->add('gender', ChoiceType::class, array(
            'choices'  => array(
                'Monsieur' => User::GENDER_MALE,
                'Madame' => User::GENDER_FEMALE,
            ),
            'label' => 'Civilité'
          ))
        ;
  }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    public function getParent() {
      return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_edit';
    }
}
