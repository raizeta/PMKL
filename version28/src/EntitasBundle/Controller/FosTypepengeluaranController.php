<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosTypepengeluaran;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fostypepengeluaran controller.
 *
 */
class FosTypepengeluaranController extends Controller
{
    /**
     * Lists all fosTypepengeluaran entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosTypepengeluaran')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosTypepengeluarans = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        $entity = new FosTypepengeluaran();
        $form = $this->createForm('EntitasBundle\Form\FosTypepengeluaranType', $entity, array(
            'action' => $this->generateUrl('fostypepengeluaran_new'),
            'method' => 'POST',
        ));

        return $this->render('fostypepengeluaran/index.html.twig', array(
            'fosTypepengeluarans' => $fosTypepengeluarans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosTypepengeluaran entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosTypepengeluaran = new Fostypepengeluaran();
        $form = $this->createForm('EntitasBundle\Form\FosTypepengeluaranType', $fosTypepengeluaran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosTypepengeluaran);
            $em->flush();

            return $this->redirectToRoute('fostypepengeluaran_show', array('id' => $fosTypepengeluaran->getId()));
        }

        return $this->render('fostypepengeluaran/new.html.twig', array(
            'fosTypepengeluaran' => $fosTypepengeluaran,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosTypepengeluaran entity.
     *
     */
    public function showAction(FosTypepengeluaran $fosTypepengeluaran)
    {
        $deleteForm = $this->createDeleteForm($fosTypepengeluaran);

        return $this->render('fostypepengeluaran/show.html.twig', array(
            'fosTypepengeluaran' => $fosTypepengeluaran,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosTypepengeluaran entity.
     *
     */
    public function editAction(Request $request, FosTypepengeluaran $fosTypepengeluaran)
    {
        $deleteForm = $this->createDeleteForm($fosTypepengeluaran);
        $editForm = $this->createForm('EntitasBundle\Form\FosTypepengeluaranType', $fosTypepengeluaran,
            array('action' => $this->generateUrl('fostypepengeluaran_edit', array('id' => $fosTypepengeluaran->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fostypepengeluaran_index');
        }

        return $this->render('fostypepengeluaran/edit.html.twig', array(
            'fosTypepengeluaran' => $fosTypepengeluaran,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosTypepengeluaran entity.
     *
     */
    public function deleteAction(Request $request, FosTypepengeluaran $fosTypepengeluaran)
    {
        $form = $this->createDeleteForm($fosTypepengeluaran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosTypepengeluaran);
            $em->flush();
        }

        return $this->redirectToRoute('fostypepengeluaran_index');
    }

    /**
     * Creates a form to delete a fosTypepengeluaran entity.
     *
     * @param FosTypepengeluaran $fosTypepengeluaran The fosTypepengeluaran entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosTypepengeluaran $fosTypepengeluaran)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fostypepengeluaran_delete', array('id' => $fosTypepengeluaran->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
