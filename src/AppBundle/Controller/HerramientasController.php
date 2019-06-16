<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Herramientas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Alquiler;

/**
 * Herramienta controller.
 *
 * @Route("herramientas")
 */
class HerramientasController extends Controller {

    /**
     * Lists all herramienta entities.
     *
     * @Route("/", name="herramientas_index")
     * @Method("GET")
     */
    public function indexAction() {
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
    public function newAction(Request $request) {
        $herramienta = new Herramientas();
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
    public function showAction(Request $request, Herramientas $herramienta) {


        $deleteForm = $this->createDeleteForm($herramienta);

        $alquiler = new Alquiler();

        $usuario = $this->getUser();

        $form = $this->createForm('AppBundle\Form\Comentarios1Type', $alquiler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $alquiler->setIdUsuario($usuario);
            $alquiler->setIdHerramientas($herramienta);


            $em->persist($alquiler);


            $em->flush();
        }



        $em = $this->getDoctrine()->getManager();

        $dql_comentarios = $em->createQuery("SELECT a FROM AppBundle:Alquiler a WHERE a.idHerramientas = :idherramienta AND a.comentarios != 'Me gusta' ")->setParameter('idherramienta', $herramienta);

        $comentarios = $dql_comentarios->getResult();


        $dql_like = $em->createQuery('SELECT COUNT(a) FROM AppBundle:Alquiler a WHERE a.megusta = 1 AND a.idHerramientas = :idherramienta AND a.idUsuario = :idusuario')->setParameter('idherramienta', $herramienta)->setParameter('idusuario', $usuario);

        $like = $dql_like->getResult();



        $megusta = new Alquiler();

        $form_like = $this->createForm('AppBundle\Form\Like1Type', $megusta);
        $form_like->handleRequest($request);

        $opinion = "Me gusta";

        $result_like = $like[0][1];


        if ($form_like->isSubmitted() && $form_like->isValid() && $result_like == 0) {

            $em = $this->getDoctrine()->getManager();

            $megusta->setMegusta(1);
            $megusta->setComentarios($opinion);
            $megusta->setIdUsuario($usuario);
            $megusta->setIdHerramientas($herramienta);


            $em->persist($megusta);
            $em->flush();
        }

        if ($form_like->isSubmitted() && $form_like->isValid() && $result_like >= 1) {

            $em = $this->getDoctrine()->getManager();

            $dql_nolike = $em->createQuery("UPDATE AppBundle:Alquiler a SET a.megusta = 0 WHERE a.megusta = 1 AND a.idHerramientas = :idherramienta AND a.idUsuario = :idusuario")->setParameter('idherramienta', $herramienta)->setParameter('idusuario', $usuario);

            $resultado = $dql_nolike->execute();
        }

        $comentarios_totales = $em->createQuery('SELECT COUNT(a) FROM AppBundle:Alquiler a WHERE a.megusta = 1 AND a.idHerramientas = :idherramienta ')
                ->setParameter('idherramienta', $herramienta);
        $resultado_comentarios_totales = $comentarios_totales->getResult();


        return $this->render('herramientas/show.html.twig', array(
                    'likes' => $resultado_comentarios_totales,
                    'datos' => $comentarios,
                    'herramienta' => $herramienta,
                    'delete_form' => $deleteForm->createView(),
                    'form' => $form->createView(),
                    'form_like' => $form_like->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing herramienta entity.
     *
     * @Route("/{id}/edit", name="herramientas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Herramientas $herramienta) {
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
    public function deleteAction(Request $request, Herramientas $herramienta) {
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
    private function createDeleteForm(Herramientas $herramienta) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('herramientas_delete', array('id' => $herramienta->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
