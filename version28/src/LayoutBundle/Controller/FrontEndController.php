<?php

namespace LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontEndController extends Controller
{
	public function indexAction()
    {
        return $this->render('LayoutBundle:FrontEnd:index.html.twig', array(
            // ...
        ));
    }
}
