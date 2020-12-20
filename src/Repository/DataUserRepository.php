<?php
namespace App\Repository;

use App\Entity\DataUser;
use App\Service\DataUserInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Request;

/**
 * @method DataUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataUser[]    findAll()
 * @method DataUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class DataUserRepository extends ServiceEntityRepository implements DataUserInterface
{
    private $emi;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $emi)
    {
        parent::__construct($registry, DataUser::class);
        $this->emi = $emi;
    }

  // old
   public function showAllMan(): array
   {
       $qb = $this->createQueryBuilder('u_data');
       $qb->select('u_data.id', 'u_data.slug', 'u_data.image', 'u_data.name', 'u_data.slugprovince', 'u_data.town', 'u_data.townslug', 'u_data.sex')
            ->where('u_data.sex = :customsex')
            ->setParameter('customsex', 'hombre')
            ->orderBy('u_data.id', 'DESC');
       return $qb->getQuery()->getResult();
   }
    
    public function showAllUsers(): array
    {
        $qb = $this->createQueryBuilder('u_data');
        $qb->select('u_data.id', 'u_data.slug', 'u_data.image', 'u_data.name', 'u_data.slugprovince', 'u_data.town', 'u_data.townslug', 'u_data.sex')
            ->where('u_data.sex = :customsex')
            ->setParameter('customsex', 'mujer')
            ->orderBy('u_data.id', 'DESC');
        return $qb->getQuery()->getResult();
    }


    public function showOnlyOneUser(string $user_slug): object
    {
        return parent::findOneBy(['slug' => $user_slug]);
    }


    public function showUsersByProvince(string $procinceSlug): array
    {
        $qb = $this->createQueryBuilder('u_data');
        $qb->select('u_data.id', 'u_data.slug', 'u_data.image', 'u_data.name', 'u_data.slugprovince', 'u_data.town', 'u_data.townslug')
            ->where('u_data.slugprovince = :customslug')
            ->setParameter('customslug', $procinceSlug)
            ->orderBy('u_data.id', 'DESC');
        return $qb->getQuery()->getResult();
    }


    public function showUsersByTown(string $twonSlug): array
    {
        $qb = $this->createQueryBuilder('u_data');
        $qb->select('u_data.id', 'u_data.slug', 'u_data.image', 'u_data.name', 'u_data.slugprovince', 'u_data.townslug', 'u_data.town' )
            ->where('u_data.townslug = :customslug')
            ->setParameter('customslug', $twonSlug)
            ->orderBy('u_data.id', 'DESC');
        return $qb->getQuery()->getResult();
    }


    public function findAllTowns() : array
    {
        $qb = $this->createQueryBuilder('u_data');
        $qb->select('u_data.townslug', 'u_data.town' )
            ->distinct()
            ->orderBy('u_data.townslug', 'ASC');
        return $qb->getQuery()->getResult();
    }
//    public function userUpdateDataUser(int $userId): object
//    {
//
//    }
//
//
//    public function deleteUser(DataUser $dataUser)
//    {
//        $this->emi->remove($dataUser);
//        $this->emi->flush();
//    }



































}
