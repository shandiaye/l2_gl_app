<?php
session_start();
require '../../database/produit_db.php';
$produit=true;
$pageTitle = "Produit";
include '../../header.php';
include '../../nav.php'; 

?>

<main>
<h1>Modifier le produit</h1>

<?php
$id = $_GET['id'];
$prod = getProduitById($id); // on doit recuperer les donnees avant le formulaire

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $description = $_POST['description'];
    UpdateProd($id,$libelle,$description,$prix,$quantite); 
    header('Location: /views/auth/produit.php');
    exit();
}
?>

<form method="post">

    <div class="mb-3">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle"
        value="<?php echo htmlspecialchars($prod['libelle']); ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix"
        value="<?php echo $prod['prix']; ?>" max="20000000" min="0">
    </div>

    <div class="mb-3">
        <label class="form-label">Quantite</label>
        <input type="number" class="form-control" name="quantite"
        value="<?php echo $prod['quantite']; ?>" min="5" max="100"> 
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" maxlength="250"><?php echo htmlspecialchars($prod['description']); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>

</main>
