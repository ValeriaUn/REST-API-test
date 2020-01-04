<?php

namespace src\models;

use PDO;

/**
 * Class User. Model for 'user' table.
 *
 * @package src\models
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $created_at
 */
class User
{
    /**
     * @var PDO
     */
    private $connection;
    /**
     * @var string
     */
    private $table = 'user';

    public function __construct(PDO $db)
    {
        $this->connection = $db;
    }

    /**
     * Returns user by ID.
     *
     * @param int $id
     * @return array
     */
    public function get(int $id): array
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!is_array($row)) {
            $row = [];
        }

        return $row;
    }

    /**
     * Creates user.
     *
     * @param string $email
     * @param string $password
     *
     * @return array
     */
    public function create(string $email, string $password): array
    {
        $query = "INSERT INTO " . $this->table . " SET email=:email, password=:password";
        $stmt = $this->connection->prepare($query);

        $this->email = htmlspecialchars(strip_tags($email));
        $this->password = htmlspecialchars(strip_tags($password));

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        if (!$stmt->execute()) {
            return [];
        }

        return ['email' => $email, 'password' => $password];

    }

    /**
     * Deletes user by ID.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);

        $this->id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    }
}