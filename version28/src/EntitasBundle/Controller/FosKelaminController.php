<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosKelamin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Foskelamin controller.
 *
 */
class FosKelaminController extends Controller
{
    /**
     * Lists all fosKelamin entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosKelamin')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosKelamins = $paginator->paginate($query,$request->query->getInt('page', 1),5);

        $entity = new FosKelamin();
        $form = $this->createForm('EntitasBundle\Form\FosKelaminType', $entity, array(
            'action' => $this->generateUrl('foskelamin_new'),
            'method' => 'POST',
        ));

        return $this->render('foskelamin/index.html.twig', array(
            'fosKelamins' => $fosKelamins,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosKelamin entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosKelamin = new Foskelamin();
        $form = $this->createForm('EntitasBundle\Form\FosKelaminType', $fosKelamin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosKelamin);
            $em->flush();

            return $this->redirectToRoute('foskelamin_show', array('id' => $fosKelamin->getId()));
        }

        return $this->render('foskelamin/new.html.twig', array(
            'fosKelamin' => $fosKelamin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosKelamin entity.
     *
     */
    public function showAction(FosKelamin $fosKelamin)
    {
        $deleteForm = $this->createDeleteForm($fosKelamin);

        return $this->render('foskelamin/show.html.twig', array(
            'fosKelamin' => $fosKelamin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosKelamin entity.
     *
     */
    public function editAction(Request $request, FosKelamin $fosKelamin)
    {
        $deleteForm = $this->createDeleteForm($fosKelamin);
        $editForm = $this->createForm('EntitasBundle\Form\FosKelaminType', $fosKelamin,
            array('action' => $this->generateUrl('foskelamin_edit', array('id' => $fosKelamin->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('foskelamin_index');
        }

        return $this->render('foskelamin/edit.html.twig', array(
            'fosKelamin' => $fosKelamin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosKelamin entity.
     *
     */
    public function deleteAction(Request $request, FosKelamin $fosKelamin)
    {
        $form = $this->createDeleteForm($fosKelamin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosKelamin);
            $em->flush();
        }

        return $this->redirectToRoute('foskelamin_index');
    }

    /**
     * Creates a form to delete a fosKelamin entity.
     *
     * @param FosKelamin $fosKelamin The fosKelamin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosKelamin $fosKelamin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foskelamin_delete', array('id' => $fosKelamin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
