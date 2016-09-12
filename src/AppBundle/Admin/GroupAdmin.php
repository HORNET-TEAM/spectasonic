<?php
/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class GroupAdmin extends AbstractAdmin
{
    /**
     * {@inheritdoc}
     */
    protected $formOptions = array(
        'validation_groups' => 'Registration',
    );
    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $class = $this->getClass();
        return new $class('', array());
    }
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('roles')
        ;
    }
    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Group')
                ->with('General', array('class' => 'col-md-6'))
                    ->add('name', TextType::class, array('required' => true))
                ->end()
            ->end()
            ->tab('Security')
                ->with('Roles', array('class' => 'col-md-6'))
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
}