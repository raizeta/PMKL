<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StrukturOrgController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:StrukturOrg:index.html.twig', array(
            // ...
        ));
    }

}
