<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;




/**
 * Description of SecurityController
 *
 * @author ysn95
 */
    class LoginController extends Controller
{
        
    /**
    * 
    *  @Route("/login",name="login")
    */
        
        
    public function logAction(Request $request)
    {
        $authenticationUtils = $this -> get('security.authentication_utils');

        $lastUsername = $authenticationUtils->getLastUsername();
        
        $error = $authenticationUtils->getLastAuthenticationError();
        
        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,

        ]);
    }
    
    

        
   
        
}