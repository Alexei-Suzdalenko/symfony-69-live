<?php

namespace App\Repository;

use App\Entity\Fotos;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fotos[]    findAll()
 * @method Fotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fotos::class);
    }

}
