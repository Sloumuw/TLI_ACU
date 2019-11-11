<?php


namespace App\models;


class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $login;

    /** @var string */
    private $hashedPassword;

    public static function fromDatabase(array $row): self
    {
        $user = new self();
        $user->id = (int)$row['id'];
        $user->login = $row['login'];
        $user->hashedPassword = $row['hashed_password'];

        return $user;
    }

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
