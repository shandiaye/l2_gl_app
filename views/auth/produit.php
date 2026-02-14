<?php 
session_start();
require '../../database/produit_db.php';

$produit = true;
$pageTitle = "Produit";
include '../../header.php';
include '../../nav.php';
$listesProd = getAllProd();
?>

<main class="container mt-3">
    <div class="d-flex justify-content-between mb-4">
        <h3>Mes produits</h3>
    <form action="/views/auth/new_prod.php">
            <div class="btn"><button class="btn btn-primary">+ Nouveau produit</button></div>
    </form>
   </div>

   <?php if (empty($listesProd)):?>
    <div class="alert alert-info">
    <p>Aunun Produit n'est dans la liste</p>
    <a href="/views/auth/new_prod.php">Veuillez ajouter un produit</a>
    </div>
    <?php else:?>
        <div class="row">
            <?php foreach ($listesProd as $produit): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($produit['libelle']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($produit['description']); ?></p>
                            <p class="mb-1"><strong>Prix :</strong> <?php echo $produit['prix']; ?> FCFA</p>
                            <p class="mb-3"><strong>Quantité :</strong> <?php echo $produit['quantite']; ?></p>
                            <div class="d-flex gap-2">
                                <a href="/action/auth/modifier.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-primary">Modifier</a>
                                <a href="/action/auth/supprimer.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif?>
</main>

<?php include '../../footer.php'; ?>