<?php
namespace App\Service;
use App\Entity\DataUser;
use Symfony\Component\HttpFoundation\Request;

interface DataUserInterface{

  /**
   * @return DataUser[]
   */
  public function showAllUsers():array ;

  /**
   * @param string $user_slug
   * @return DataUser
   */
  public function showOnlyOneUser(string $user_slug): object;

    /**
     * @param string $procinceSlug
     * @return DataUser[]
     */
    public function showUsersByProvince(string $procinceSlug): array ;
//
  //  /**
  //   * @param int $userId
  //   * @return DataUser[]
  //   */
  //  public function userUpdateDataUser(int $userId):object ;
//
  //  /**
  //   * @param DataUser $dataUser
  //   */
  //  public function deleteUser(DataUser $dataUser);


}