<?php

namespace App\Repository;

use App\Entity\Jeudi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jeudi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jeudi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jeudi[]    findAll()
 * @method Jeudi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeudiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jeudi::class);
    }

    // /**
    //  * @return Jeudi[] Returns an array of Jeudi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jeudi
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
