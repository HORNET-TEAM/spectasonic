<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

use AppBundle\Entity\Actu;

/**
 * Service controller.
 *
 */
class ServiceController extends Controller
{
	public function showAction() {
		return $this->render('AppBundle:Service:show.html.twig');
	}
}