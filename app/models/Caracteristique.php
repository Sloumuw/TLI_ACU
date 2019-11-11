<?php


namespace App\models;


class Caracteristique
{

    /** @var int */
    private $idCarac;

    /** @var string */
    private $name;


    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->idCarac = (int)$row['idC'];
        $entity->name = $row['name'];

        return $entity;
    }

    public function getId(): int
    {
        return $this->idCarac;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
