<?php

namespace LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PaperController extends Controller
{
    public function indexAction()
    {
        return $this->render('LayoutBundle:Paper:index.html.twig', array(
            // ...
        ));
    }
    public function includeforumAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:Paper:includeforum.html.twig',['forums'=>$forums]);
    }
    public function includeberitaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:Paper:includeberita.html.twig',['forums'=>$forums]);
    }
    public function includegalleryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:Paper:includegallery.html.twig',['forums'=>$forums]);
    }
    public function includepengumumanAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:ForumPengumuman')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pengumuman = $paginator->paginate($query,$request->query->getInt('page', 1),4);
        return $this->render('LayoutBundle:Paper:includepengumuman.html.twig',
                                ['pengumuman'=>$pengumuman]
                             );
    }
    public function includetypeanggotaAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:FosTypeanggota')->findAll();
        return $this->render('LayoutBundle:Paper:includetypeanggota.html.twig',
                                ['typeanggota'=>$query]
                             );
    }
    public function includeforumstatusAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:ForumStatus')->findAll();
        return $this->render('LayoutBundle:Paper:includeforumstatus.html.twig',
                                ['typestatus'=>$query]
                             );
    }

    public function includesliderAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:FosSlider')->findAll();
        return $this->render('LayoutBundle:Paper:includeslider.html.twig',
                                ['slider'=>$query]
                             );
    }

    public function includepengurusAction(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->getRepository('EntitasBundle:NamaKegiatan')->findAll();
        return $this->render('LayoutBundle:Paper:includepengurus.html.twig',
                                ['pengurus'=>$query]
                             );
    }

}
