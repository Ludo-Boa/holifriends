<?php

namespace SiteBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use SiteBundle\Form\VoyageType;
use SiteBundle\SiteBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SiteBundle\Entity\Voyage;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use FOS\RestBundle\View\View;

/**
 * Voyage controller.
 *
 */
class VoyageController extends Controller
{
    /**
     * Lists all Voyage entities.
     *
     */
    public function getVoyagesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $voyages = $em->getRepository('SiteBundle:Voyage')->findAll();

        return array('voyages' => $voyages);
    }

    public function getVoyageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $voyage = $em->getRepository('SiteBundle:Voyage')->find($id);

        return array('voyage' => $voyage);
    }

    /**
     * Creates a new Voyage entity.
     * @Rest\View
     */
    public function newAction(Request $request)
    {
        $voyage = new Voyage();
        $form = $this->createForm('SiteBundle\Form\VoyageType', $voyage);
        $jsonData = json_decode($request->getContent(), true); //true to get an associative array
        $form->bind($jsonData);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            return array('voyage' => $voyage);
        }

        return View::create($form,400);
    }


    /**
     * Displays a form to edit an existing Voyage entity.
     *
     */
    public function editUserAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $voyage = $em->getRepository('SiteBundle:Voyage')->find($id);

        $editForm = $this->createForm('SiteBundle\Form\VoyageType', $voyage);

        $jsonData = json_decode($request->getContent(), true);

        $editForm->bind($jsonData);
        if ($voyage) {
            if ($editForm->isValid()) {


            $em->persist($voyage);
            $em->flush();

            return array('voyage' => $voyage);
        }else{
            return View::create($editForm, 400);
            }
        }else {
            throw $this->createNotFoundException('Voyage non trouve!');
        }

    }

    /**
     * Deletes a Voyage entity.
     *
     */
    public function deleteVoyageAction($id)
    {
        $em = $this ->getDoctrine()->getManager();
        $voyage = $em->getRepository('SiteBundle:Voyage')->find($id);

        $em->remove($voyage);
        $em->flush();
    }
}
