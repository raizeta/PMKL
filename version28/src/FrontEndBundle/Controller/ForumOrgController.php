<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EntitasBundle\Entity\ForumKomentar;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
class ForumOrgController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forums = $paginator->paginate($query,$request->query->getInt('page', 1),50);
        return $this->render('FrontEndBundle:ForumOrg:index.html.twig',['forums'=>$forums]);
    }
    public function slugAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        return $this->render('FrontEndBundle:ForumOrg:index.html.twig',['forums'=>$query,'slug'=>$slug]);
    }

    public function detailAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findOneBy(array('slugContent'=>$slug));

        $author= $this->getUser();
        $forumKomentar = new Forumkomentar();
        $forumKomentar->setKomentator($author);
        $forumKomentar->setForumContent($query);
        $form = $this->createForm('EntitasBundle\Form\ForumKomentarType', $forumKomentar, array(
            'action' => $this->generateUrl('front_komentar_new'),
            'method' => 'POST',
        ));

        return $this->render('FrontEndBundle:ForumOrg:show.html.twig',
            ['forum'=>$query,'forumKomentar'=>$forumKomentar,'form'=>$form->createView()]);
    }

    public function saveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $forumKomentar = new Forumkomentar();
        $form = $this->createForm('EntitasBundle\Form\ForumKomentarType', $forumKomentar);
        $form->handleRequest($request);

        if ($form->isSubmitted()) 
        {
            $em->persist($forumKomentar);
            $em->flush();
            $slug = $forumKomentar->getForumContent()->getSlugContent();
            return $this->redirect($this->generateUrl('front_forumorg_detail',['slug'=>$slug]));
        }

    }

}
