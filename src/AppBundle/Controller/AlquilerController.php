<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alquiler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Alquiler controller.
 *
 * @Route("alquiler")
 */
class AlquilerController extends Controller
{
    /**
     * Lists all alquiler entities.
     *
     * @Route("/", name="alquiler_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alquilers = $em->getRepository('AppBundle:Alquiler')->findAll();

        return $this->render('alquiler/index.html.twig', array(
            'alquilers' => $alquilers,
        ));
    }

    /**
     * Creates a new alquiler entity.
     *
     * @Route("/new", name="alquiler_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $alquiler = new Alquiler();
        $form = $this->createForm('AppBundle\Form\AlquilerType', $alquiler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alquiler);
            $em->flush();

            return $this->redirectToRoute('alquiler_show', array('id' => $alquiler->getId()));
        }

        return $this->render('alquiler/new.html.twig', array(
            'alquiler' => $alquiler,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a alquiler entity.
     *
     * @Route("/{id}", name="alquiler_show")
     * @Method("GET")
     */
    public function showAction(Alquiler $alquiler)
    {
        $deleteForm = $this->createDeleteForm($alquiler);

        return $this->render('alquiler/show.html.twig', array(
            'alquiler' => $alquiler,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing alquiler entity.
     *
     * @Route("/{id}/edit", name="alquiler_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Alquiler $alquiler)
    {
        $deleteForm = $this->createDeleteForm($alquiler);
        $editForm = $this->createForm('AppBundle\Form\AlquilerType', $alquiler);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alquiler_edit', array('id' => $alquiler->getId()));
        }

        return $this->render('alquiler/edit.html.twig', array(
            'alquiler' => $alquiler,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a alquiler entity.
     *
     * @Route("/{id}", name="alquiler_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Alquiler $alquiler)
    {
        $form = $this->createDeleteForm($alquiler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alquiler);
            $em->flush();
        }

        return $this->redirectToRoute('alquiler_index');
    }

    /**
     * Creates a form to delete a alquiler entity.
     *
     * @param Alquiler $alquiler The alquiler entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Alquiler $alquiler)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alquiler_delete', array('id' => $alquiler->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
