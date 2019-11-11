<?php


namespace App\models;


class Categorie
{

    /** @var int */
    private $idCat;

    /** @var string */
    private $name;

    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->idCat = (int)$row['idCat'];
        $entity->name = $row['name'];

        return $entity;
    }

    public function getId(): int
    {
        return $this->idCat;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
