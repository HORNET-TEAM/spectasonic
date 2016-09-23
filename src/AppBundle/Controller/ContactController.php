<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response As SendResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{
    protected $toEmail;

    /**
     * Creates a new Contact entity.
     *
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('AppBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Message in our system !');

            $done = $this->sendEmail($contact->getSubject(), $contact->getBody(), $contact->getEmail());

            //  Control email receive in our system
            if ($done) {
                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Email recieve ! ');
            } else {
                $request->getSession()
                    ->getFlashBag()
                    ->add('fail', 'Email not recieve ! ');
            }

            return $this->redirectToRoute('app_index');
        }

        return $this->render('AppBundle:Contact:new.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Send email
     * @param string $subject Mail subject
     * @param string $body    Mail body
     * @param string $from    Mail from
     * @return type
     */
     public function sendEmail($subject, $body, $from)
    {
        // Get the dependancie injection mail
        $mailTo = $this->get('app.contact.controller.mail')->getEmail();

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($mailTo)
            ->setBody($body)
        ;

        $done = $this->get('mailer')->send($message);

        return $done;
    }

    // Dependencie injection on same entity, bad but why not ?
    public function setEmail($email) {

        $this->toEmail = $email;
    }


    public function getEmail() {

        return $this->toEmail;
    }
}