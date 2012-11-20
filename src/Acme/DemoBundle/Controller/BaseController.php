<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

//use FOS\RestBundle\View\View;
//use FOS\RestBundle\Decoder\DecoderInterface;

/**
 * 
 */
class BaseController extends Controller 
{
    /**
     *
     */
    protected function getDm() 
    {
        return $this->get('doctrine.odm.mongodb.document_manager'); 
      
    }
    
    /**
     * 
     */
    protected function getUser() 
    {
        $sess = $this->getRequest()->getSession();
        $user = $sess->get('_security_default');
        if (!$user) throw new \Exception('No user defined');
        $user = unserialize($user)->getUser();
        
        return $user;
    }
    
    
  
}