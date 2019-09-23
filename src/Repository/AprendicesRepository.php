<?php

namespace App\Repository;

use App\Entity\Aprendices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aprendices|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aprendices|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aprendices[]    findAll()
 * @method Aprendices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AprendicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aprendices::class);
    }

    // /**
    //  * @return Aprendices[] Returns an array of Aprendices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aprendices
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
