<?php

namespace App\Repository;

use App\Entity\Grade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grade[]    findAll()
 * @method Grade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grade::class);
    }

    public function getOneGrade($id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('g.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function getGrade()
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
        ;

        return $qb->getQuery()->getResult();
    }

    public function getGradeByClassroom($id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.classroom = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getGradeBySubject($id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.subject = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getGradeByClassroomAndSubject($class_id, $sub_id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.classroom = :class_id')
            ->andWhere('h.subject = :sub_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('sub_id', $sub_id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getGradeByUser($id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.user = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getGradeByClassroomAndUser($class_id, $user_id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.classroom = :class_id')
            ->andWhere('h.user = :user_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getGradeBySubjectAndUser($sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.subject = :sub_id')
            ->andWhere('h.user = :user_id')
            ->setParameter('sub_id', $sub_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getGradeByClassAndSubjectAndUser($class_id, $sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('g');

        $qb
            ->addSelect('h, u')
            ->leftJoin('g.homework', 'h')
            ->leftJoin('h.user', 'u')
            ->where('h.classroom = :class_id')
            ->andWhere('h.subject = :sub_id')
            ->andWhere('h.user = :user_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('sub_id', $sub_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }
}
