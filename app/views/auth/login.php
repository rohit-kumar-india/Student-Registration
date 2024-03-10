

<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('location: ../dashboard.php');
    }

include '../layouts/header.php'; ?>

    <div class="auth-container">
        <h1>Login</h1>
        <form action="../../../public/index.php?action=login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br/><br/>
            <button type="submit">Login</button>
            <a href="forgot_password.php" style="text-align:center">Forgotten your Password?</a><br/>
            <p style="text-align:center">Don't have an account? <a href="register.php" style="display:inline;">Register</a></p>
        </form>
    </div>

<?php include '../layouts/footer.php'; ?>
