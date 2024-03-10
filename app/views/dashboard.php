

<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: ../../public/index.php');
    }

include 'layouts/header.php'; ?>

    <div class="container">
        <h1>Welcome <?php echo $_SESSION['username'] ?></h1>
        <p>You are logged in.</p>
        <a href="../../public/index.php?action=logout">Logout</a>
    </div>

<?php include 'layouts/footer.php'; ?>

