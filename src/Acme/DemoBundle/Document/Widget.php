<?php

namespace Acme\DemoBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use JMS\SerializerBundle\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 * @JMS\ExclusionPolicy("ALL")
 * 
 */
class Widget
{
    /**
     *
     * @MongoDB\Id
     * @JMS\Expose
     * @JMS\Type("string")
     */
    private $id;
        
    /**
     * @MongoDB\String
     * @JMS\Expose
     * @JMS\Type("string")
     * @Assert\NotBlank
     */
    private $name;

    /**
     *
     * @MongoDB\EmbedMany(targetDocument="Acme\DemoBundle\Document\Customer")
     * @JMS\Expose
     * @JMS\Type("array<Acme\DemoBundle\Document\Customer>")
     */
    private $customers;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function addCustomer(Customer $customer) 
    {
        $this->customers[] = $customer;
    }
    
    public function getCustomers()
    {
        return $this->customers;
    }
    
    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }
        
}
