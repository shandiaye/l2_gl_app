<?php
session_start();
require '../../database/produit_db.php';

$id = $_GET['id'];
deleteProduit($id);
header('Location: /views/auth/produit.php');