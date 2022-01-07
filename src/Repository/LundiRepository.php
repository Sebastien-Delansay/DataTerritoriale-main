<?php

namespace App\Repository;

use App\Entity\Lundi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lundi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lundi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lundi[]    findAll()
 * @method Lundi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LundiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lundi::class);
    }

    // /**
    //  * @return Lundi[] Returns an array of Lundi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lundi
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
