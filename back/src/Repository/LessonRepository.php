<?php

namespace App\Repository;

use App\Entity\Lesson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lesson[]    findAll()
 * @method Lesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lesson::class);
    }

    public function getLessons()
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
        ;
        return $qb->getQuery()->getResult();
    }

    public function getLessonsByClassroom($id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('c.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsBySubject($id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('sub.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsByUser($id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('u.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsBySubjectAndUser($sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('l.subject = :sub_id')
            ->andWhere('l.user = :user_id')
            ->setParameter('sub_id', $sub_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsByClassroomAndUser($class_id, $user_id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('l.classroom = :class_id')
            ->andWhere('l.user = :user_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsByClassroomAndSubject($class_id, $sub_id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('l.classroom = :class_id')
            ->andWhere('l.subject = :sub_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('sub_id', $sub_id)
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLessonsByClassroomAndSubjectAndUser($class_id, $sub_id, $user_id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('l.classroom = :class_id')
            ->andWhere('l.subject = :sub_id')
            ->andWhere('l.user = :user_id')
            ->setParameter('class_id', $class_id)
            ->setParameter('sub_id', $sub_id)
            ->setParameter('user_id', $user_id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getLesson($id)
    {
        $qb = $this->createQueryBuilder('l');

        $qb
            ->addSelect('c', 's', 'u', 'sub')
            ->leftJoin('l.classroom', 'c')
            ->leftJoin('c.school', 's')
            ->leftJoin('l.user', 'u')
            ->leftJoin('l.subject', 'sub')
            ->where('l.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

}
