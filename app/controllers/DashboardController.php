<?php

require_once '../app/models/User.php'; // Include the User model

class DashboardController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        session_start();

        // Check if user is authenticated
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $user = new User($this->db);
        $current_user = $user->getUserById($user_id);

        // Render dashboard view
        include '../views/dashboard.php';
    }
}