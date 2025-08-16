<?php
namespace App\Models;

use mysqli;

class User {
    private mysqli $conn;
    private string $table = 'users';

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    // Create user
    public function create(string $name, string $email, string $password): bool {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)");
        if (!$stmt) return false;

        $stmt->bind_param("sss", $name, $email, $password);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // Read all users
    public function getAll(): array {
        $result = $this->conn->query("SELECT id, name, email, created_at, updated_at FROM {$this->table}");

        $users = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    // Read single user by ID
    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT id, name, email, created_at, updated_at FROM {$this->table} WHERE id = ?");
        if (!$stmt) return null;

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc() ?: null;

        $stmt->close();
        return $user;
    }

    // Update user by ID
    public function update(int $id, string $name, string $email, ?string $password = null): bool {
        if ($password !== null) {
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ?, password = ? WHERE id = ?");
            if (!$stmt) return false;

            $stmt->bind_param("sssi", $name, $email, $password, $id);
        } else {
            // Update without changing password
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?");
            if (!$stmt) return false;

            $stmt->bind_param("ssi", $name, $email, $id);
        }

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // Delete user by ID
    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
