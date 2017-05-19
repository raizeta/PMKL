<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosTypepemasukan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fostypepemasukan controller.
 *
 */
class FosTypepemasukanController extends Controller
{
    /**
     * Lists all fosTypepemasukan entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosTypepemasukan')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosTypepemasukans = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        $entity = new FosTypepemasukan();
        $form = $this->createForm('EntitasBundle\Form\FosTypepemasukanType', $entity, array(
            'action' => $this->generateUrl('fostypepemasukan_new'),
            'method' => 'POST',
        ));

        return $this->render('fostypepemasukan/index.html.twig', array(
            'fosTypepemasukans' => $fosTypepemasukans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosTypepemasukan entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosTypepemasukan = new Fostypepemasukan();
        $form = $this->createForm('EntitasBundle\Form\FosTypepemasukanType', $fosTypepemasukan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosTypepemasukan);
            $em->flush();

            return $this->redirectToRoute('fostypepemasukan_index');
        }

        return $this->render('fostypepemasukan/new.html.twig', array(
            'fosTypepemasukan' => $fosTypepemasukan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosTypepemasukan entity.
     *
     */
    public function showAction(FosTypepemasukan $fosTypepemasukan)
    {
        $deleteForm = $this->createDeleteForm($fosTypepemasukan);

        return $this->render('fostypepemasukan/show.html.twig', array(
            'fosTypepemasukan' => $fosTypepemasukan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosTypepemasukan entity.
     *
     */
    public function editAction(Request $request, FosTypepemasukan $fosTypepemasukan)
    {
        $deleteForm = $this->createDeleteForm($fosTypepemasukan);
        $editForm = $this->createForm('EntitasBundle\Form\FosTypepemasukanType', $fosTypepemasukan,
            array('action' => $this->generateUrl('fostypepemasukan_edit', array('id' => $fosTypepemasukan->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fostypepemasukan_index');
        }

        return $this->render('fostypepemasukan/edit.html.twig', array(
            'fosTypepemasukan' => $fosTypepemasukan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosTypepemasukan entity.
     *
     */
    public function deleteAction(Request $request, FosTypepemasukan $fosTypepemasukan)
    {
        $form = $this->createDeleteForm($fosTypepemasukan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosTypepemasukan);
            $em->flush();
        }

        return $this->redirectToRoute('fostypepemasukan_index');
    }

    /**
     * Creates a form to delete a fosTypepemasukan entity.
     *
     * @param FosTypepemasukan $fosTypepemasukan The fosTypepemasukan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosTypepemasukan $fosTypepemasukan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fostypepemasukan_delete', array('id' => $fosTypepemasukan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
