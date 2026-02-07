<?php 
require '../../database/user.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $description = $_POST['description'];
    $erreurPrix = "";
    $erreurDes = "";

    if(!empty($libelle) && !empty($prix) && !empty($quantite) && !empty($description)){
        registerProd($libelle,$description,$prix,$quantite);
            header(header: 'Location: /views/auth/produit.php');
        exit();
    } else {
        $_SESSION['error'] = "Tout les champs sont requis";
            header('Location: /views/auth/new_prod.php');
            exit();
    }
    if( $prix<0 or $prix>20000000 ){
         $erreurPrix = "Le prix doit etre en 0 et 20.000.000";
         header('Location: /views/auth/new_prod.php');
         exit();
    }
    if (strlen($description) > 250){
        $erreurDes = "La description a maximun 250 caracteres";
         header('Location: /views/auth/new_prod.php');
         exit();
    }
}
    
?>