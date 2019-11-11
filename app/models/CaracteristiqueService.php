<?php

namespace App\models;

use Db\Connect;
use PDO;

class CaracteristiqueService
{
    /** @var Connect */
    private $db;

    /**
     * UserService constructor.
     * @param Connect $db
     */
    public function __construct(Connect $db)
    {
        $this->db = $db;
    }


    /**
     * @return array
     */
    public function getAll(): array
    {
        $stmt = $this->db->conn->prepare("SELECT idC, name FROM `carac` ;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        $result = [];

        foreach ($rows as $row) {
            array_push($result, Caracteristique::fromDatabase((array)$row));
        }

        return $result;
    }
}
