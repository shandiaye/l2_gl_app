<?php 
require '../../database/produit_db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $description = $_POST['description'];

    if(!empty($libelle) && !empty($prix) && !empty($quantite) && !empty($description)){
        registerProd($libelle,$description,$prix,$quantite);
            header(header: 'Location: /views/auth/produit.php');
        exit();
    } 
}
    
?>