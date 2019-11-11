<?php


namespace App\models;

use Db\Connect;
use PDO;

class CategorieService
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
        $stmt = $this->db->conn->prepare("SELECT idCP as idCat, name FROM `catPatho` ;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        $result = [];

        foreach ($rows as $row) {
            array_push($result, Categorie::fromDatabase((array)$row));
        }

        return $result;
    }
}
