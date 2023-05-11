<?php

namespace MyApp\homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@home/Default/index.html.twig');
    }
}
