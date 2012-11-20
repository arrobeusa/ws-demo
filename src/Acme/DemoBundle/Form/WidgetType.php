<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class WidgetType extends AbstractType
{
    /**
     *
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('name')
            ->add('customers', 'collection', array(
              'type'         => new CustomerType(),
              'allow_add'    => true,
              'allow_delete' => true,
              'by_reference' => false,              
            ))
                
        ;
    }
    
    /**
     *
     * @param array $options
     * @return array
     */
    public function getDefaultOptions(array $options) 
    {
        return array(
            'data_class' => 'Acme\DemoBundle\Document\Widget'
        );
    }
    
    /**
     *
     * @return string
     */
    public function getName()
    {
        return 'widget';
    }
}
