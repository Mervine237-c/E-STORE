<?php

namespace MyApp\EstoreBundle\Controller;

use MyApp\EstoreBundle\Entity\souscategorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Souscategorie controller.
 *
 */
class souscategorieController extends Controller
{
    /**
     * Lists all souscategorie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $souscategories = $em->getRepository('MyAppEstoreBundle:souscategorie')->findAll();

        return $this->render('souscategorie/index.html.twig', array(
            'souscategories' => $souscategories,
        ));
    }

    /**
     * Creates a new souscategorie entity.
     *
     */
    public function newAction(Request $request)
    {
        $souscategorie = new Souscategorie();
        $form = $this->createForm('MyApp\EstoreBundle\Form\souscategorieType', $souscategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($souscategorie);
            $em->flush();

            return $this->redirectToRoute('souscategorie_show', array('id' => $souscategorie->getId()));
        }

        return $this->render('souscategorie/new.html.twig', array(
            'souscategorie' => $souscategorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a souscategorie entity.
     *
     */
    public function showAction(souscategorie $souscategorie)
    {
        $deleteForm = $this->createDeleteForm($souscategorie);

        return $this->render('souscategorie/show.html.twig', array(
            'souscategorie' => $souscategorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing souscategorie entity.
     *
     */
    public function editAction(Request $request, souscategorie $souscategorie)
    {
        $deleteForm = $this->createDeleteForm($souscategorie);
        $editForm = $this->createForm('MyApp\EstoreBundle\Form\souscategorieType', $souscategorie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('souscategorie_edit', array('id' => $souscategorie->getId()));
        }

        return $this->render('souscategorie/edit.html.twig', array(
            'souscategorie' => $souscategorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a souscategorie entity.
     *
     */
    public function deleteAction(Request $request, souscategorie $souscategorie)
    {
        $form = $this->createDeleteForm($souscategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($souscategorie);
            $em->flush();
        }

        return $this->redirectToRoute('souscategorie_index');
    }

    /**
     * Creates a form to delete a souscategorie entity.
     *
     * @param souscategorie $souscategorie The souscategorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(souscategorie $souscategorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('souscategorie_delete', array('id' => $souscategorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
