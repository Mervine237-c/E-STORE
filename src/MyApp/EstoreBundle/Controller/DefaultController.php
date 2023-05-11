<?php

namespace MyApp\EstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em= $this->getDoctrine()->getManager();
        $user = $em->getRepository('MyAppEstoreBundle:User')->findAll();
        $produits = $em->getRepository('MyAppEstoreBundle:Produit')->findAll();
        $commandes = $em->getRepository('MyAppEstoreBundle:Commande')->findAll();

        $nbr_users = count($user);
        $nbr_produits = count($produits);
        $nbr_cmd = count($commandes);


        return $this->render('@MyAppEstore/Default/index.html.twig',
            array('nbr_users'=>$nbr_users,'nbr_produits'=>$nbr_produits,'nbr_cmd'=>$nbr_cmd));
    }
}
