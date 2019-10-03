<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\RegistrationEvent;
use AppBundle\Entity\GroupEvent;
use AppBundle\Form\RegistrationEventForm;

class frontendController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $groupeventrepository = $em->getRepository('AppBundle\Entity\GroupEvent');
        $groupevent = $groupeventrepository->findByActive(true);
    
        // replace this example code with whatever you need
        return $this->render('frontend/index.html.twig', [
        'groupevent' => $groupevent,
        ]);


    }

    /**
     * @Route("/courseinfo/{groupevent}/view", name="courseinfo")
     */
    public function courseinfoAction(Request $request, GroupEvent $groupevent)
    {
        // replace this example code with whatever you need
        return $this->render('frontend/courseinfo.html.twig', [
            'groupevent' =>$groupevent
        ]);
    }

    /**
     * @Route("/registration/{groupevent}/register", name="registrationevent")
     */
    public function registrationevent(Request $request, GroupEvent $groupevent, \Swift_Mailer $mailer)
    {
        $registrationevent = new RegistrationEvent();
        $registrationevent->setGroupEvent($groupevent);
        $form = $this->createForm(RegistrationEventForm::class, $registrationevent);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()) {
                $data = $form->getData();
                $data->setDateStamp(new \DateTime());
                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                $internalmessage = (new \Swift_Message('New Registration'))
                ->setFrom($this->container->getParameter('mailer_user'))
                ->setTo($this->container->getParameter('wellbeing_inbox'))
                ->setBody($this->renderView(
                    'emails/internalmessage.html.twig', [
                        'data' => $data
                        ]
                    ),'text/html'
                );

                try {
                    $internalresult = $mailer->send($internalmessage);
                } catch (\Swift_TransportException $Ste) {
                    return $this->render('frontend/registrationfailinternal.html.twig');
                }
          
            
                if($internalresult === 1){
                    
                    $externalmessage = (new \Swift_Message('New Registration'))
                    ->setFrom($this->container->getParameter('mailer_user'))
                    ->setBody($this->renderView(
                        'emails/externalmessage.html.twig', [
                            'data' => $data
                            ]
                        ),'text/html'
                    );
                    try{
                        $externalmessage->setTo($data -> getEmailAddress());
                    } catch(Swift_RfcComplianceException $e){
                        return $this->render('frontend/registrationfailexternal.html.twig');
                    }      
                    $externalresult = $mailer->send($externalmessage);
                    
                    if($externalresult === 1){
                        #Everything worked
                        return $this->render('frontend/registrationconfirmation.html.twig', [
                            'GroupEvent'=>$groupevent,
                        ]);
                    } else {
                        #problem sending email to patient
                        return $this->render('frontend/registrationfailexternal.html.twig');
                    }
            
                } else {

                    #problem sending email to WB
                    return $this->render('frontend/registrationfailinternal.html.twig');

                }
                





            } else {
                return $this->render('frontend/register.html.twig', [
                    "Form"=>$form->createView(),
                    'GroupEvent'=>$groupevent,
                ]);
            }
        } 
        return $this->render('frontend/register.html.twig', [
            "Form"=>$form->createView(),
            'GroupEvent'=>$groupevent,
        ]);
    }
  
}
