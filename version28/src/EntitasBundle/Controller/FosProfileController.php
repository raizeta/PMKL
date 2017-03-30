<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosProfile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fosprofile controller.
 *
 */
class FosProfileController extends Controller
{
    /**
     * Lists all fosProfile entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosProfile')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosProfiles = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosProfile();
        $form = $this->createForm('EntitasBundle\Form\FosProfileType', $entity, array(
            'action' => $this->generateUrl('fosprofile_new'),
            'method' => 'POST',
        ));

        return $this->render('fosprofile/index.html.twig', array(
            'fosProfiles' => $fosProfiles,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosProfile entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosProfile = new Fosprofile();
        $form = $this->createForm('EntitasBundle\Form\FosProfileType', $fosProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosProfile);
            $em->flush();

            return $this->redirectToRoute('fosprofile_index');
        }

        return $this->render('fosprofile/new.html.twig', array(
            'fosProfile' => $fosProfile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosProfile entity.
     *
     */
    public function showAction(FosProfile $fosProfile)
    {
        $deleteForm = $this->createDeleteForm($fosProfile);

        return $this->render('fosprofile/show.html.twig', array(
            'fosProfile' => $fosProfile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosProfile entity.
     *
     */
    public function editAction(Request $request, FosProfile $fosProfile)
    {
        $deleteForm = $this->createDeleteForm($fosProfile);
        $editForm = $this->createForm('EntitasBundle\Form\FosProfileType', $fosProfile,
            array('action' => $this->generateUrl('fosprofile_edit', array('id' => $fosProfile->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fosprofile_index');
        }

        return $this->render('fosprofile/edit.html.twig', array(
            'fosProfile' => $fosProfile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosProfile entity.
     *
     */
    public function deleteAction(Request $request, FosProfile $fosProfile)
    {
        $form = $this->createDeleteForm($fosProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosProfile);
            $em->flush();
        }

        return $this->redirectToRoute('fosprofile_index');
    }

    /**
     * Creates a form to delete a fosProfile entity.
     *
     * @param FosProfile $fosProfile The fosProfile entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosProfile $fosProfile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosprofile_delete', array('id' => $fosProfile->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
