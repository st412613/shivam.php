<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Config\Database;

class UserController {
    private UserModel $user;

    public function __construct() {
        $db = Database::getInstance()->getConnection();
        $this->user = new UserModel($db);
    }

    // Get all users
    public function index() {
        $users = $this->user->getAll();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    // Create new user
    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['name'], $data['email'], $data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            return;
        }

        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $created = $this->user->create($name, $email, $password);

        if ($created) {
            http_response_code(201);
            echo json_encode(['message' => 'User created successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to create user']);
        }
    }

    // Show user by ID
    public function show(int $id) {
        $user = $this->user->getById($id);

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
        }
    }

    // Update user
    public function update(int $id) {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['name'], $data['email'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            return;
        }

        $updated = $this->user->update($id, $data['name'], $data['email']);

        if ($updated) {
            echo json_encode(['message' => 'User updated']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Update failed']);
        }
    }

    // Delete user
    public function delete(int $id) {
        $deleted = $this->user->delete($id);

        if ($deleted) {
            echo json_encode(['message' => 'User deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Delete failed']);
        }
    }

    // Login
    public function login() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['email'], $data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Email and password are required']);
            return;
        }

        $user = $this->user->getByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid credentials']);
            return;
        }

        echo json_encode([
            'message' => 'Login successful',
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ]
        ]);
    }
}
