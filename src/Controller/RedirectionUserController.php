<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectionUserController extends AbstractController
{
    #[Route('/hypnos', name: 'app_hypnos')]
    
    public function index(): Response
    {
        return $this->redirect('https://hypnos-hotels.herokuapp.com/');
    }
}
