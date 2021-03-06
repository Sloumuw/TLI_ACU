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

    public function getFilteredPathologies($mer, $cat, $carac): array
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

        $sql .= " WHERE 1=1";

        if ($mer != "0") {
            $sql .= ' AND m.code = "'.$mer.'"';
        }

        if ($cat != "0") {
            $sql .= ' AND ct.idCP = "'.$cat.'"';
        }

        if ($carac != "0") {
            $sql .= ' AND cr.idC = "'.$carac.'"';
        }

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

    public function getFilteredPathologiesByKeyword($keyword): array
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

        if ($keyword != "0") {
            $sql .= ' 
                LEFT JOIN symptPatho sp ON v.idP = sp.idP 
                LEFT JOIN symptome sy ON sp.idS = sy.idS 
                LEFT JOIN keySympt ks ON sy.idS = ks.idS 
                WHERE ks.idK = "'.$keyword.'";
            ';
        }

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
