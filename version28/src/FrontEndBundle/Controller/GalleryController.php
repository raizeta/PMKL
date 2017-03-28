<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:Gallery:index.html.twig', array(
            // ...
        ));
    }

}
