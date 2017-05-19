<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\ForumContent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Forumcontent controller.
 *
 */
class ForumContentController extends Controller
{
    /**
     * Lists all forumContent entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumContent')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forumContents = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new ForumContent();
        $form = $this->createForm('EntitasBundle\Form\ForumContentType', $entity, array(
            'action' => $this->generateUrl('forumcontent_new'),
            'method' => 'POST',
        ));

        return $this->render('forumcontent/index.html.twig', array(
            'forumContents' => $forumContents,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new forumContent entity.
     *
     */
    public function newAction(Request $request)
    {
        $forumContent = new Forumcontent();
        $form = $this->createForm('EntitasBundle\Form\ForumContentType', $forumContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data   = $form->getData();
            $judul  = $data->getJudulContent();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $forumContent->setSlugContent($slug);

            $em = $this->getDoctrine()->getManager();
            $em->persist($forumContent);
            $em->flush();

            return $this->redirectToRoute('forumcontent_index');
        }

        return $this->render('forumcontent/new.html.twig', array(
            'forumContent' => $forumContent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a forumContent entity.
     *
     */
    public function showAction(ForumContent $forumContent)
    {
        $deleteForm = $this->createDeleteForm($forumContent);

        return $this->render('forumcontent/show.html.twig', array(
            'forumContent' => $forumContent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing forumContent entity.
     *
     */
    public function editAction(Request $request, ForumContent $forumContent)
    {
        $deleteForm = $this->createDeleteForm($forumContent);
        $editForm = $this->createForm('EntitasBundle\Form\ForumContentType', $forumContent,
            array('action' => $this->generateUrl('forumcontent_edit', array('id' => $forumContent->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) 
        {
            $data   = $editForm->getData();
            $judul  = $data->getJudulContent();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $forumContent->setSlugContent($slug);
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('forumcontent_index');
        }

        return $this->render('forumcontent/edit.html.twig', array(
            'forumContent' => $forumContent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a forumContent entity.
     *
     */
    public function deleteAction(Request $request, ForumContent $forumContent)
    {
        $form = $this->createDeleteForm($forumContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forumContent);
            $em->flush();
        }

        return $this->redirectToRoute('forumcontent_index');
    }

    /**
     * Creates a form to delete a forumContent entity.
     *
     * @param ForumContent $forumContent The forumContent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ForumContent $forumContent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forumcontent_delete', array('id' => $forumContent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
