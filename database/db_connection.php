<?php
$host = "localhost";
$dbname = "l2_gl_app";
$user = "root";
$password = "";

//le try permet de recuperer l'erreur s'il y'a une exception
 try {
        #chaine de connection
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // dection des erreurs 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //retourner un tableau associatif
        ];
        $pdo = new PDO ($dsn, $user,$password, $option);
    //die("Connextion reussi :" .$pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS));
}catch(PDOException $e){
    die("Connexion echouee : ". $e->getMessage()) ;
}
?> 