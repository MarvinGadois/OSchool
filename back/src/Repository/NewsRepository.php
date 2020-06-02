<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    public function getNews()
    {
        // Le createQueryBuilder à l'intérieur du Repository considére qu'on veut 
        // forcément faire une requête à partir de la table de News
        // donc pas besoin de préciser le from() ni le select()
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('s')
            ->leftJoin('n.school', 's')
        ;

        return $qb->getQuery()->getResult();
    }


    public function getNewsBySchool($id)
    {
        // Le createQueryBuilder à l'intérieur du Repository considére qu'on veut 
        // forcément faire une requête à partir de la table de News
        // donc pas besoin de préciser le from() ni le select()
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('s')
            ->leftJoin('n.school', 's')
            ->where('s.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getResult();
    }


    public function getNew($id)
    {
        // Le createQueryBuilder à l'intérieur du Repository considére qu'on veut 
        // forcément faire une requête à partir de la table de News
        // donc pas besoin de préciser le from() ni le select()
        $qb = $this->createQueryBuilder('n');

        $qb
            ->addSelect('s')
            ->leftJoin('n.school', 's')
            ->where('n.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
