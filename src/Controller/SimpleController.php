<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SimpleController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/test", name="app_test")
     */
    public function test(): Response
    {
        return new Response('<h1>🎸 MetalVault fonctionne !</h1><p>Votre site est opérationnel !</p>');
    }
}
