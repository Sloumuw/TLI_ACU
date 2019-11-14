<?php


namespace App\models;


class Keyword
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;


    public static function fromDatabase(array $row): self
    {
        $entity = new self();
        $entity->id = $row['idK'];
        $entity->name = $row['name'];

        return $entity;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
