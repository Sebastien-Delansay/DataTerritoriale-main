<?php

namespace App\Repository;

use App\Entity\Mardi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mardi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mardi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mardi[]    findAll()
 * @method Mardi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MardiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mardi::class);
    }

    // /**
    //  * @return Mardi[] Returns an array of Mardi objects
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
    public function findOneBySomeField($value): ?Mardi
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
