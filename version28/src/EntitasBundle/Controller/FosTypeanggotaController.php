<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosTypeanggota;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fostypeanggotum controller.
 *
 */
class FosTypeanggotaController extends Controller
{
    /**
     * Lists all fosTypeanggotum entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosTypeanggota')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosTypeanggotas = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        $entity = new FosTypeanggota();
        $form = $this->createForm('EntitasBundle\Form\FosTypeanggotaType', $entity, array(
            'action' => $this->generateUrl('fostypeanggota_new'),
            'method' => 'POST',
        ));

        return $this->render('fostypeanggota/index.html.twig', array(
            'fosTypeanggotas' => $fosTypeanggotas,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosTypeanggotum entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosTypeanggotum = new FosTypeanggota();
        $form = $this->createForm('EntitasBundle\Form\FosTypeanggotaType', $fosTypeanggotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosTypeanggotum);
            $em->flush();

            return $this->redirectToRoute('fostypeanggota_show', array('id' => $fosTypeanggotum->getId()));
        }

        return $this->render('fostypeanggota/new.html.twig', array(
            'fosTypeanggotum' => $fosTypeanggotum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosTypeanggotum entity.
     *
     */
    public function showAction(FosTypeanggota $fosTypeanggotum)
    {
        $deleteForm = $this->createDeleteForm($fosTypeanggotum);

        return $this->render('fostypeanggota/show.html.twig', array(
            'fosTypeanggotum' => $fosTypeanggotum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosTypeanggotum entity.
     *
     */
    public function editAction(Request $request, FosTypeanggota $fosTypeanggotum)
    {
        $deleteForm = $this->createDeleteForm($fosTypeanggotum);
        $editForm = $this->createForm('EntitasBundle\Form\FosTypeanggotaType', $fosTypeanggotum,
            array('action' => $this->generateUrl('fostypeanggota_edit', array('id' => $fosTypeanggotum->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fostypeanggota_index');
        }

        return $this->render('fostypeanggota/edit.html.twig', array(
            'fosTypeanggotum' => $fosTypeanggotum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosTypeanggotum entity.
     *
     */
    public function deleteAction(Request $request, FosTypeanggota $fosTypeanggotum)
    {
        $form = $this->createDeleteForm($fosTypeanggotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosTypeanggotum);
            $em->flush();
        }

        return $this->redirectToRoute('fostypeanggota_index');
    }

    /**
     * Creates a form to delete a fosTypeanggotum entity.
     *
     * @param FosTypeanggota $fosTypeanggotum The fosTypeanggotum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosTypeanggota $fosTypeanggotum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fostypeanggota_delete', array('id' => $fosTypeanggotum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
