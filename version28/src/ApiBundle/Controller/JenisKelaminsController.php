<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use EntitasBundle\Entity\FosProfile;
use EntitasBundle\Form\FosProfileType;

/**
 * Class AnggotasController
 * @package ApiBundle\Controller
 * @RouteResource("kelamins")
 */
class JenisKelaminsController extends FOSRestController implements ClassResourceInterface
{

    /**
     * Gets an individual Blog Post
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="AppBundle\Entity\BlogPost",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
	public function getAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosKelamin')->find($id);
        if ($query === null) 
        {
            return new View(null, Response::HTTP_NOT_FOUND);
        }  
        return View::create(array('Brand'=>$query),Response::HTTP_OK);
    }

    /**
     * Gets a collection of Category
     *
     * @ApiDoc(
     *     output="EntitasBundle\Entity\FosProfile",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosKelamin')->findAll();
        return View::create(['Kelamins'=>$query],Response::HTTP_OK);
    }

}
