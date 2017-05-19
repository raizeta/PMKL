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

    public function slugAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EntitasBundle:FosProfileorg')->findOneBy(array('slugContent'=>$slug));
        return $this->render('FrontEndBundle:ProfileOrg:slug.html.twig', 
        	array('entities'=>$entities));
    }

}
