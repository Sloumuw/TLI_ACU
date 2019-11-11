<?php

namespace App\models;

use Db\Connect;
use PDO;

class PathologyService
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
        $sql = '
            SELECT v.idP as id,
            IFNULL(cr.name, "-") as carac_name,
            m.nom as meridien_name,
            ct.name as cat_name,
            v.desc as description
            FROM ma_vue v
            LEFT JOIN carac cr ON v.idCarac = cr.idC
            LEFT JOIN meridien m ON v.IdMerd = m.code
            LEFT JOIN catPatho ct ON v.idTypePatho = ct.idCP
        ';

        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();


        $result = [];

        foreach ($rows as $row) {
            array_push($result, Pathology::fromDatabase((array)$row));
        }

        return $result;
    }
}
