<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontControllerController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Front:index.html.twig');
    }

}
