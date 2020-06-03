<?php

namespace App\Repository;

use App\Entity\Ressource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ressource|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ressource|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ressource[]    findAll()
 * @method Ressource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RessourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ressource::class);
    }

    public function getRessources()
    {
        $qb = $this->createQueryBuilder('r');

        $qb
            ->addSelect('c, s, u, sub')
            ->leftJoin('r.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('r.user', 'u')
            ->leftJoin('u.subjects', 'sub')
        ;
        return $qb->getQuery()->getResult();
    }

    public function getRessourcesByClassroom($id)
    {
        $qb = $this->createQueryBuilder('r');

        $qb
            ->addSelect('c, s, u, sub')
            ->leftJoin('r.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('r.user', 'u')
            ->leftJoin('u.subjects', 'sub')
            ->where('c.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getRessource($id)
    {
        $qb = $this->createQueryBuilder('r');

        $qb
            ->addSelect('c, s, u, sub')
            ->leftJoin('r.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('r.user', 'u')
            ->leftJoin('u.subjects', 'sub')
            ->where('r.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
