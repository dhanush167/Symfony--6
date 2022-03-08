<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie/{id}', name: 'app_movie', methods: ['GET','HEAD'])]
    public function index($id): Response
    {
        return  new Response($id);
    }
}
