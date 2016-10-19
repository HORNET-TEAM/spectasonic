<?php

namespace AppBundle\Form\FOSUser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\User;
use FOS\UserBundle\Util\LegacyFormHelper;


class ProfilUserType extends AbstractType
{


  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      $builder
          ->remove('current_password')
          ->remove('username')
          ->remove('email')
          ->add('gender', ChoiceType::class, array(
            'expanded' => true,
            'multiple' => false,
            'choices'  => array(
                'Monsieur' => User::GENDER_MALE,
                'Madame' => User::GENDER_FEMALE,
            ),
            'label' => 'Civilité :*',
            'required' => true
          ))
          ->add('username', null, array('label' => 'Nom d\'utilisateur*',
            'translation_domain' => 'FOSUserBundle',
            'required' => true
            ))
          ->add('firstname', TextType::class, array(
            'label' => 'Nom*',
            'required' => true
          ))
          ->add('lastname', null, array(
            'label' => 'Prénom*',
            'required' => true
          ))
          ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'),
              array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
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
