<?php
namespace App\Service;


class DeleteUserClass implements DeleteUserInteface
{

    public function deleteThisUser(string $idUser): string
    {
        return "ok";
    }
}