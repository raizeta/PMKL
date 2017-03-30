<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileOrgController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EntitasBundle:FosProfileorg')->findAll();
        return $this->render('FrontEndBundle:ProfileOrg:index.html.twig', 
        	array('entities'=>$entities));
    }

}
