<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumOrgController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:ForumOrg:index.html.twig', array(
            // ...
        ));
    }

}
