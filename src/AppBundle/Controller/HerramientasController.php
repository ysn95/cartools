<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Herramientas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Herramienta controller.
 *
 * @Route("herramientas")
 */
class HerramientasController extends Controller
{
    /**
     * Lists all herramienta entities.
     *
     * @Route("/", name="herramientas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $herramientas = $em->getRepository('AppBundle:Herramientas')->findAll();

        return $this->render('herramientas/index.html.twig', array(
            'herramientas' => $herramientas,
        ));
    }

    /**
     * Creates a new herramienta entity.
     *
     * @Route("/new", name="herramientas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $herramienta = new Herramienta();
        $form = $this->createForm('AppBundle\Form\HerramientasType', $herramienta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($herramienta);
            $em->flush();

            return $this->redirectToRoute('herramientas_show', array('id' => $herramienta->getId()));
        }

        return $this->render('herramientas/new.html.twig', array(
            'herramienta' => $herramienta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a herramienta entity.
     *
     * @Route("/{id}", name="herramientas_show")
     * @Method("GET")
     */
    public function showAction(Herramientas $herramienta)
    {
        $deleteForm = $this->createDeleteForm($herramienta);

        return $this->render('herramientas/show.html.twig', array(
            'herramienta' => $herramienta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing herramienta entity.
     *
     * @Route("/{id}/edit", name="herramientas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Herramientas $herramienta)
    {
        $deleteForm = $this->createDeleteForm($herramienta);
        $editForm = $this->createForm('AppBundle\Form\HerramientasType', $herramienta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('herramientas_edit', array('id' => $herramienta->getId()));
        }

        return $this->render('herramientas/edit.html.twig', array(
            'herramienta' => $herramienta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a herramienta entity.
     *
     * @Route("/{id}", name="herramientas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Herramientas $herramienta)
    {
        $form = $this->createDeleteForm($herramienta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($herramienta);
            $em->flush();
        }

        return $this->redirectToRoute('herramientas_index');
    }

    /**
     * Creates a form to delete a herramienta entity.
     *
     * @param Herramientas $herramienta The herramienta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Herramientas $herramienta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('herramientas_delete', array('id' => $herramienta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
