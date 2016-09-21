<?php
 // AppBundle/Admin/ActualiteAdmin
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin As Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ActualiteAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('published', CheckboxType::class, array('required' => false))
            ->add('title', TextType::class, array('label' => 'Titre de l\'actualite'))
            ->add('author', 'entity', array('class' => 'AppBundle\Entity\User'))
            ->add('createdAt', DateTimeType::class, array('disabled' => true))
            ->add('updatedAt', DateTimeType::class, array('disabled' => true))
            ->add('content', CKEditorType::class, array (
                'label'             => 'Contenu',
                'config' => array(
                    'language'    => 'fr'
                ),
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('author')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('published')
            ->add('author')
            ->add('_action', 'actions', array(
                'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array()
                )
            ))
        ;
    }


}