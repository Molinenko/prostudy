<?php

namespace App\Repository;

use App\Entity\Materia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Materia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materia[]    findAll()
 * @method Materia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MateriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Materia::class);
    }

    // /**
    //  * @return Materia[] Returns an array of Materia objects
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
    public function findOneBySomeField($value): ?Materia
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
