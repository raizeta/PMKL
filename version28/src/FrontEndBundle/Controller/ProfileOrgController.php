<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileOrgController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:ProfileOrg:index.html.twig', array(
            // ...
        ));
    }

}
