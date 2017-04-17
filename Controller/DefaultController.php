<?php

namespace Wowapps\SlackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('WowappsSlackBundle:Default:index.html.twig');
    }
}
