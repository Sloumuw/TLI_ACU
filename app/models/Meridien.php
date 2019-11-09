<?php


namespace App\models;


class Meridien
{

    /** @var string */
    private $idMeridien;

    /** @var string */
    private $name;

    
    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->idMeridien = $row['code'];
        $entity->name = $row['name'];

        return $entity;
    }

}
