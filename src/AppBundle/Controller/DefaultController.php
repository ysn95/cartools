<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    public function recambiosAction() {
        $em = $this->getDoctrine()->getManager();

        $recambios = $em->getRepository('AppBundle:Recambios')->findAll();

        return $this->render('recambios/recambios.html.twig', array(
                    'datos' => $recambios,
        ));
    }

    public function informacionrecambiosAction() {
        $em = $this->getDoctrine()->getManager();

        $recambios = $em->getRepository('AppBundle:Recambios')->findAll();

        return $this->render('informacion.html.twig', array(
                    'informacion' => $recambios,
        ));
    }

}
