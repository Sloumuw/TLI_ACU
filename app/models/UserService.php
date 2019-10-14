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
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $this->db->conn->prepare("INSERT INTO `user` (`login`, `hashed_password`) VALUES (:login, :hashed_password);");
        $stmt->execute([':login'=>$login, ':hashed_password'=>$hashedPassword]);
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
        $stmt = $this->db->conn->prepare("SELECT `id`, `login`, `hashed_password` from `user` WHERE `login`=:login;");
        $stmt->execute([':login' => $login]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();

        if (!$row) {
            throw new NotFoundException("Aucun utilisateur avec ce login");
        }

        return User::fromDatabase((array)$row);
    }

    public function comparePassword(User $user, string $password): bool
    {
        return password_verify($password, $user->getHashedPassword());
    }
}
