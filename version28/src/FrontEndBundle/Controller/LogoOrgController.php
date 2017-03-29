<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogoOrgController extends Controller
{
    public function indexAction()
    {
        $em 	= $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EntitasBundle:FosLogoorg')->findOneBy(array('setlogoDefault' => true));

        return $this->render('FrontEndBundle:LogoOrg:index.html.twig', 
        	array('entity'=>$entity));
    }

}
