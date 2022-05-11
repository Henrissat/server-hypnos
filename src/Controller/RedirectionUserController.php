<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectionUserController extends AbstractController
{
    /**
     * Page redirection des utilsateurs apres inscription
     */
    #[Route('/hypnos', name: 'app_hypnos')]
    public function index(): Response
    {
        //redirection vers le site Hypnos
        return $this->redirect('https://hypnos.netlify.app/');
    }
}
