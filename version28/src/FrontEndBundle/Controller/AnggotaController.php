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

    public function FindBySlugAction(Request $request,$slug)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosProfile')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosProfiles = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        return $this->render('FrontEndBundle:Anggota:index.html.twig', array(
            'fosProfiles' => $fosProfiles,'slug'=>$slug
        ));
    }
    public function profileAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosProfile')->findOneBy(array('slug'=>$slug));
        return $this->render('FrontEndBundle:Anggota:profile.html.twig', array(
            'profiles' => $query,
        ));
    }

}
