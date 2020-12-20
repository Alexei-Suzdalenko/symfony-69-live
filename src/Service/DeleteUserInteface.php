<?php
namespace App\Service;

/**
 * Interface DeleteUserInteface
 * @package App\Service
 * @param string $idUser
 * @return string
 */
interface DeleteUserInteface
{
    public  function deleteThisUser(string $idUser): string ;
}