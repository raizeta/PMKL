<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProgKerjaOrgController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:ProgKerjaOrg:index.html.twig', array(
            // ...
        ));
    }

}
