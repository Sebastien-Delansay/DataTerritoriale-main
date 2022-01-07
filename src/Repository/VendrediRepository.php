<?php

namespace App\Repository;

use App\Entity\Vendredi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vendredi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vendredi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vendredi[]    findAll()
 * @method Vendredi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendrediRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vendredi::class);
    }

    // /**
    //  * @return Vendredi[] Returns an array of Vendredi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vendredi
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
