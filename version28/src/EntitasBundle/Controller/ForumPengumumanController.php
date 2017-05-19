<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\ForumPengumuman;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Forumpengumuman controller.
 *
 */
class ForumPengumumanController extends Controller
{
    /**
     * Lists all forumPengumuman entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumPengumuman')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forumPengumumen = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new ForumPengumuman();
        $form = $this->createForm('EntitasBundle\Form\ForumPengumumanType', $entity, array(
            'action' => $this->generateUrl('forumpengumuman_new'),
            'method' => 'POST',
        ));

        return $this->render('forumpengumuman/index.html.twig', array(
            'forumPengumumen' => $forumPengumumen,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new forumPengumuman entity.
     *
     */
    public function newAction(Request $request)
    {
        $forumPengumuman = new Forumpengumuman();
        $form = $this->createForm('EntitasBundle\Form\ForumPengumumanType', $forumPengumuman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data   = $form->getData();
            $judul  = $data->getJudulPengumuman();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $forumPengumuman->setSlug($slug);

            $em = $this->getDoctrine()->getManager();
            $em->persist($forumPengumuman);
            $em->flush();

            return $this->redirectToRoute('forumpengumuman_index');
        }

        return $this->render('forumpengumuman/new.html.twig', array(
            'forumPengumuman' => $forumPengumuman,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a forumPengumuman entity.
     *
     */
    public function showAction(ForumPengumuman $forumPengumuman)
    {
        $deleteForm = $this->createDeleteForm($forumPengumuman);

        return $this->render('forumpengumuman/show.html.twig', array(
            'forumPengumuman' => $forumPengumuman,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing forumPengumuman entity.
     *
     */
    public function editAction(Request $request, ForumPengumuman $forumPengumuman)
    {
        $deleteForm = $this->createDeleteForm($forumPengumuman);
        $editForm = $this->createForm('EntitasBundle\Form\ForumPengumumanType', $forumPengumuman,
            array('action' => $this->generateUrl('forumpengumuman_edit', array('id' => $forumPengumuman->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) 
        {
            $data   = $editForm->getData();
            $judul  = $data->getJudulPengumuman();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $forumPengumuman->setSlug($slug);
            // $em->persist($forumPengumuman);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            

            return $this->redirectToRoute('forumpengumuman_index');
        }

        return $this->render('forumpengumuman/edit.html.twig', array(
            'forumPengumuman' => $forumPengumuman,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a forumPengumuman entity.
     *
     */
    public function deleteAction(Request $request, ForumPengumuman $forumPengumuman)
    {
        $form = $this->createDeleteForm($forumPengumuman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forumPengumuman);
            $em->flush();
        }

        return $this->redirectToRoute('forumpengumuman_index');
    }

    /**
     * Creates a form to delete a forumPengumuman entity.
     *
     * @param ForumPengumuman $forumPengumuman The forumPengumuman entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ForumPengumuman $forumPengumuman)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forumpengumuman_delete', array('id' => $forumPengumuman->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
