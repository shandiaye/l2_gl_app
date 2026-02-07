<?php 
session_start();
$produit = true;
$pageTitle = "Produit";
include '../../header.php';
include '../../nav.php';
?>

<main>
    <form action="/views/auth/new_prod.php">
            <div><p>Aucun Produit</p></div> 
            <div><button class="btn btn-primary">+ Nouveau produit</button></div>
    </form>
   
</main>

<?php include '../../footer.php'; ?>


