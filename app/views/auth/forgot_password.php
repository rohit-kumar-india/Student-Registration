<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Forgot Password</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
    <div class="auth-container">
        <h1>Forgot Password</h1>
        <p>Enter your email address below to receive a password reset link.</p>
        <form action="index.php?action=forgot_password" method="post">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Reset Password</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>
</body>
</html>
