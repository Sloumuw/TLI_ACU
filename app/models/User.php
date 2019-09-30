<?php


namespace App\models;


class User
{
    /** @var string */
    private $login;

    /** @var string */
    private $hashedPassword;

    /** @var string */
    private $salt;

    public static function fromDatabase(array $row): self
    {
        $user = new self();
        $user->login = $row['login'];
        $user->hashedPassword = $row['hashed_password'];
        $user->salt = $row['salt'];

        return $user;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }
}
