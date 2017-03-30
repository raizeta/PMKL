<?php

namespace EntitasBundle\Controller;

use EntitasBundle\Entity\FosStrukorg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Fosstrukorg controller.
 *
 */
class FosStrukorgController extends Controller
{
    /**
     * Lists all fosStrukorg entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosStrukorg')->findAll();
        $paginator  = $this->get('knp_paginator');
        $fosStrukorgs = $paginator->paginate($query,$request->query->getInt('page', 1),50);

        $entity = new FosStrukorg();
        $form = $this->createForm('EntitasBundle\Form\FosStrukorgType', $entity, array(
            'action' => $this->generateUrl('fosstrukorg_new'),
            'method' => 'POST',
        ));

        return $this->render('fosstrukorg/index.html.twig', array(
            'fosStrukorgs' => $fosStrukorgs,'entity'=>$entity,'form' => $form->createView(),
        ));
    }

    /**
     * Lists all fosStrukorg entities.
     *
     */
    public function indexJsonAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosStrukorg')->findAllArray();
        // foreach($entities as $categoryList)
        // {
        //     $data[] = array
        //     (
        //         'id' => $categoryList->getId(),
        //         'slug' => $categoryList->getSlug(),
        //         'createAt' => $categoryList->getCreateAt(),
        //         'updateAt' => $categoryList->getUpdateAt()
        //     );
        // }
        return new JsonResponse($query);
        
    }
    /**
     * Creates a new fosStrukorg entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosStrukorg = new Fosstrukorg();
        $form = $this->createForm('EntitasBundle\Form\FosStrukorgType', $fosStrukorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data = $form->getData();
            $nama = $data->getTypeJabatans()->getNamaType();
            $fosStrukorg->setNamaJabatan($nama);
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosStrukorg);
            $em->flush();

            return $this->redirectToRoute('fosstrukorg_index');
        }

        return $this->render('fosstrukorg/new.html.twig', array(
            'fosStrukorg' => $fosStrukorg,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fosStrukorg entity.
     *
     */
    public function showAction(FosStrukorg $fosStrukorg)
    {
        $deleteForm = $this->createDeleteForm($fosStrukorg);

        return $this->render('fosstrukorg/show.html.twig', array(
            'fosStrukorg' => $fosStrukorg,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fosStrukorg entity.
     *
     */
    public function editAction(Request $request, FosStrukorg $fosStrukorg)
    {
        $deleteForm = $this->createDeleteForm($fosStrukorg);
        $editForm = $this->createForm('EntitasBundle\Form\FosStrukorgType', $fosStrukorg,
            array('action' => $this->generateUrl('fosstrukorg_edit', array('id' => $fosStrukorg->getId())),'method' => 'POST')
            );
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fosstrukorg_index');
        }

        return $this->render('fosstrukorg/edit.html.twig', array(
            'fosStrukorg' => $fosStrukorg,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fosStrukorg entity.
     *
     */
    public function deleteAction(Request $request, FosStrukorg $fosStrukorg)
    {
        $form = $this->createDeleteForm($fosStrukorg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosStrukorg);
            $em->flush();
        }

        return $this->redirectToRoute('fosstrukorg_index');
    }

    /**
     * Creates a form to delete a fosStrukorg entity.
     *
     * @param FosStrukorg $fosStrukorg The fosStrukorg entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosStrukorg $fosStrukorg)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosstrukorg_delete', array('id' => $fosStrukorg->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
