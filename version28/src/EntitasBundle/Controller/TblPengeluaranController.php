<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\TblPengeluaran;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tblpengeluaran controller.
 *
 */
class TblPengeluaranController extends Controller
{
    /**
     * Lists all tblPengeluaran entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:TblPengeluaran')->findAll();
        $paginator  = $this->get('knp_paginator');
        $tblPengeluarans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new TblPengeluaran();
        $form = $this->createForm('EntitasBundle\Form\TblPengeluaranType', $entity, array(
            'action' => $this->generateUrl('tblpengeluaran_new'),
            'method' => 'POST',
        ));

        return $this->render('tblpengeluaran/index.html.twig', array(
            'tblPengeluarans' => $tblPengeluarans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new tblPengeluaran entity.
     *
     */
    public function newAction(Request $request)
    {
        $tblPengeluaran = new Tblpengeluaran();
        $form = $this->createForm('EntitasBundle\Form\TblPengeluaranType', $tblPengeluaran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tblPengeluaran);
            $em->flush();

            return $this->redirectToRoute('tblpengeluaran_index');
        }

        return $this->render('tblpengeluaran/new.html.twig', array(
            'tblPengeluaran' => $tblPengeluaran,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tblPengeluaran entity.
     *
     */
    public function showAction(TblPengeluaran $tblPengeluaran)
    {
        $deleteForm = $this->createDeleteForm($tblPengeluaran);

        return $this->render('tblpengeluaran/show.html.twig', array(
            'tblPengeluaran' => $tblPengeluaran,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tblPengeluaran entity.
     *
     */
    public function editAction(Request $request, TblPengeluaran $tblPengeluaran)
    {
        $deleteForm = $this->createDeleteForm($tblPengeluaran);
        $editForm = $this->createForm('EntitasBundle\Form\TblPengeluaranType', $tblPengeluaran,
            array('action' => $this->generateUrl('tblpengeluaran_edit', array('id' => $tblPengeluaran->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblpengeluaran_index');
        }

        return $this->render('tblpengeluaran/edit.html.twig', array(
            'tblPengeluaran' => $tblPengeluaran,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tblPengeluaran entity.
     *
     */
    public function deleteAction(Request $request, TblPengeluaran $tblPengeluaran)
    {
        $form = $this->createDeleteForm($tblPengeluaran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tblPengeluaran);
            $em->flush();
        }

        return $this->redirectToRoute('tblpengeluaran_index');
    }

    /**
     * Creates a form to delete a tblPengeluaran entity.
     *
     * @param TblPengeluaran $tblPengeluaran The tblPengeluaran entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TblPengeluaran $tblPengeluaran)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tblpengeluaran_delete', array('id' => $tblPengeluaran->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
