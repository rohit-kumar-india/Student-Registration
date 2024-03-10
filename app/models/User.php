<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($full_name, $email, $username, $password) {
        // Check if the username or email already exists
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return false; // Username or email already exists
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = $this->db->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);
        $stmt->execute();

        return true;
    }

    public function login($username, $password) {
        // Find the user by username
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return false; // User not found
        }

        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            return $user; // Login successful
        } else {
            return false; // Incorrect password
        }
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null; // User not found
        }

        return $result->fetch_assoc();
    }
}

?>
