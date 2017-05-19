<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\ForumKomentar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Forumkomentar controller.
 *
 */
class ForumKomentarController extends Controller
{
    /**
     * Lists all forumKomentar entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:ForumKomentar')->findAll();
        $paginator  = $this->get('knp_paginator');
        $forumKomentars = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new ForumKomentar();
        $form = $this->createForm('EntitasBundle\Form\ForumKomentarType', $entity, array(
            'action' => $this->generateUrl('forumkomentar_new'),
            'method' => 'POST',
        ));

        return $this->render('forumkomentar/index.html.twig', array(
            'forumKomentars' => $forumKomentars,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new forumKomentar entity.
     *
     */
    public function newAction(Request $request)
    {
        $forumKomentar = new Forumkomentar();
        $form = $this->createForm('EntitasBundle\Form\ForumKomentarType', $forumKomentar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($forumKomentar);
            $em->flush();

            return $this->redirectToRoute('forumkomentar_index');
        }

        return $this->render('forumkomentar/new.html.twig', array(
            'forumKomentar' => $forumKomentar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a forumKomentar entity.
     *
     */
    public function showAction(ForumKomentar $forumKomentar)
    {
        $deleteForm = $this->createDeleteForm($forumKomentar);

        return $this->render('forumkomentar/show.html.twig', array(
            'forumKomentar' => $forumKomentar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing forumKomentar entity.
     *
     */
    public function editAction(Request $request, ForumKomentar $forumKomentar)
    {
        $deleteForm = $this->createDeleteForm($forumKomentar);
        $editForm = $this->createForm('EntitasBundle\Form\ForumKomentarType', $forumKomentar,
            array('action' => $this->generateUrl('forumkomentar_edit', array('id' => $forumKomentar->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forumkomentar_index');
        }

        return $this->render('forumkomentar/edit.html.twig', array(
            'forumKomentar' => $forumKomentar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a forumKomentar entity.
     *
     */
    public function deleteAction(Request $request, ForumKomentar $forumKomentar)
    {
        $form = $this->createDeleteForm($forumKomentar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forumKomentar);
            $em->flush();
        }

        return $this->redirectToRoute('forumkomentar_index');
    }

    /**
     * Creates a form to delete a forumKomentar entity.
     *
     * @param ForumKomentar $forumKomentar The forumKomentar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ForumKomentar $forumKomentar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forumkomentar_delete', array('id' => $forumKomentar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
