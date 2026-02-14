<?php
require 'db_connection.php';

function registerProd($libelle,$description,$prix,$quantite){
    global $pdo;
    $sql = "INSERT INTO produits (libelle,description,prix,quantite) VALUES (:libelle, :description, :prix, :quantite)"; //inserer les valeurs dans la table users
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':libelle' , $libelle); // associer chaque variable a son parametre sql
    $stmt->bindParam(':description' , $description); 
    $stmt->bindParam(':prix' , $prix);
    $stmt->bindParam(':quantite' , $quantite); //et c'est cette variable qu'on va binder avec le parametre sql password
    return $stmt->execute(); //l'execution va retourner true ou f
}
function getAllProd(){
    global $pdo;
    $sql = "SELECT * FROM produits";
    $stmt = $pdo->query( $sql);
    return $stmt->fetchAll();
}

function UpdateProd($id,$libelle,$description,$prix,$quantite){
     global $pdo;
    $sql = "UPDATE produits SET libelle = :libelle, description = :description, prix = :prix, quantite = :quantite WHERE id = :id"; //inserer les valeurs dans la table users
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id' , $id);
    $stmt->bindParam(':libelle' , $libelle); // associer chaque variable a son parametre sql
    $stmt->bindParam(':description' , $description); 
    $stmt->bindParam(':prix' , $prix);
    $stmt->bindParam(':quantite' , $quantite); //et c'est cette variable qu'on va binder avec le parametre sql password
    return $stmt->execute();
}

function getProduitById($id) {
    global $pdo;
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

function deleteProduit($id) {
    global $pdo;
    $sql = "DELETE FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
