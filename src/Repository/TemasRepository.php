<?php

namespace App\Repository;

use App\Entity\Temas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Temas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Temas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Temas[]    findAll()
 * @method Temas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Temas::class);
    }

    // /**
    //  * @return Temas[] Returns an array of Temas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Temas
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
