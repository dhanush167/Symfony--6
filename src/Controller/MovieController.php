<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie', methods: ['GET','HEAD'])]
    public function index(EntityManagerInterface $em): Response
    {
        $movies = $em->getRepository(Movie::class)->findAll();

        dd($movies);

//        return  $this->render('index.html.twig',array(
//            'cars'=>$cars
//        ));
    }
}
