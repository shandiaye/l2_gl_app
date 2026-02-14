<?php
require 'db_connection.php';

function getUserByEmail($email){ //recuperer un user avec son email
    global $pdo; //connection a la base de donnee
    $sql = "SELECT * FROM users WHERE email = :email"; //requete qui selectionne toutes les colonne de la table users
    $stmt = $pdo->prepare($sql); // on va preparer la requete
    $stmt->bindParam(':email', $email); // associer le parametre :email a la variable $email
    $stmt->execute(); //execution
    return $stmt->fetch(); //on retourne un tableau associatif en cas de reussite dans le cas echant on retourne false 
}

function registerUser($username,$firstname,$email,$password){ //inscrire un user dans la base de donnee
    global $pdo;
    $sql = "INSERT INTO users (username,firstname,email,password) VALUES (:username, :firstname, :email, :password)"; //inserer les valeurs dans la table users
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username' , $username); // associer chaque variable a son parametre sql
    $stmt->bindParam(':firstname' , $firstname); 
    $stmt->bindParam(':email' , $email);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); //d'abord hasher le password qui va etre contenu dans la variable hashedpassword 
    $stmt->bindParam(':password' , $hashedPassword); //et c'est cette variable qu'on va binder avec le parametre sql password
    return $stmt->execute(); //l'execution va retourner true ou false
}

function getfullnameById($id){ //permet de savoir si l'utilisateur existe dans la base de donnees
    global $pdo;
    $sql = "SELECT username , firstname FROM users WHERE id = :id"; //on selectionne le username et le prenom dans la table user si les id coincident
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id' , $id); //on associe le parametre sql a la variable $id
    $stmt->execute(); //execution de la requete 
    $user = $stmt->fetch(); //le $user va contenir le resultat de l'execution (un tableau associatif en cas de reussite et false en cas d'echec)
    return $user ? $user['firstname']. ' ' . $user['username'] : null; //si l'utilisateur existe on retourne le nom et le prenom sinon on retourne null
}



