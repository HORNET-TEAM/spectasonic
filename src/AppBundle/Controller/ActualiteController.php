<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

use AppBundle\Entity\Actu;

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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //TODO paginator
        $actus = $em->getRepository('AppBundle:Actualite')->findBy( array('published' => true), array('updatedAt' => 'DESC'));

        return $this->render('AppBundle:Actu:index.html.twig', array(
            'actus' => $actus,
        ));
    }

    /**
     * Lists all Actualite entities.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actus = $em->getRepository('AppBundle:Actualite')->findBy( array('published' => true),  array('updatedAt' => 'DESC'), 3, null);

        return $this->render('AppBundle:Actu:list.html.twig', array(
            'actus' => $actus,
        ));
    }

    /**
     * Lists all Actualite entities.
     *
     */
    public function exampleShowAction()
    {

        return $this->render('AppBundle:Actu:actu.html.twig');
    }

    /**
     * Finds and displays a Actualite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $actualite = $em->getRepository('AppBundle:Actualite')->find($id);
        if ($actualite === NULL ) {
            throw new Exception("Entity not found", 1);
        } elseif ($actualite->getPublished() === false) {
            throw new Exception("Entity not published", 1);
        }

        return $this->render('AppBundle:Actu:show.html.twig', array(
            'actu' => $actualite,
        ));
    }

}
