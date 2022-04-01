<?php

namespace App\Repository;

use App\Entity\GeneralConfiguration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GeneralConfiguration|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeneralConfiguration|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeneralConfiguration[]    findAll()
 * @method GeneralConfiguration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeneralConfigurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneralConfiguration::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(GeneralConfiguration $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(GeneralConfiguration $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findLast()
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.id', 'DESC')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return GeneralConfiguration[] Returns an array of GeneralConfiguration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeneralConfiguration
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
