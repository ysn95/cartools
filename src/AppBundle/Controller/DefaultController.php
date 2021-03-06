<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Comprar;
use AppBundle\Entity\Recambios;
use Knp\Bundle\PaginatorBundle;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    public function recambiosAction(Request $request) {


        $em = $this->getDoctrine()->getManager();

        $nombre = $request->get('nombre');

        $id = $request->get('id');

        if ($nombre == null) {
            $datos = $em->getRepository('AppBundle:Recambios')->findAll();
        } else {

            $query = $em->createQuery('SELECT r FROM AppBundle:Recambios r WHERE r.nombre LIKE :nombre')
                    ->setParameter('nombre', '%' . $nombre . '%');
            $datos = $query->getResult();
        }



        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $datos, $request->query->getInt('page', 1), 2
        );


        return $this->render('recambios/recambios.html.twig', array(
                    'datos' => $pagination,
        ));
    }

    public function alquilerAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $nombre = $request->get('nombre');

        if ($nombre == null) {
            $datos = $em->getRepository('AppBundle:Herramientas')->findAll();
        } else {
            $query = $em->createQuery('SELECT h FROM AppBundle:Herramientas h WHERE h.nombre LIKE :nombre')
                    ->setParameter('nombre', '%' . $nombre . '%');
            $datos = $query->getResult();
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $datos, $request->query->getInt('page', 1), 2
        );


        return $this->render('alquiler/alquiler.html.twig', array(
                    'datos' => $pagination,
        ));
    }

    public function informacionrecambiosAction() {
        $em = $this->getDoctrine()->getManager();

        $recambios = $em->getRepository('AppBundle:Recambios')->findAll();

        return $this->render('informacion.html.twig', array(
                    'informacion' => $recambios,
        ));
    }

    public function contactorecambiosAction() {
        $em = $this->getDoctrine()->getManager();

        $recambios = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('contacto.html.twig', array(
                    'contacto' => $recambios,
        ));
    }

    public function usuarioAction() {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('administracion.html.twig', array(
                    'users' => $users,
        ));
    }

 

}
