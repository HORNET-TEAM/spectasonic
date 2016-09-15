<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Article;

/**
 * Actualite controller.
 *
 */
class ActualiteController extends Controller
{
    /**
     * Lists all Actualite entities.
     *
     */
    public function actuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actus = $em->getRepository('AppBundle:Actualite')->findAll();

        return $this->render('AppBundle:Actu:actu.html.twig', array(
            'actus' => $actus,
        ));
    }

    /**
     * Finds and displays a Actualite entity.
     *
     */
    public function showAction(Actualite $actualite)
    {

        return $this->render('AppBundle:Actu:show.html.twig', array(
            'actualite' => $actualite,
        ));
    }

}
