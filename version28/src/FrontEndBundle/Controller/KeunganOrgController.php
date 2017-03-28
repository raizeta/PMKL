<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class KeunganOrgController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosKelamin')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosKelamins = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        return $this->render('FrontEndBundle:KeunganOrg:index.html.twig', array(
            'fosKelamins' => $fosKelamins
        ));
    }

}
