<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\GroupType;
use AppBundle\Form\GroupTypeForm;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ConfirmationForm;
use AppBundle\Form\VenueForm;
use AppBundle\Entity\Venue;
use AppBundle\Entity\GroupEvent;
use AppBundle\Form\GroupEventForm;


class backendController extends Controller


{
/** Group Type  */
    /**
     * @Route("/admin/grouptype/new", name="grouptype_new")
     */
    public function grouptype_new(Request $request)
    {
        $form = $this->createForm(GroupTypeForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('groupevent_new');

        }
        // replace this example code with whatever you need
        return $this->render('backend/grouptype/new.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

    /**
     * @Route("/admin/grouptype/edit/{grouptype}", name="grouptype_edit")
     */
    public function grouptype_edit(Request $request, GroupType $grouptype)
    {
        $form = $this->createForm(GroupTypeForm::class,$grouptype);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('grouptype_list');

        }
        // replace this example code with whatever you need
        return $this->render('backend/grouptype/edit.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }


    /**
     * @Route("/admin/grouptype/delete/{grouptype}", name="grouptype_delete")
     */
    public function grouptype_delete(Request $request, GroupType $grouptype)
    {
        $form = $this->createForm(ConfirmationForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if($data['confirmation'] == true){
                $em = $this->getDoctrine()->getManager();
                $em->remove($grouptype);
                $em->flush();
                return $this->redirectToRoute('grouptype_list');
            }
        }

        return $this->render('backend/grouptype/delete.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

    /**
     * @Route("/admin/grouptype/list", name="grouptype_list")
     */
    public function grouptype_list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $grouptyperepository = $em->getRepository('AppBundle\Entity\GroupType');
        $grouptype = $grouptyperepository->findAll();

        // replace this example code with whatever you need
        return $this->render('backend/grouptype/list.html.twig', [
            'grouptype' => $grouptype,
        ]);
    }

/** Group Event  */
    /**
     * @Route("/admin/groupevent/new", name="groupevent_new")
     */
    public function groupevent_new(Request $request)
    {
        $form = $this->createForm(GroupEventForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('groupevent_list');

        }
        // replace this example code with whatever you need
        return $this->render('backend/groupevent/new.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

    /**
     * @Route("/admin/groupevent/edit/{groupevent}", name="groupevent_edit")
     */
    public function groupevent_edit(Request $request, GroupEvent $groupevent)
    {
        $form = $this->createForm(GroupEventForm::class,$groupevent);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('groupevent_list');

        }
        // replace this example code with whatever you need
        return $this->render('backend/groupevent/edit.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }


    /**
     * @Route("/admin/groupevent/delete/{groupevent}", name="groupevent_delete")
     */
    public function groupevent_delete(Request $request, GroupEvent $groupevent)
    {
        $form = $this->createForm(ConfirmationForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if($data['confirmation'] == true){
                $em = $this->getDoctrine()->getManager();
                $em->remove($groupevent);
                $em->flush();
                return $this->redirectToRoute('groupevent_list');
            }
        }

        return $this->render('backend/groupevent/delete.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

    /**
     * @Route("/admin/groupevent/list", name="groupevent_list")
     */
    public function groupevent_list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $groupeventrepository = $em->getRepository('AppBundle\Entity\GroupEvent');
        $groupevent = $groupeventrepository->findAll();

        // replace this example code with whatever you need
        return $this->render('backend/groupevent/list.html.twig', [
            'groupevent' => $groupevent,
        ]);
    }
    
    
/** venue  */

    /**
     * @Route("/admin/venue/new", name="venue_new")
     */
    public function venue_new(Request $request)
    {
        $form = $this->createForm(VenueForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('groupevent_new');

        }
        // replace this example code with whatever you need
        return $this->render('backend/venue/new.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

/**
     * @Route("/admin/venue/edit/{venue}", name="venue_edit")
     */
    public function venue_edit(Request $request, Venue $venue)
    {
        $form = $this->createForm(VenueForm::class,$venue);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('venue_list');

        }
        // replace this example code with whatever you need
        return $this->render('backend/venue/edit.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

    /**
    * @Route("/admin/venue/delete/{venue}", name="venue_delete")
    */
    public function venue_delete(Request $request, Venue $venue)
    {
        $form = $this->createForm(ConfirmationForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if($data['confirmation'] == true){
                $em = $this->getDoctrine()->getManager();
                $em->remove($venue);
                $em->flush();
                return $this->redirectToRoute('venue_list');
            }
        }

        return $this->render('backend/venue/delete.html.twig', [
            "Form"=>$form->createView(),
        ]);
    }

/**
     * @Route("/admin/venue/list", name="venue_list")
     */
    public function venue_list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $venuerepository = $em->getRepository('AppBundle\Entity\Venue');
        $venue = $venuerepository->findAll();

        // replace this example code with whatever you need
        return $this->render('backend/venue/list.html.twig', [
            'venue' => $venue,
        ]);
    }

    

}