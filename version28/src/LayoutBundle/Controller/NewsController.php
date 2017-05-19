<?php

namespace LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class NewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('LayoutBundle:News:index.html.twig', array(
            // ...
        ));
    }
    public function includeforumAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:News:includeforum.html.twig',['forums'=>$forums]);
    }
    public function includeberitaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:News:includeberita.html.twig',['forums'=>$forums]);
    }
    public function includegalleryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:News:includegallery.html.twig',['forums'=>$forums]);
    }
    public function includepengumumanAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:ForumPengumuman')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pengumuman = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:News:includepengumuman.html.twig',
                                ['pengumuman'=>$pengumuman]
                             );
    }
    public function includetypeanggotaAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:FosTypeanggota')->findAll();
        return $this->render('LayoutBundle:News:includetypeanggota.html.twig',
                                ['typeanggota'=>$query]
                             );
    }

}
