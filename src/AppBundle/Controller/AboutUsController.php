<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

use AppBundle\Entity\Actu;

/**
 * Actualite controller.
 *
 */
class AboutUsController extends Controller
{
	public function showAction() {
		return $this->render('AppBundle:AboutUs:show.html.twig');
	}
}