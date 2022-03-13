<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
        $actor = new Actor();
        $actor->setName('John Deo');
        $manager->persist($actor);

        $actor_1 = new Actor();
        $actor_1->setName('Steve Jobs');
        $manager->persist($actor_1);

        $actor_2 = new Actor();
        $actor_2->setName('Robert Bale');
        $manager->persist($actor_2);

        $manager->flush();

        $this->addReference('actor_first',$actor);
        $this->addReference('actor_second',$actor_1);
        $this->addReference('actor_third',$actor_2);

    }
}
