<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\TblPemasukan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tblpemasukan controller.
 *
 */
class TblPemasukanController extends Controller
{
    /**
     * Lists all tblPemasukan entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:TblPemasukan')->findAll();
        $paginator  = $this->get('knp_paginator');
        $tblPemasukans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new TblPemasukan();
        $form = $this->createForm('EntitasBundle\Form\TblPemasukanType', $entity, array(
            'action' => $this->generateUrl('tblpemasukan_new'),
            'method' => 'POST',
        ));

        return $this->render('tblpemasukan/index.html.twig', array(
            'tblPemasukans' => $tblPemasukans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new tblPemasukan entity.
     *
     */
    public function newAction(Request $request)
    {
        $tblPemasukan = new Tblpemasukan();
        $form = $this->createForm('EntitasBundle\Form\TblPemasukanType', $tblPemasukan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tblPemasukan);
            $em->flush();

            return $this->redirectToRoute('tblpemasukan_index');
        }

        return $this->render('tblpemasukan/new.html.twig', array(
            'tblPemasukan' => $tblPemasukan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tblPemasukan entity.
     *
     */
    public function showAction(TblPemasukan $tblPemasukan)
    {
        $deleteForm = $this->createDeleteForm($tblPemasukan);

        return $this->render('tblpemasukan/show.html.twig', array(
            'tblPemasukan' => $tblPemasukan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tblPemasukan entity.
     *
     */
    public function editAction(Request $request, TblPemasukan $tblPemasukan)
    {
        $deleteForm = $this->createDeleteForm($tblPemasukan);
        $editForm = $this->createForm('EntitasBundle\Form\TblPemasukanType', $tblPemasukan,
            array('action' => $this->generateUrl('tblpemasukan_edit', array('id' => $tblPemasukan->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblpemasukan_index');
        }

        return $this->render('tblpemasukan/edit.html.twig', array(
            'tblPemasukan' => $tblPemasukan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tblPemasukan entity.
     *
     */
    public function deleteAction(Request $request, TblPemasukan $tblPemasukan)
    {
        $form = $this->createDeleteForm($tblPemasukan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tblPemasukan);
            $em->flush();
        }

        return $this->redirectToRoute('tblpemasukan_index');
    }

    /**
     * Creates a form to delete a tblPemasukan entity.
     *
     * @param TblPemasukan $tblPemasukan The tblPemasukan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TblPemasukan $tblPemasukan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tblpemasukan_delete', array('id' => $tblPemasukan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
