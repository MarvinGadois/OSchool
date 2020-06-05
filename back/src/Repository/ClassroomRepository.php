<?php

namespace App\Repository;

use App\Entity\Classroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Classroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classroom[]    findAll()
 * @method Classroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classroom::class);
    }

    public function getOneClassroom($id)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('s, sh, u')
            ->leftJoin('c.school', 's')
            ->leftJoin('c.school', 'sh')
            ->leftJoin('c.users', 'u')
            ->where('c.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function getClassroom()
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('s, sh, u')
            ->leftJoin('c.school', 's')
            ->leftJoin('c.school', 'sh')
            ->leftJoin('c.users', 'u')
        ;

        return $qb->getQuery()->getResult();
    }

    public function getClassroomBySchool($id)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('s, sh, u')
            ->leftJoin('c.school', 's')
            ->leftJoin('c.school', 'sh')
            ->leftJoin('c.users', 'u')
            ->where('c.school = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

}
