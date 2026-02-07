<?php
session_start();
$index = true;
$pageTitle = "Accueil - Mon Site";
include 'header.php';
include 'database/user.php';
?>
<?php include 'nav.php';?>

<main>
    <h1> Bienvenue dans l2 gl app <?php echo getfullnameById($_SESSION['user_id']); ?>
    </h1>
</main>

<?php include 'footer.php'; ?>

