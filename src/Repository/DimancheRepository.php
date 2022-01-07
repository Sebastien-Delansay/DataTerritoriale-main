<?php

namespace App\Repository;

use App\Entity\Dimanche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dimanche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dimanche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dimanche[]    findAll()
 * @method Dimanche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DimancheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dimanche::class);
    }

    // /**
    //  * @return Dimanche[] Returns an array of Dimanche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dimanche
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
