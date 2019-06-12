<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recambios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Comprar;
use AppBundle\Entity\User;

/**
 * Recambio controller.
 *
 * @Route("recambios")
 */
class RecambiosController extends Controller {

    /**
     * Lists all recambio entities.
     *
     * @Route("/", name="recambios_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $recambios = $em->getRepository('AppBundle:Recambios')->findAll();

        return $this->render('recambios/index.html.twig', array(
                    'recambios' => $recambios,
        ));
    }

    /**
     * Creates a new recambio entity.
     *
     * @Route("/new", name="recambios_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {

        $recambio = new Recambios();
        $form = $this->createForm('AppBundle\Form\RecambiosType', $recambio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recambio);
            $em->flush();

            return $this->redirectToRoute('recambios_show', array('id' => $recambio->getId()));
        }

        return $this->render('recambios/new.html.twig', array(
                    'recambio' => $recambio,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recambio entity.
     *
     * @Route("/{id}", name="recambios_show")
     * @Method("GET")
     */
    public function showAction(Request $request, Recambios $recambio) {

        $deleteForm = $this->createDeleteForm($recambio);

        $comprar = new Comprar();

        $usuario = $this->getUser();

        $form = $this->createForm('AppBundle\Form\ComentariosType', $comprar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $comprar->setIdUsuario($usuario);
            $comprar->setIdRecambios($recambio);


            $em->persist($comprar);


            $em->flush();
        }



        $em = $this->getDoctrine()->getManager();

        $dql_comentarios = $em->createQuery("SELECT c FROM AppBundle:Comprar c WHERE c.idRecambios = :idrecambio AND c.comentarios != 'Me gusta' ")->setParameter('idrecambio', $recambio);

        $comentarios = $dql_comentarios->getResult();


        $dql_like = $em->createQuery('SELECT COUNT(c) FROM AppBundle:Comprar c WHERE c.megusta = 1 AND c.idRecambios = :idrecambio')->setParameter('idrecambio', $recambio);

        $like = $dql_like->getResult();



        $megusta = new Comprar();

        $form_like = $this->createForm('AppBundle\Form\LikeType', $megusta);
        $form_like->handleRequest($request);

        $opinion = "Me gusta";

        if ($form_like->isSubmitted() && $form_like->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $megusta->setMegusta(1);
            $megusta->setComentarios($opinion);
            $megusta->setIdUsuario($usuario);
            $megusta->setIdRecambios($recambio);


            $em->persist($megusta);
            $em->flush();
                
        }



        return $this->render('recambios/show.html.twig', array(
                    'likes' => $like,
                    'datos' => $comentarios,
                    'recambio' => $recambio,
                    'delete_form' => $deleteForm->createView(),
                    'form' => $form->createView(),
                    'form_like' => $form_like->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recambio entity.
     *
     * @Route("/{id}/edit", name="recambios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Recambios $recambio) {
        $deleteForm = $this->createDeleteForm($recambio);
        $editForm = $this->createForm('AppBundle\Form\RecambiosType', $recambio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recambios_edit', array('id' => $recambio->getId()));
        }

        return $this->render('recambios/edit.html.twig', array(
                    'recambio' => $recambio,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a recambio entity.
     *
     * @Route("/{id}", name="recambios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Recambios $recambio) {
        $form = $this->createDeleteForm($recambio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recambio);
            $em->flush();
        }

        return $this->redirectToRoute('recambios_index');
    }

    /**
     * Creates a form to delete a recambio entity.
     *
     * @param Recambios $recambio The recambio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Recambios $recambio) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('recambios_delete', array('id' => $recambio->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
