<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Go1Controller extends AbstractController
{
    /**
     * @Route("/go1", name="app_go1")
     */
    public function index(): Response
    {
        return $this->render('go1/index.html.twig',);
    }
}
