<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosTypependidikan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fostypependidikan controller.
 *
 */
class FosTypependidikanController extends Controller
{
    /**
     * Lists all fosTypependidikan entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosTypependidikan')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosTypependidikans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosTypependidikan();
        $form = $this->createForm('EntitasBundle\Form\FosTypependidikanType', $entity, array(
            'action' => $this->generateUrl('fostypependidikan_new'),
            'method' => 'POST',
        ));

        return $this->render('fostypependidikan/index.html.twig', array(
            'fosTypependidikans' => $fosTypependidikans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosTypependidikan entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosTypependidikan = new Fostypependidikan();
        $form = $this->createForm('EntitasBundle\Form\FosTypependidikanType', $fosTypependidikan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosTypependidikan);
            $em->flush();

            return $this->redirectToRoute('fostypependidikan_index');
        }

        return $this->render('fostypependidikan/new.html.twig', array(
            'fosTypependidikan' => $fosTypependidikan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosTypependidikan entity.
     *
     */
    public function showAction(FosTypependidikan $fosTypependidikan)
    {
        $deleteForm = $this->createDeleteForm($fosTypependidikan);

        return $this->render('fostypependidikan/show.html.twig', array(
            'fosTypependidikan' => $fosTypependidikan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosTypependidikan entity.
     *
     */
    public function editAction(Request $request, FosTypependidikan $fosTypependidikan)
    {
        $deleteForm = $this->createDeleteForm($fosTypependidikan);
        $editForm = $this->createForm('EntitasBundle\Form\FosTypependidikanType', $fosTypependidikan,
            array('action' => $this->generateUrl('fostypependidikan_edit', array('id' => $fosTypependidikan->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fostypependidikan_index');
        }

        return $this->render('fostypependidikan/edit.html.twig', array(
            'fosTypependidikan' => $fosTypependidikan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosTypependidikan entity.
     *
     */
    public function deleteAction(Request $request, FosTypependidikan $fosTypependidikan)
    {
        $form = $this->createDeleteForm($fosTypependidikan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosTypependidikan);
            $em->flush();
        }

        return $this->redirectToRoute('fostypependidikan_index');
    }

    /**
     * Creates a form to delete a fosTypependidikan entity.
     *
     * @param FosTypependidikan $fosTypependidikan The fosTypependidikan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosTypependidikan $fosTypependidikan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fostypependidikan_delete', array('id' => $fosTypependidikan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
