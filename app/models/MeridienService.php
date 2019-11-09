<?php


namespace App\models;

use App\exceptions\NotFoundException;
use Db\Connect;
use PDO;

class MeridienService
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
     * @param int $id
     * @return User
     * @throws NotFoundException
     */
    public function getAll(): array
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM `meridien` ;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();


        $result = [];

        foreach ($rows as $row) {
            array_push($result, Meridien::fromDatabase((array)$row));

        }

        var_dump($result);
        return $result;
    }


}
