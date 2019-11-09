<?php


namespace App\models;


class Pathologie
{
    /** @var string */
    private $idPatho;

    /** @var string */
    // Chaud, vide, froid, interne...
    private $carac_name;

    // Estomac, foie, blabla
    /** @var string */
    private $meridien_name;

    // Luo, MV, organe/viscere
    /** @var string */
    private $cat_name;

    // Méridien du maître du cœur externe
    /** @var string */
    private $description;
}
