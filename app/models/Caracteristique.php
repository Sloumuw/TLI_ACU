<?php


namespace App\models;


class Caracteristique
{

    /** @var string */
    private $idCarac;

    /** @var string */
    private $name;


    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->idCarac = $row['idC'];
        $entity->name = $row['name'];

        return $entity;
    }
}
