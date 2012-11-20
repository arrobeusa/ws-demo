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
class Customer
{
    /**
     *
     * @MongoDB\Id
     * @JMS\Expose
     * @JMS\Type("string")
     */
    private $id;
    
    /**
     *
     * @MongoDB\String
     * @JMS\Expose
     * @JMS\Type("string")
     */
    private $name;
    
    public function getId() 
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
}
