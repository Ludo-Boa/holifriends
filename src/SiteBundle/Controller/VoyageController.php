<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SiteBundle\Entity\Voyage;
use SiteBundle\Form\VoyageType;

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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $voyages = $em->getRepository('SiteBundle:Voyage')->findAll();

        return $this->render('voyage/index.html.twig', array(
            'voyages' => $voyages,
        ));
    }

    /**
     * Creates a new Voyage entity.
     *
     */
    public function newAction(Request $request)
    {
        $voyage = new Voyage();
        $form = $this->createForm('SiteBundle\Form\VoyageType', $voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            return $this->redirectToRoute('voyage_show', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/new.html.twig', array(
            'voyage' => $voyage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Voyage entity.
     *
     */
    public function showAction(Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);

        return $this->render('voyage/show.html.twig', array(
            'voyage' => $voyage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Voyage entity.
     *
     */
    public function editAction(Request $request, Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);
        $editForm = $this->createForm('SiteBundle\Form\VoyageType', $voyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            return $this->redirectToRoute('voyage_edit', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/edit.html.twig', array(
            'voyage' => $voyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Voyage entity.
     *
     */
    public function deleteAction(Request $request, Voyage $voyage)
    {
        $form = $this->createDeleteForm($voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($voyage);
            $em->flush();
        }

        return $this->redirectToRoute('voyage_index');
    }

    /**
     * Creates a form to delete a Voyage entity.
     *
     * @param Voyage $voyage The Voyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voyage $voyage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $voyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
