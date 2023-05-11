<?php

namespace MyApp\EstoreBundle\Controller;

use MyApp\EstoreBundle\Entity\Achat;
use MyApp\EstoreBundle\Entity\Panier;
use MyApp\EstoreBundle\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Voiture controller.
 *
 */
class VoitureController extends Controller
{
    /**
     * Lists all voiture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $voitures = $em->getRepository('MyAppEstoreBundle:Voiture')->findAll();

        return $this->render('voiture/index.html.twig', array(
            'voitures' => $voitures,
        ));
    }

    /**
     * Creates a new voiture entity.
     *
     */
    public function newAction(Request $request)
    {
        $voiture = new Voiture();
        $form = $this->createForm('MyApp\EstoreBundle\Form\VoitureType', $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('voiture_show', array('id' => $voiture->getId()));
        }

        return $this->render('voiture/new.html.twig', array(
            'voiture' => $voiture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a voiture entity.
     *
     */
    public function showAction(Voiture $voiture)
    {
        $deleteForm = $this->createDeleteForm($voiture);

        if(isset($_POST['panier_ajout'])){
            $user= $this->getUser()->getUsername();
            $em = $this->getDoctrine()->getManager();
            $achat = new  Achat();
            $panier = new  Panier();
            $find_banque_user = $em->getRepository('MyAppEstoreBundle:Banque')->findBanqueByUserName($user);

            var_dump($find_banque_user);
            $achat->setIdVoiture($voiture);

            $achat->setIdBanque($find_banque_user[0]);

            $panier->setIdAchat($achat);

            $em->persist($achat);
            $em->persist($panier);
            $em->flush();

            return $this->redirectToRoute('voiture_index');





        }

        return $this->render('voiture/show.html.twig', array(
            'voiture' => $voiture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing voiture entity.
     *
     */
    public function editAction(Request $request, Voiture $voiture)
    {
        $deleteForm = $this->createDeleteForm($voiture);
        $editForm = $this->createForm('MyApp\EstoreBundle\Form\VoitureType', $voiture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voiture_edit', array('id' => $voiture->getId()));
        }

        return $this->render('voiture/edit.html.twig', array(
            'voiture' => $voiture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a voiture entity.
     *
     */
    public function deleteAction(Request $request, Voiture $voiture)
    {
        $form = $this->createDeleteForm($voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($voiture);
            $em->flush();
        }

        return $this->redirectToRoute('voiture_index');
    }

    /**
     * Creates a form to delete a voiture entity.
     *
     * @param Voiture $voiture The voiture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voiture $voiture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voiture_delete', array('id' => $voiture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
