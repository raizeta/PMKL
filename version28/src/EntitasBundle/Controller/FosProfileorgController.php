<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosProfileorg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fosprofileorg controller.
 *
 */
class FosProfileorgController extends Controller
{
    /**
     * Lists all fosProfileorg entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosProfileorg')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosProfileorgs = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosProfileorg();
        $form = $this->createForm('EntitasBundle\Form\FosProfileorgType', $entity, array(
            'action' => $this->generateUrl('fosprofileorg_new'),
            'method' => 'POST',
        ));

        return $this->render('fosprofileorg/index.html.twig', array(
            'fosProfileorgs' => $fosProfileorgs,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosProfileorg entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosProfileorg = new Fosprofileorg();
        $form = $this->createForm('EntitasBundle\Form\FosProfileorgType', $fosProfileorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosProfileorg);
            $em->flush();

            return $this->redirectToRoute('fosprofileorg_show', array('id' => $fosProfileorg->getId()));
        }

        return $this->render('fosprofileorg/new.html.twig', array(
            'fosProfileorg' => $fosProfileorg,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosProfileorg entity.
     *
     */
    public function showAction(FosProfileorg $fosProfileorg)
    {
        $deleteForm = $this->createDeleteForm($fosProfileorg);

        return $this->render('fosprofileorg/show.html.twig', array(
            'fosProfileorg' => $fosProfileorg,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosProfileorg entity.
     *
     */
    public function editAction(Request $request, FosProfileorg $fosProfileorg)
    {
        $deleteForm = $this->createDeleteForm($fosProfileorg);
        $editForm = $this->createForm('EntitasBundle\Form\FosProfileorgType', $fosProfileorg,
            array('action' => $this->generateUrl('fosprofileorg_edit', array('id' => $fosProfileorg->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fosprofileorg_index');
        }

        return $this->render('fosprofileorg/edit.html.twig', array(
            'fosProfileorg' => $fosProfileorg,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosProfileorg entity.
     *
     */
    public function deleteAction(Request $request, FosProfileorg $fosProfileorg)
    {
        $form = $this->createDeleteForm($fosProfileorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosProfileorg);
            $em->flush();
        }

        return $this->redirectToRoute('fosprofileorg_index');
    }

    /**
     * Creates a form to delete a fosProfileorg entity.
     *
     * @param FosProfileorg $fosProfileorg The fosProfileorg entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosProfileorg $fosProfileorg)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosprofileorg_delete', array('id' => $fosProfileorg->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
