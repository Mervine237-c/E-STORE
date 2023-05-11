<?php

namespace MyApp\EstoreBundle\Controller;

use MyApp\EstoreBundle\Entity\Banque;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Banque controller.
 *
 */
class BanqueController extends Controller
{
    /**
     * Lists all banque entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banques = $em->getRepository('MyAppEstoreBundle:Banque')->findAll();

        return $this->render('banque/index.html.twig', array(
            'banques' => $banques,
        ));
    }

    /**
     * Creates a new banque entity.
     *
     */
    public function newAction(Request $request)
    {
        $banque = new Banque();
        $form = $this->createForm('MyApp\EstoreBundle\Form\BanqueType', $banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banque);
            $em->flush();

            return $this->redirectToRoute('banque_show', array('id' => $banque->getId()));
        }

        return $this->render('banque/new.html.twig', array(
            'banque' => $banque,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a banque entity.
     *
     */
    public function showAction(Banque $banque)
    {
        $deleteForm = $this->createDeleteForm($banque);

        return $this->render('banque/show.html.twig', array(
            'banque' => $banque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing banque entity.
     *
     */
    public function editAction(Request $request, Banque $banque)
    {
        $deleteForm = $this->createDeleteForm($banque);
        $editForm = $this->createForm('MyApp\EstoreBundle\Form\BanqueType', $banque);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('banque_edit', array('id' => $banque->getId()));
        }

        return $this->render('banque/edit.html.twig', array(
            'banque' => $banque,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a banque entity.
     *
     */
    public function deleteAction(Request $request, Banque $banque)
    {
        $form = $this->createDeleteForm($banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banque);
            $em->flush();
        }

        return $this->redirectToRoute('banque_index');
    }

    /**
     * Creates a form to delete a banque entity.
     *
     * @param Banque $banque The banque entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Banque $banque)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('banque_delete', array('id' => $banque->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
