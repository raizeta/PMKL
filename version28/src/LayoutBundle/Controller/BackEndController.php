<?php

namespace LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackEndController extends Controller
{
    public function indexAction()
    {
        return $this->render('LayoutBundle:BackEnd:index.html.twig', array(
            // ...
        ));
    }

}
