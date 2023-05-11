<?php

namespace Esprit\userBundle\Controller;

use MyApp\EstoreBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $user= $this->getUser();



        $commande = new Commande();
        $form = $this->createForm('MyApp\EstoreBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(!is_object($user)){
                return $this->redirectToRoute('fos_user_security_login');
            }
//            $user_id= $this->getUser()->getId();
//            $myuser = $this->getDoctrine()->getManager();
            $commande->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('esprituser_homepage');
        }


        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('MyAppEstoreBundle:Produit')->findAll();

        return $this->render('produit_client/index2.html.twig', array(
            'produits' => $produits,
            'commande' => $commande,
            'form' => $form->createView(),
        ));
      //  return $this->render('produit_client/index.html.twig');
    }
}
