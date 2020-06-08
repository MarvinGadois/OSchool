<?php

namespace App\Repository;

use App\Entity\Notice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Notice|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notice[]    findAll()
 * @method Notice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notice::class);
    }

    public function getNotices()
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNoticesByAuthorId($id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('a.id = :id')
            ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNoticesByReceiverId($id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('r.id = :id')
            ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNoticesByAuthorAndReceiver($author_id, $receiver_id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('a.id = :author_id')
            ->andWhere('r.id = :receiver_id')
            ->setParameter('author_id', $author_id)
            ->setParameter('receiver_id', $receiver_id)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNoticesByAuthorAndSubject($author_id, $sub_id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('a.id = :author_id')
            ->andWhere('sub.id = :sub_id')
            ->setParameter('author_id', $author_id)
            ->setParameter('sub_id', $sub_id)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNoticesByReceiverAndSubject($receiver_id, $sub_id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('r.id = :receiver_id')
            ->andWhere('sub.id = :sub_id')
            ->setParameter('receiver_id', $receiver_id)
            ->setParameter('sub_id', $sub_id)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getNotice($id)
    {
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('a', 'r', 'sub', 'subj')
            ->leftJoin('n.author', 'a')
            ->leftJoin('a.subjects', 'sub')
            ->leftJoin('n.receiver', 'r')
            ->leftJoin('r.subjects', 'subj')
            ->where('n.id = :id')
            ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getOneOrNullResult();
    }
}
