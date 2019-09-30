<?php


namespace App\models;

use App\exceptions\NotFoundException;
use Db\Connect;
use PDO;

class UserService
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
     * @param string $login
     * @param string $pass
     */
    public function create(string $login, string $pass): void
    {
        $salt = $this->randomSalt();
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT, ['salt'=>$salt]);
        $stmt = $this->db->conn->prepare("INSERT INTO `user` (`login`, `hashed_password`, `salt`) VALUES (:login, :hashed_password, :salt);");
        $stmt->execute([':login'=>$login, ':hashed_password'=>$hashedPassword, ':salt'=>$salt]);
    }

    /**
     * @param int $id
     * @return User
     * @throws NotFoundException
     */
    public function getById(int $id): User
    {
        $stmt = $this->db->conn->prepare("SELECT `id`, `login`, `hashed_password`, `salt` from `user` WHERE `id`=:id;");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();

        if (!$row) {
            throw new NotFoundException("Aucun utilisateur avec cet id.");
        }

        return User::fromDatabase((array)$row);
    }

    /**
     * @param string $login
     * @return User
     * @throws NotFoundException
     */
    public function getByLogin(string $login): User
    {
        $stmt = $this->db->conn->prepare("SELECT `id`, `login`, `hashed_password`, `salt` from `user` WHERE `login`=:login;");
        $stmt->execute([':login' => $login]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();

        if (!$row) {
            throw new NotFoundException("Aucun utilisateur avec cet login.");
        }

        return User::fromDatabase((array)$row);
    }

    public function comparePassword(User $user, string $password): bool
    {
        return ($user->getHashedPassword() === password_hash($password, PASSWORD_BCRYPT, ['salt'=>$user->getSalt()]));
    }

    /**
     * Function used to generate a random salt for password hashing
     * @return string
     */
    private function randomSalt(): string
    {
        $salt = '';
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < 22; $i++) {
            $n = rand(0, strlen($alphabet)-1);
            $salt[$i] = $alphabet[$n];
        }

        return $salt;
    }
}
