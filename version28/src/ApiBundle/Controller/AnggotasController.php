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
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Form\FormInterface;

use Hateoas\Representation\CollectionRepresentation;
use Hateoas\Representation\PaginatedRepresentation;

use EntitasBundle\Entity\FosProfile;
use EntitasBundle\Form\FosProfileType;


/**
 * Class AnggotasController
 * @package ApiBundle\Controller
 * @RouteResource("anggotas")
 */
class AnggotasController extends FOSRestController implements ClassResourceInterface
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
        $query = $em->getRepository('EntitasBundle:FosProfile')->find($id);
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
        $query = $em->getRepository('EntitasBundle:FosProfile')->findAll();
        $limit = $request->query->get('limit',2000);
        $page = $request->query->get('page',1);
        $offset = ($page - 1) * $limit;
        $numberOfPages = (int) ceil(count($query) / $limit);
        $collection = new CollectionRepresentation(array_slice($query, $offset, $limit));
        $paginated = new PaginatedRepresentation($collection,'cget_anggotas',array(),$page,$limit,$numberOfPages);

        // return new JsonResponse(array('Indonesia'=>$query));
        return View::create(['Profiles'=>$paginated],Response::HTTP_OK);
    }

    public function postAction(Request $request)
    {
        $fosProfile = new Fosprofile();
        $form = $this->createForm(FosProfileType::class, $fosProfile, ['csrf_protection' => false]);

        $this->processForm($request, $form);
        if (!$form->isValid()) 
        {
            $errors = $this->getErrorsFromForm($form);
            $data = [
                'type' => 'validation_error',
                'title' => 'There was a validation error',
                'errors' => $errors
            ];
            return new JsonResponse($data, 400);
        }
    }
    public function processForm(Request $request, FormInterface $form)
    {
        $data = json_decode($request->getContent(), true);
        $clearMissing = $request->getMethod() != 'PATCH';
        $form->submit($data, $clearMissing);
    }

    private function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }
}
