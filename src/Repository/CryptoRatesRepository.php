<?php

namespace App\Repository;

use App\Entity\CryptoRates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CryptoRates>
 *
 * @method CryptoRates|null find($id, $lockMode = null, $lockVersion = null)
 * @method CryptoRates|null findOneBy(array $criteria, array $orderBy = null)
 * @method CryptoRates[]    findAll()
 * @method CryptoRates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CryptoRatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CryptoRates::class);
    }

//    /**
//     * @return CryptoRates[] Returns an array of CryptoRates objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CryptoRates
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
