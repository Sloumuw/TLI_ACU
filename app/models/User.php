<?php

namespace App\Models;


class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $login;

    /** @var string */
    private $hashedPassword;

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }
}
