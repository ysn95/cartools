<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Inventario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Inventario controller.
 *
 * @Route("inventario")
 */
class InventarioController extends Controller
{
    /**
     * Lists all inventario entities.
     *
     * @Route("/", name="inventario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inventarios = $em->getRepository('AppBundle:Inventario')->findAll();

        return $this->render('inventario/index.html.twig', array(
            'inventarios' => $inventarios,
        ));
    }

    /**
     * Creates a new inventario entity.
     *
     * @Route("/new", name="inventario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $inventario = new Inventario();
        $form = $this->createForm('AppBundle\Form\InventarioType', $inventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventario);
            $em->flush();

            return $this->redirectToRoute('inventario_show', array('id' => $inventario->getId()));
        }

        return $this->render('inventario/new.html.twig', array(
            'inventario' => $inventario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inventario entity.
     *
     * @Route("/{id}", name="inventario_show")
     * @Method("GET")
     */
    public function showAction(Inventario $inventario)
    {
        $deleteForm = $this->createDeleteForm($inventario);

        return $this->render('inventario/show.html.twig', array(
            'inventario' => $inventario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inventario entity.
     *
     * @Route("/{id}/edit", name="inventario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Inventario $inventario)
    {
        $deleteForm = $this->createDeleteForm($inventario);
        $editForm = $this->createForm('AppBundle\Form\InventarioType', $inventario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventario_edit', array('id' => $inventario->getId()));
        }

        return $this->render('inventario/edit.html.twig', array(
            'inventario' => $inventario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inventario entity.
     *
     * @Route("/{id}", name="inventario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Inventario $inventario)
    {
        $form = $this->createDeleteForm($inventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inventario);
            $em->flush();
        }

        return $this->redirectToRoute('inventario_index');
    }

    /**
     * Creates a form to delete a inventario entity.
     *
     * @param Inventario $inventario The inventario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inventario $inventario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inventario_delete', array('id' => $inventario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
