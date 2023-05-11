<?php

namespace MyApp\EstoreBundle\Controller;

use MyApp\EstoreBundle\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Voiture2Controller extends Controller
{
   public function PageAccueilAction(Request $req){
       $nom =$req->get('Nom');
       $Matricule=$req->get('Matricule');
       if(isset($_POST['Enregistrer'])){

           $voiture= new Voiture();
           $ent=$this->getDoctrine()->getManager();
           $voiture->setNom($nom);
           $voiture->setMatricule($Matricule);
           $ent->persist($voiture);
           $ent->flush();
           return $this->redirectToRoute('my_app_estore_homepage');
       }

  return $this->render('@MyAppEstore/Voiture/index.html.twig');

   }
    Public function AffichageAction(Request $req){
       $en = $this->getDoctrine()->getManager();
       $voitures =$en->getRepository('MyAppEstoreBundle:Voiture')->findAll();
      return $this->render('@MyAppEstore/Voiture/Afficher.html.twig', array('voitures'=>$voitures));

    }

    public function ModificationAction ($id , Request $req)
    {
        $en = $this->getDoctrine()->getManager();
        $voiture = $en->getRepository('MyAppEstoreBundle:Voiture')->find($id);
        $nom= $req->get('Nom');
        $matricule= $req->get('Matricule');
        if (isset($_POST["Modifier"])){


            $voiture->setNom($nom);
            $voiture->setMatricule($matricule);
            $en->flush();
            return $this->redirectToRoute('mod_homepage', array('id' => $voiture->getId()));

        }
        return $this->render('@MyAppEstore/Voiture/mod.html.twig', array('voiture'=>$voiture));

    }
    public function SupprimerAction($id , Request $req){
        $en = $this->getDoctrine()->getManager();
        $voitures = $en->getRepository('MyAppEstoreBundle:Voiture')->find($id);
        $en->remove($voitures);
        $en->flush();
        return$this->redirectToRoute('Afficher_homepage');
    }

    public function  ajoutWithFormBuilderAction(Request $request){
        $voiture = new Voiture();
        $form = $this->createForm('MyApp\EstoreBundle\Form\Voiture2Type', $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('voiture_show', array('id' => $voiture->getId()));
        }

        return $this->render('@MyAppEstore/Voiture/ajout2.html.twig', array(
            'voiture' => $voiture,
            'mervine_form' => $form->createView(),
        ));
    }
}