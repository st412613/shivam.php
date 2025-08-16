<?php

namespace App\Models;

use mysqli;

class UserModel {
    private mysqli $conn;

    public function __construct(mysqli $connection) {
        $this->conn = $connection;
    }

    // CREATE user
    public function create(string $name, string $email, string $password): bool {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    // READ all users
    public function getAll(): array {
        $result = $this->conn->query("SELECT id, name, email, created_at FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // READ one user by ID
    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT id, name, email, created_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user ?: null;
    }

    // READ user by Email (for login)
    public function getByEmail(string $email): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user ?: null;
    }

    // UPDATE user
    public function update(int $id, string $name, string $email): bool {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    // DELETE user
    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
