<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie', methods: ['GET','HEAD'])]
    public function index(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findAll();

        dd($movies);

//        return  $this->render('index.html.twig',array(
//            'cars'=>$cars
//        ));
    }
}
