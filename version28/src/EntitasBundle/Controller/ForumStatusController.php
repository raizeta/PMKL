<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\ForumStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Forumstatus controller.
 *
 */
class ForumStatusController extends Controller
{
    /**
     * Lists all forumStatus entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumStatus')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forumStatuses = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new ForumStatus();
        $form = $this->createForm('EntitasBundle\Form\ForumStatusType', $entity, array(
            'action' => $this->generateUrl('forumstatus_new'),
            'method' => 'POST',
        ));

        return $this->render('forumstatus/index.html.twig', array(
            'forumStatuses' => $forumStatuses,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new forumStatus entity.
     *
     */
    public function newAction(Request $request)
    {
        $forumStatus = new Forumstatus();
        $form = $this->createForm('EntitasBundle\Form\ForumStatusType', $forumStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($forumStatus);
            $em->flush();

            return $this->redirectToRoute('forumstatus_index');
        }

        return $this->render('forumstatus/new.html.twig', array(
            'forumStatus' => $forumStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a forumStatus entity.
     *
     */
    public function showAction(ForumStatus $forumStatus)
    {
        $deleteForm = $this->createDeleteForm($forumStatus);

        return $this->render('forumstatus/show.html.twig', array(
            'forumStatus' => $forumStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing forumStatus entity.
     *
     */
    public function editAction(Request $request, ForumStatus $forumStatus)
    {
        $deleteForm = $this->createDeleteForm($forumStatus);
        $editForm = $this->createForm('EntitasBundle\Form\ForumStatusType', $forumStatus,
            array('action' => $this->generateUrl('forumstatus_edit', array('id' => $forumStatus->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forumstatus_index');
        }

        return $this->render('forumstatus/edit.html.twig', array(
            'forumStatus' => $forumStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a forumStatus entity.
     *
     */
    public function deleteAction(Request $request, ForumStatus $forumStatus)
    {
        $form = $this->createDeleteForm($forumStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forumStatus);
            $em->flush();
        }

        return $this->redirectToRoute('forumstatus_index');
    }

    /**
     * Creates a form to delete a forumStatus entity.
     *
     * @param ForumStatus $forumStatus The forumStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ForumStatus $forumStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forumstatus_delete', array('id' => $forumStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
