<?php

namespace MyApp\EstoreBundle\Controller;


use Medicale\WithingsBundle\Entity\Fiche;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /* public function indexAction($name)
     {
         return $this->render('', array('name' => $name));
     }

    */

//    /**
//     * @Route("/membre")
//     */
//    public function redirectAction( Request $request){
//
//        //  $user = $this->getUser()->
//
//        // verifie si le user connecté à un role particulier
//        $authCheker = $this->container->get('security.authorization_checker');
//        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN') && (!$this->get('security.authorization_checker')->isGranted('ROLE_USER'))
//            && (!$this->get('security.authorization_checker')->isGranted('ROLE_LIVREUR')) && (!$this->get('security.authorization_checker')->isGranted('ROLE_CLIENT'))
//            ) {
//            // throw $this->createAccessDeniedException('GET OUT!');
//            return $this->redirectToRoute('home_homepage');
//        }
//        if($authCheker->isGranted('ROLE_CLIENT')){
//
//            return $this->redirectToRoute('medecin_homepage');
//        }
//
//        elseif($authCheker->isGranted('ROLE_ADMIN')){
////            return $this->render('@Member/Security/admin_home.html.twig');
//            return $this->redirectToRoute('admin');
//        }elseif($authCheker->isGranted('ROLE_USER')){
//            $my_fiche = $this->getDoctrine()->getManager()->getRepository('WithingsBundle:Fiche')->findUserFiche($this->getUser()->getId());
//
//
//
////            return $this->render('@Member/Default/index.html.twig',array('fiche'=>$my_fiche[0]));
////             return $this->redirect('http://localhost:4200/login');
//
//            return $this->redirectToRoute('patient_homepage');
//        }
//        else {
//            return $this->render('@FOSUser/Security/login.html.twig');
//        }
//
//    }
//
//    public function changeLocaleAction(Request $request){
//        $locales = $request->getLocale();
//        $form  = $this->createFormBuilder(null)->add('locale',ChoiceType::class,['choices'=>['Français'=>'fr',
//            'English'=>'en']])->add('save',SubmitType::class)->getForm();
//
//        $form->handleRequest($request);
//        if($form->isSubmitted()){
//            // dump($form->getData();
//            $locale = $form->getData()['locale'];
//            $em = $this->getDoctrine()->getManager();
//            $user = $this->getUser();
//            $user->setLocale($locale);
//            $em->persist($user);
//            $em->flush();
//        }
//    }
}
