<?php
session_start();
$new_prod= true;
$pageTitle = "NewProd";
include '../../header.php';
include '../../nav.php';
include '../../action/auth/create_produit_action.php';

$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<main>

    <div class="container">
        <h1>Ajouter un nouveau produit</h1>
    <form action="/action/auth/create_produit_action.php" method="post">
        <?php if($errorMessage): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
        <?php endif; ?>
       <?php if(!empty($erreurPrix) ):?>
        <div style= "padding-top: 30px;" class ="alert alert-danger">
            <?php echo $erreurPrix; ?>
        </div>
    <?php endif ?>
       <?php  if(!empty($erreurDes) ):?>
        <div style= "padding-top: 30px;" class ="alert alert-danger">
            <?php echo $erreurDes; ?>
        </div>
    <?php endif ?>
    <div class="mb-3">
        <label for="text" class="form-label">Libelle</label>
        <input type="text" class="form-control" id="libelle" name="libelle">
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prix" name="prix" max="20000000" min="0">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Quantite</label>
        <input type="number" class="form-control" id="quantite" name="quantite" min="5" max="100"> 
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" maxlength="250"></textarea>
    </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
</main>