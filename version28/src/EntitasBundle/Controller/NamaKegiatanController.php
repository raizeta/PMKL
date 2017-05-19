<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\NamaKegiatan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Namakegiatan controller.
 *
 */
class NamaKegiatanController extends Controller
{
    /**
     * Lists all namaKegiatan entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:NamaKegiatan')->findAll();
        $paginator  = $this->get('knp_paginator');
        $namaKegiatans = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new NamaKegiatan();
        $form = $this->createForm('EntitasBundle\Form\NamaKegiatanType', $entity, array(
            'action' => $this->generateUrl('namakegiatan_new'),
            'method' => 'POST',
        ));

        return $this->render('namakegiatan/index.html.twig', array(
            'namaKegiatans' => $namaKegiatans,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new namaKegiatan entity.
     *
     */
    public function newAction(Request $request)
    {
        $namaKegiatan = new Namakegiatan();
        $form = $this->createForm('EntitasBundle\Form\NamaKegiatanType', $namaKegiatan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data   = $form->getData();
            $nama   = $data->getNama();
            $slug   = $this->get('entitas.slugger')->slugify($nama);
            $namaKegiatan->setSlug($slug);

            $em = $this->getDoctrine()->getManager();
            $em->persist($namaKegiatan);
            $em->flush();

            return $this->redirectToRoute('namakegiatan_index');
        }

        return $this->render('namakegiatan/new.html.twig', array(
            'namaKegiatan' => $namaKegiatan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a namaKegiatan entity.
     *
     */
    public function showAction(NamaKegiatan $namaKegiatan)
    {
        $deleteForm = $this->createDeleteForm($namaKegiatan);

        return $this->render('namakegiatan/show.html.twig', array(
            'namaKegiatan' => $namaKegiatan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing namaKegiatan entity.
     *
     */
    public function editAction(Request $request, NamaKegiatan $namaKegiatan)
    {
        $deleteForm = $this->createDeleteForm($namaKegiatan);
        $editForm = $this->createForm('EntitasBundle\Form\NamaKegiatanType', $namaKegiatan,
            array('action' => $this->generateUrl('namakegiatan_edit', array('id' => $namaKegiatan->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) 
        {
            $data   = $editForm->getData();
            $nama   = $data->getNama();
            $slug   = $this->get('entitas.slugger')->slugify($nama);
            $namaKegiatan->setSlug($slug);
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('namakegiatan_index');
        }

        return $this->render('namakegiatan/edit.html.twig', array(
            'namaKegiatan' => $namaKegiatan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a namaKegiatan entity.
     *
     */
    public function deleteAction(Request $request, NamaKegiatan $namaKegiatan)
    {
        $form = $this->createDeleteForm($namaKegiatan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($namaKegiatan);
            $em->flush();
        }

        return $this->redirectToRoute('namakegiatan_index');
    }

    /**
     * Creates a form to delete a namaKegiatan entity.
     *
     * @param NamaKegiatan $namaKegiatan The namaKegiatan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NamaKegiatan $namaKegiatan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('namakegiatan_delete', array('id' => $namaKegiatan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
