

<?php 

session_start();
if (isset($_SESSION['user_id'])) {
    header('location: ../dashboard.php');
    }

include '../layouts/header.php'; ?>

    <div class="auth-container">
        <h1>Register</h1>
        <form action="../../../public/index.php?action=register" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>

<?php include '../layouts/footer.php'; ?>
