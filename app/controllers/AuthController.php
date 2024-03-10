<?php

require_once '../app/models/User.php'; // Include the User model

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User($this->db);
            $registered = $user->register($full_name, $email, $username, $password);

            if ($registered) {
                // Redirect to login page after successful registration
                header('Location: ../app/views/auth/login.php');
                exit;
            } else {
                // Handle registration error
                echo 'Registration failed. Username or email already exists.';
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User($this->db);
            $authenticated_user = $user->login($username, $password);

            if ($authenticated_user) {
                // Start session and redirect to dashboard
                session_start();
                $_SESSION['username'] = $authenticated_user['username'];
                $_SESSION['user_id'] = $authenticated_user['id'];
                echo $_SESSION['username'];
                header('Location: ../app/views/dashboard.php');
                exit;
            } else {
                // Handle login error
                echo 'Login failed. Incorrect username or password.';
            }
        }
    }

    public function logout() {
        // Destroy session and redirect to login page
        session_start();
        session_destroy();
        header('Location: ../app/views/auth/login.php');
        exit;
    }

    public function forgotPassword() {
        // Implement forgot password functionality here
    }
}

?>
