<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosTypejabatan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fostypejabatan controller.
 *
 */
class FosTypejabatanController extends Controller
{
    /**
     * Lists all fosTypejabatan entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosTypejabatan')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosTypejabatans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosTypejabatan();
        $form = $this->createForm('EntitasBundle\Form\FosTypejabatanType', $entity, array(
            'action' => $this->generateUrl('fostypejabatan_new'),
            'method' => 'POST',
        ));

        return $this->render('fostypejabatan/index.html.twig', array(
            'fosTypejabatans' => $fosTypejabatans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosTypejabatan entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosTypejabatan = new Fostypejabatan();
        $form = $this->createForm('EntitasBundle\Form\FosTypejabatanType', $fosTypejabatan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosTypejabatan);
            $em->flush();

            return $this->redirectToRoute('fostypejabatan_show', array('id' => $fosTypejabatan->getId()));
        }

        return $this->render('fostypejabatan/new.html.twig', array(
            'fosTypejabatan' => $fosTypejabatan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosTypejabatan entity.
     *
     */
    public function showAction(FosTypejabatan $fosTypejabatan)
    {
        $deleteForm = $this->createDeleteForm($fosTypejabatan);

        return $this->render('fostypejabatan/show.html.twig', array(
            'fosTypejabatan' => $fosTypejabatan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosTypejabatan entity.
     *
     */
    public function editAction(Request $request, FosTypejabatan $fosTypejabatan)
    {
        $deleteForm = $this->createDeleteForm($fosTypejabatan);
        $editForm = $this->createForm('EntitasBundle\Form\FosTypejabatanType', $fosTypejabatan,
            array('action' => $this->generateUrl('fostypejabatan_edit', array('id' => $fosTypejabatan->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fostypejabatan_index');
        }

        return $this->render('fostypejabatan/edit.html.twig', array(
            'fosTypejabatan' => $fosTypejabatan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosTypejabatan entity.
     *
     */
    public function deleteAction(Request $request, FosTypejabatan $fosTypejabatan)
    {
        $form = $this->createDeleteForm($fosTypejabatan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosTypejabatan);
            $em->flush();
        }

        return $this->redirectToRoute('fostypejabatan_index');
    }

    /**
     * Creates a form to delete a fosTypejabatan entity.
     *
     * @param FosTypejabatan $fosTypejabatan The fosTypejabatan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosTypejabatan $fosTypejabatan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fostypejabatan_delete', array('id' => $fosTypejabatan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
