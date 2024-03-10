<?php

require_once '../config/dbconfig.php';
require_once '../app/models/User.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';

// Database connection
$db = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Routes
$action = isset($_GET['action']) ? $_GET['action'] : '';

$authController = new AuthController($db);
$dashboardController = new DashboardController($db);

switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'forgot_password':
        $authController->forgotPassword();
        break;
    case 'dashboard':
        $dashboardController->index();
        break;
    default:
        echo "2";
        // Default action (e.g., redirect to login page)
        header('Location: ../app/views/auth/login.php');
        exit;
}

