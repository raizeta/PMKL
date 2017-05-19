<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PengumumanOrgController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumPengumuman')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pengumumans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        return $this->render('FrontEndBundle:PengumumanOrg:index.html.twig', array(
            'pengumumans' => $pengumumans,
        ));
    }
    public function slugAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumPengumuman')->findOneBy(array('slug'=>$slug));
        return $this->render('FrontEndBundle:PengumumanOrg:slug.html.twig',['pengumuman'=>$query]);
    }

}
