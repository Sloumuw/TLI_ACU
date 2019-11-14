<?php


namespace App\models;

use Db\Connect;
use PDO;

class KeywordService
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

    public function getAll(): array
    {
        $stmt = $this->db->conn->prepare('SELECT * FROM keywords;');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        $result = [];

        foreach ($rows as $row) {
            array_push($result, Keyword::fromDatabase((array)$row));
        }

//        var_dump($result);die;

        return $result;
    }
}
