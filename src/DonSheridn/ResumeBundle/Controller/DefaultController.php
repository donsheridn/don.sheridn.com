<?php

namespace DonSheridn\ResumeBundle\Controller;

use DonSheridn\ResumeBundle\Entity\ContactMessage;
use DonSheridn\ResumeBundle\Entity\ContactPerson;
use DonSheridn\ResumeBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {

//next I change the action and method of the form

        $form = $this->createForm(new ContactType(), array(
            'action' => $this->generateUrl('don_sheridn_resume_homepage1'),
            'method' => 'POST',
        ) );

//next I actually have the form do something

        $form->handleRequest($request);

        if ($form->isValid()) {

//Get data from the form
            $ourdata = $form->getData();

//Get data from the form and send data to the database
            $contact = new ContactPerson();

            $contact->setFirstName($ourdata['first_name']);
            $contact->setLastName($ourdata['last_name']);
            $contact->setState($ourdata['state']);
            $contact->setZip($ourdata['zip']);
            $contact->setPhone($ourdata['phone']);

//      exit(\Doctrine\Common\Util\Debug::dump($contact));  //we used this as at this point the data
                                                             //isn't actually sent to the database

            $em = $this->getDoctrine()->getManager();   //we get the entity manager from doctrine

            $em->persist($contact);         //The persist() method tells Doctrine to "manage" the $contact object.
                                            //This does not actually cause a query to be made to the database (yet).

            $em->flush();  //until you flush the entity manager doctrine doesn't actually persist the data

// next I create a message object and add it to the database

            $repository = $this->getDoctrine()->getRepository('DonSheridnResumeBundle:ContactPerson');
            //this essentially tells doctrine to get the sql table behind the ContactPerson class

//        $contact = $em->find('contactPerson', 1);
        $contact = $repository->find(1);

        $message = new ContactMessage();

        $message->setSubject($ourdata['subject']);
        $message->setMessage($ourdata['message']);

        $contact->setMessages($message);     //here the ContactMessage Object is passed to setMessages() method
                                             //of the ContactPerson object and establishes the entity relationship
                                             //between the two.

        //there's no need to call $em->persist($job), because the cascade={"persist"} on the associations will take
        //care of persisting the jobs.

        $em->flush();  //until you flush the entity manager doctrine doesn't actually persist the data


//Next I send an notification email with the data entered on the form.
            $this->emailAction($ourdata);

            return $this->render('DonSheridnResumeBundle:Default:success.html.twig', array(
                'ourform' => $form->createView(),
            ));

        }
        else {
            return $this->render('DonSheridnResumeBundle:Default:index.html.twig', array(
                'ourform' => $form->createView(),
            ));

        }

    }

    public function emailAction($formdata){

        $message = \Swift_Message::newInstance()
            ->setSubject($formdata['subject'])
            ->setFrom($formdata['email'])
            ->setTo($this->container->getParameter('send_to_email'))
            ->setBody(
                $this->renderView(
                    'DonSheridnResumeBundle:Emails:registration.html.twig',
                    array('subject' => $formdata['subject'],
                          'message' => $formdata['message'],
                          'email' => $formdata['email'],
                          'first_name' => $formdata['first_name'],
                          'last_name' => $formdata['last_name'],
                          'state' => $formdata['state'],
                          'zip' => $formdata['zip'],
                          'phone' => $formdata['phone']
                    )
                ),
                'text/html'
            );

        $this->get('mailer')->send($message);

    }

    public function printresumeAction(){

        return new BinaryFileResponse('DonSheridanWebDeveloper.pdf');

//        return new BinaryFileResponse('../../../../web/DonSheridanWebDeveloper.pdf');

    }

}
