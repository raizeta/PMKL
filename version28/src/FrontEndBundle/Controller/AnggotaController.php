<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnggotaController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosProfile')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosProfiles = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        return $this->render('FrontEndBundle:Anggota:index.html.twig', array(
            'fosProfiles' => $fosProfiles,
        ));
    }

}
