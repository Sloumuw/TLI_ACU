<?php

namespace App\Models;

require_once (__DIR__.'/../../db/Connect.php');
use Connect;


class UserService
{
    /** @var Connect */
    public $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    /**
     * @param int $id
     * @return User
     */
    public function fromDatabase(int $id): User
    {

    }
}
