<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comprar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Comprar controller.
 *
 * @Route("comprar")
 */
class ComprarController extends Controller
{
    /**
     * Lists all comprar entities.
     *
     * @Route("/", name="comprar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comprars = $em->getRepository('AppBundle:Comprar')->findAll();

        return $this->render('comprar/index.html.twig', array(
            'comprars' => $comprars,
        ));
    }

    /**
     * Creates a new comprar entity.
     *
     * @Route("/new", name="comprar_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comprar = new Comprar();
        $form = $this->createForm('AppBundle\Form\ComprarType', $comprar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprar);
            $em->flush();

            return $this->redirectToRoute('comprar_show', array('id' => $comprar->getId()));
        }

        return $this->render('comprar/new.html.twig', array(
            'comprar' => $comprar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comprar entity.
     *
     * @Route("/{id}", name="comprar_show")
     * @Method("GET")
     */
    public function showAction(Comprar $comprar)
    {
        $deleteForm = $this->createDeleteForm($comprar);

        return $this->render('comprar/show.html.twig', array(
            'comprar' => $comprar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comprar entity.
     *
     * @Route("/{id}/edit", name="comprar_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comprar $comprar)
    {
        $deleteForm = $this->createDeleteForm($comprar);
        $editForm = $this->createForm('AppBundle\Form\ComprarType', $comprar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comprar_edit', array('id' => $comprar->getId()));
        }

        return $this->render('comprar/edit.html.twig', array(
            'comprar' => $comprar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comprar entity.
     *
     * @Route("/{id}", name="comprar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comprar $comprar)
    {
        $form = $this->createDeleteForm($comprar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comprar);
            $em->flush();
        }

        return $this->redirectToRoute('comprar_index');
    }

    /**
     * Creates a form to delete a comprar entity.
     *
     * @param Comprar $comprar The comprar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comprar $comprar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprar_delete', array('id' => $comprar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
