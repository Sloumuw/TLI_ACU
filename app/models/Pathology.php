<?php


namespace App\models;


class Pathology
{
    /** @var int */
    private $idPatho;

    // Chaud, vide, froid, interne...
    /** @var string */
    private $caracName;

    // Estomac, foie, blabla
    /** @var string */
    private $meridienName;

    // Luo, MV, organe/viscere
    /** @var string */
    private $catName;

    // Méridien du maître du cœur externe
    /** @var string */
    private $description;

    public const HEADERS = [
        'Catégorie', 'Caractéristique', 'Méridien', 'Description'
    ];

    public static function fromDatabase(array $row): self
    {
        $pathology = new self();
        $pathology->idPatho = (int)$row['id'];
        $pathology->caracName = $row['carac_name'];
        $pathology->meridienName = $row['meridien_name'];
        $pathology->catName = $row['cat_name'];
        $pathology->description = $row['description'];

        return $pathology;
    }

    public function getId(): int
    {
        return $this->idPatho;
    }

    public function getCaracName(): string
    {
        return $this->caracName;
    }

    public function getMeridienName(): string
    {
        return $this->meridienName;
    }

    public function getCatName(): string
    {
        return $this->catName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
