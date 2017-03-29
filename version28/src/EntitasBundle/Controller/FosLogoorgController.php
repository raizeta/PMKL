<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosLogoorg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Foslogoorg controller.
 *
 */
class FosLogoorgController extends Controller
{
    /**
     * Lists all fosLogoorg entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosLogoorg')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosLogoorgs = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        $entity = new FosLogoorg();
        $form = $this->createForm('EntitasBundle\Form\FosLogoorgType', $entity, array(
            'action' => $this->generateUrl('foslogoorg_new'),
            'method' => 'POST',
        ));

        return $this->render('foslogoorg/index.html.twig', array(
            'fosLogoorgs' => $fosLogoorgs,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosLogoorg entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosLogoorg = new Foslogoorg();
        $form = $this->createForm('EntitasBundle\Form\FosLogoorgType', $fosLogoorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosLogoorg);
            $em->flush();

            return $this->redirectToRoute('foslogoorg_show', array('id' => $fosLogoorg->getId()));
        }

        return $this->render('foslogoorg/new.html.twig', array(
            'fosLogoorg' => $fosLogoorg,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosLogoorg entity.
     *
     */
    public function showAction(FosLogoorg $fosLogoorg)
    {
        $deleteForm = $this->createDeleteForm($fosLogoorg);

        return $this->render('foslogoorg/show.html.twig', array(
            'fosLogoorg' => $fosLogoorg,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosLogoorg entity.
     *
     */
    public function editAction(Request $request, FosLogoorg $fosLogoorg)
    {
        $deleteForm = $this->createDeleteForm($fosLogoorg);
        $editForm = $this->createForm('EntitasBundle\Form\FosLogoorgType', $fosLogoorg,
            array('action' => $this->generateUrl('foslogoorg_edit', array('id' => $fosLogoorg->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('foslogoorg_index');
        }

        return $this->render('foslogoorg/edit.html.twig', array(
            'fosLogoorg' => $fosLogoorg,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosLogoorg entity.
     *
     */
    public function deleteAction(Request $request, FosLogoorg $fosLogoorg)
    {
        $form = $this->createDeleteForm($fosLogoorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosLogoorg);
            $em->flush();
        }

        return $this->redirectToRoute('foslogoorg_index');
    }

    /**
     * Creates a form to delete a fosLogoorg entity.
     *
     * @param FosLogoorg $fosLogoorg The fosLogoorg entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosLogoorg $fosLogoorg)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foslogoorg_delete', array('id' => $fosLogoorg->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
