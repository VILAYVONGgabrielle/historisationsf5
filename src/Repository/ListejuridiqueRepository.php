<?php

namespace App\Repository;

use App\Entity\Listejuridique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Listejuridique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Listejuridique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Listejuridique[]    findAll()
 * @method Listejuridique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListejuridiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listejuridique::class);
    }

    // /**
    //  * @return Listejuridique[] Returns an array of Listejuridique objects
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
    public function findOneBySomeField($value): ?Listejuridique
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
