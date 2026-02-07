<?php
session_start(); 
require '../../database/user.php';
$pageTitle = "Connexion";
include '../../header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email']; //recuperation des infos du user
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
        $user = getUserByEmail($email); //ligne de recuperation depuis la table users
        if($user){
            if(password_verify($password , hash: $user['password'])){ //verifie si le mdp saisi correspond au mot de passe hacge dans la bd
                $_SESSION['user_id'] = $user['id']; //si c'est vrai on stock le nom et l'id du user
                $_SESSION['username'] = $user['username'];
                header('Location: /index.php');
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe incorret";
                header('Location: /views/auth/login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Aucun utilisateur trouvé avec cet email.";
            header('Location: /views/auth/login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Tous les champs sont requis.";
        header('Location: /views/auth/login.php');
        exit();
    }
 }

