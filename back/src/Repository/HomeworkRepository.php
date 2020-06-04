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

    public function getOneHomework($id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
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
            ->leftJoin('h.subject', 'sub')
        ;

        return $qb->getQuery()->getResult();
    }

    public function getHomeworkByClassroom($id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.classroom = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getHomeworkBySubject($id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.subject = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getHomeworkByClassroomAndSubject($class_id, $sub_id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.classroom = :class_id')
            ->andWhere('h.subject = :sub_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('sub_id', $sub_id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getHomeworkByUser($id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.user = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getHomeworkByClassroomAndUser($class_id, $user_id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.classroom = :class_id')
            ->andWhere('h.user = :user_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getHomeworkBySubjectAndUser($sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
            ->where('h.subject = :sub_id')
            ->andWhere('h.user = :user_id')
            ->setParameter('sub_id', $sub_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getHomeworkByClassAndSubjectAndUser($class_id, $sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('h');

        $qb
            ->addSelect('c, s, g, u, sub')
            ->leftJoin('h.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('h.grade', 'g')
            ->leftJoin('h.user', 'u')
            ->leftJoin('h.subject', 'sub')
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
