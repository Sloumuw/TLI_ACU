<?php


namespace App\models;


class Categorie
{

    /** @var string */
    private $idCat;

    /** @var string */
    private $name;

    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->idCat = $row['idCat'];
        $entity->name = $row['name'];

        return $entity;
    }

}
