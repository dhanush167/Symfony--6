<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Movie $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Movie $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    public function selectOnlyTitle()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')->getQuery()->getResult();
    }

    public function selectOnlyTitleId7()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')->where('m.id=7')->getQuery()->getResult();
    }


    public function selectOnlyLimitData()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')->setMaxResults('2')->setFirstResult(3)->getQuery()->getResult();
    }

    public function selectOnlyLimitDataRandom()
    {
        $randomId = rand(1, 5);

        $qb = $this->createQueryBuilder('m');

        return $qb->select('m.title')
        ->setMaxResults(3)
        ->setFirstResult($randomId)
        ->getQuery()
        ->getResult();

    }


      
    public function passParameterOrVariable()
    {

        $randomId = rand(7, 9);

        $qb = $this->createQueryBuilder('m');

        return $qb->select('m.title')
        ->where('m.id=:val')
        ->setParameter('val', $randomId)
        ->getQuery()
        ->getResult();
       

    }




     //return $this->getEntityManager()
     //->createQuery('...')
     //->setMaxResults(5)
     //->setFirstResult(10)
     //->getResult();



    // /**
    //  * @return Movie[] Returns an array of Movie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Movie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
