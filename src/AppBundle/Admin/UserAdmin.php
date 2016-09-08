<?php
 // AppBundle/Admin/ArticleAdmin
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

//Symfony3 : les type on changer, il faut désormais les importé et appelé le fait que l'on souhaite avec cette ::class
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserAdmin extends AbstractAdmin
{
	 // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'username'
    );


    // L'ensemble des champs qui seront montrer lors de la création ou de la modification d'une entité
    protected function configureFormFields(FormMapper $formMapper)
    {


        // Plusieurs zone
        $formMapper
            ->tab('User')
                ->with('General', array('class' => 'col-md-6'))->end()
            ->end()
            ->tab('Security')
                ->with('Status', array('class' => 'col-md-4'))->end()
                ->with('Groups', array('class' => 'col-md-4'))->end()
                ->with('Roles (Droits)', array('class' => 'col-md-12'))->end()
            ->end()
        ;

         $formMapper
            ->tab('User')
                ->with('General')
                	->add('username', TextType::class, array('required' => true))
                    ->add('email', TextType::class, array('required' => true))
                    ->add('plainPassword', 'text', array('required' => false))
                ->end()
            ->end()
            ->tab('Security')
                ->with('Status')
                    ->add('locked', null, array('required' => false))
                    ->add('expired', null, array('required' => false))
                    ->add('enabled', null, array('required' => false))
                    ->add('credentialsExpired', null, array('required' => false))
                ->end()
                ->with('Roles (Droits)')
                    ->add('roles', ChoiceType::class,
                                array(
                                    'label' => 'Droits : ',
                                    'multiple' => true,
                                    'expanded' => true,
                                    'choices'  => array(
                                        'Community manager' => array(
                                            'ROLE_CM' => 'ROLE_CM',
                                            'ROLE_CM_ADD' => 'ROLE_CM_ADD',
                                            'ROLE_CM_EDIT' => 'ROLE_CM_EDIT',
                                            'ROLE_CM_DELETE' => 'ROLE_CM_DELETE',
                                            'ROLE_CM_VIEW' => 'ROLE_CM_VIEW' ),
                                        'Expert' => array(
                                            'ROLE_EXPERT' => 'ROLE_EXPERT',
                                            'ROLE_EXPERT_ADD' => 'ROLE_EXPERT_ADD',
                                            'ROLE_EXPERT_EDIT' => 'ROLE_EXPERT_EDIT',
                                            'ROLE_EXPERT_DELETE' => 'ROLE_EXPERT_DELETE',
                                            'ROLE_EXPERT_VIEW' => 'ROLE_EXPERT_VIEW' ),
                                        )
                                )
                             )
                ->end()

            ->end()
        ;
    }

    /**
    *
    * Fonction qui va permettre d'afficher les différents filtres de recherche dans notre tableau
    * de notre interface.
    *
    */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
        ;
    }

 	/**
 	* Fonction qui redéfini celle de la classe mère Admin. Cette fonction va nous permettre de préciser les
 	* champs qui seront affichés dans notre tableau lorsque l'on listera nos entités
 	*/
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //On créé un champs de référence (logiquement le nom de l'extra, puis on redirige vers le show plutot que le edit
            ->addIdentifier('username',  TextType::class,array('route' => array('name' => 'show')))
            ->add('email', TextType::class)
            ->add('_action', 'actions', array(
                'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array(),
                )
            ))
        ;
    }

    /**
    * Fonction qui redéfinie la fonction de la classe mère qui permet d'indiquer les champs qui seront affiché
    * lorsque l'on consultera une image d'un article
    */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
        ;
    }
}