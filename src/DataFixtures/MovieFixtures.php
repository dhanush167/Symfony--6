<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is the description of the dark knight');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2020/07/06/17/51/batman-5377804_960_720.png');
        $manager->persist($movie);

        /*--------------------------*/

        $movie_2 = new Movie();
        $movie_2->setTitle('Spider Man');
        $movie_2->setReleaseYear(2022);
        $movie_2->setDescription('This is the description of the Spider Man');
        $movie_2->setImagePath('https://cdn.pixabay.com/photo/2013/07/12/17/46/villain-152400_960_720.png');
        $manager->persist($movie_2);

        $manager->flush();

    }
}
