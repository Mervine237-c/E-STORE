<?php

namespace MyApp\EstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModeleController  extends Controller
{

    public function indexAction(){

        $em = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('MyAppEstoreBundle:Modele')->findAll();

        return $this->render('@MyAppEstore/Modele/index.html.twig', array('modeles'=>$modeles));
    }

}