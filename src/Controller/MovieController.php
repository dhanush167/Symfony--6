<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieFormType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    #[Route('/movies/create', name: 'movie.create', methods: ['GET','HEAD'])]
    public function create(): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class,$movie);
        return $this->render('movie/create.html.twig',['form'=>$form->createView()]);
    }


    #[Route('/movies', name: 'movie.index', methods: ['GET','HEAD'])]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findAll();

        return $this->render('movie/index.html.twig',['movies'=>$movies]);

    }

    #[Route('/movies/{id}', name: 'movie.show', methods: ['GET','HEAD'])]
    public function show($id): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->find($id);

        //dd($movie);

        return $this->render('movie/show.html.twig',['movie'=>$movie]);

    }




}
