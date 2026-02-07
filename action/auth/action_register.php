<?php
session_start();
require '../../database/user.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //on va recuperer les donnees du formulaire
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

        if(!empty($username) && !empty($email) && !empty($firstname) && !empty($password)){
            if(!getUserByEmail($email)){ //si l'utilisateur n'existe pas
                registerUser($username,$firstname,$email,$password);
                header(header: 'Location: /views/auth/login.php');
                exit();
            } else {
                $_SESSION['error'] = "Un utilisateur utilise deja cet email";
                header('Location: /views/auth/register.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Tout les champs sont requis";
            header('Location: /views/auth/register.php');
            exit();
        }
    header('Location: /views/auth/login.php');
    exit();
}
