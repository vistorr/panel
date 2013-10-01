<?php

namespace Panel\CtrlwBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/index.html", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'mundo');
    }
}
