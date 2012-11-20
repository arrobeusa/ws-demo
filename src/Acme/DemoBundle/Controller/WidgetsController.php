<?php

namespace Acme\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\View\View,
    FOS\RestBundle\View\ViewHandler,
    FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\Decoder\DecoderInterface;

use Acme\DemoBundle\Document\Widget;
use Acme\DemoBundle\Form\WidgetType;


/**
 * Widgets controller.
 *
 */
class WidgetsController extends BaseController
{

    /**
     * Lists all Report entities.
     *
     */
    public function listAction()
    {
        $data = $this->getDm()->getRepository('AcmeDemoBundle:Widget')->findAll();
        $widgets = array();
        foreach($data as $v) {
            $widgets[] = $v;
        }

        $view = View::create(array('vendors' => $widgets));
        $view->setTemplate('AcmeDemoBundle:Widgets:list.html.twig');
        $view->setData(array('widgets' => $widgets));

        return $this->get('fos_rest.view_handler')->handle($view);      
    }

    /**
     *
     */
    public function createAction(Request $request)
    {
        $widget = new Widget();
        $form = $this->createForm(new WidgetType(), $widget);
        $form->bindRequest($request);

        if ($form->isValid()) {          
            $dm = $this->getDm();
            $dm->persist($widget);
            $dm->flush();
            
            $view = View::create(array('widget' => $widget));
            $view->setData($widget);
            $view->setStatusCode(201);
            
        }
        else {
            $view = View::create($form); 
            $view->setStatusCode(400);
        }
        
        return $view;      
    }
    
    /**
     *
     * @param Request $request 
     * @return View
     */
    public function updateAction($id) 
    {
        $widget = $this->getDm()->getRepository('AcmeDemoBundle:Widget')->find($id);
        if (!$widget) $this->forward404();
      
        $form = $this->createForm(new WidgetType(), $widget);
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {          
            $dm = $this->getDm();
            $dm->persist($widget);
            $dm->flush();
            
            $view = View::create(array('widget' => $widget));
            $view->setData($widget);
            $view->setStatusCode(201);
            
        }
        else {
            $view = View::create($form); 
            $view->setStatusCode(400);
        }
        
        return $view;
    }
    
    /**
     * 
     */
    public function showAction($id)
    {
        $widget = $this->getDm()->getRepository('AcmeDemoBundle:Widget')->find($id);

        $view = View::create(array('widget' => $widget));
        $view->setTemplateVar('widget', $widget);
        $view->setTemplate('AcmeDemoBundle:Widgets:show.html.twig');
        $view->setData($widget);
        
        return $this->get('fos_rest.view_handler')->handle($view);
    }

    /**
     * Displays a form to create a new Report entity.
     *
     */
    public function newAction()
    {
        $form = $this->createForm(new WidgetType);

        return $this->render('AcmeDemoBundle:Widgets:new.html.twig', array(
            'form'           => $form->createView(),
        ));
    }
    
    /**
     * 
     * @param string $id
     */
    public function editAction($id)
    {
        $widget = $this->getDm()->getRepository('AcmeDemoBundle:Widget')->find($id);
        $form = $this->createForm(new WidgetType, $widget);

        return $this->render('AcmeDemoBundle:Widgets:edit.html.twig', array(
            'form'     => $form->createView(),
            'widget'   => $widget
        ));
        
    }

}
