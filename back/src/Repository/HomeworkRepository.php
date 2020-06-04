<?php

namespace App\Repository;

use App\Entity\Homework;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Homework|null find($id, $lockMode = null, $lockVersion = null)
 * @method Homework|null findOneBy(array $criteria, array $orderBy = null)
 * @method Homework[]    findAll()
 * @method Homework[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Homework::class);
    }

    public function getHomework()
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('u.subjects', 'sub')
        ;

        return $qb->getQuery()->getResult();
    }
}
