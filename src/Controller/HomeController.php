<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        // --- Page D'accueil ---
        return $this->render('home/index.html.twig', [
            'page_title' => 'accueil',
        ]);
    }
}
//--- /home défini la route page d'accueil ---
//--- rend le template 'home/index.title.html.twig' ---
//--- envoie une variable 'page_title' à twig ---