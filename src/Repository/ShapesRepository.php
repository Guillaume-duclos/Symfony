<?php

namespace App\Repository;

use App\Entity\Shapes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Shapes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shapes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shapes[]    findAll()
 * @method Shapes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShapesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Shapes::class);
    }

//    /**
//     * @return Shapes[] Returns an array of Shapes objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shapes
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
