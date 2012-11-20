<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class CustomerType extends AbstractType
{
    /**
     *
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('name')
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
            'data_class' => 'Acme\DemoBundle\Document\Customer'
        );
    }
    
    /**
     *
     * @return string
     */
    public function getName()
    {
        return 'customer';
    }
}
