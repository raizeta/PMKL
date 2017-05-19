<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosSlider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fosslider controller.
 *
 */
class FosSliderController extends Controller
{
    /**
     * Lists all fosSlider entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosSlider')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosSliders = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosSlider();
        $form = $this->createForm('EntitasBundle\Form\FosSliderType', $entity, array(
            'action' => $this->generateUrl('fosslider_new'),
            'method' => 'POST',
        ));

        return $this->render('fosslider/index.html.twig', array(
            'fosSliders' => $fosSliders,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new fosSlider entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosSlider = new Fosslider();
        $form = $this->createForm('EntitasBundle\Form\FosSliderType', $fosSlider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data   = $form->getData();
            $judul  = $data->getJudul();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $fosSlider->setSlug($slug);

            $em = $this->getDoctrine()->getManager();
            $em->persist($fosSlider);
            $em->flush();

            return $this->redirectToRoute('fosslider_index');
        }

        return $this->render('fosslider/new.html.twig', array(
            'fosSlider' => $fosSlider,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosSlider entity.
     *
     */
    public function showAction(FosSlider $fosSlider)
    {
        $deleteForm = $this->createDeleteForm($fosSlider);

        return $this->render('fosslider/show.html.twig', array(
            'fosSlider' => $fosSlider,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosSlider entity.
     *
     */
    public function editAction(Request $request, FosSlider $fosSlider)
    {
        $deleteForm = $this->createDeleteForm($fosSlider);
        $editForm = $this->createForm('EntitasBundle\Form\FosSliderType', $fosSlider,
            array('action' => $this->generateUrl('fosslider_edit', array('id' => $fosSlider->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) 
        {
            $data   = $editForm->getData();
            $judul  = $data->getJudul();
            $slug   = $this->get('entitas.slugger')->slugify($judul);
            $fosSlider->setSlug($slug);
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fosslider_index');
        }

        return $this->render('fosslider/edit.html.twig', array(
            'fosSlider' => $fosSlider,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosSlider entity.
     *
     */
    public function deleteAction(Request $request, FosSlider $fosSlider)
    {
        $form = $this->createDeleteForm($fosSlider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosSlider);
            $em->flush();
        }

        return $this->redirectToRoute('fosslider_index');
    }

    /**
     * Creates a form to delete a fosSlider entity.
     *
     * @param FosSlider $fosSlider The fosSlider entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosSlider $fosSlider)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosslider_delete', array('id' => $fosSlider->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
