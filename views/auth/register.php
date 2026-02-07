<?php
session_start();
$register = true;
$pageTitle = "Inscription";
include '../../header.php';
include '../../nav.php';

$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']); //supprimer le message d'erreur apres affichage
?>
<main>
    <div class="container">
        <!-- Contenu spécifique de la page -->
        <h1>Inscrivez-vous</h1>
            <form action="/action/auth/action_register.php" method="POST"> 
            <?php if($errorMessage): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
        <div class="d-flex gap-3">
            <label>Nom_user</label>
            <input type="text" name="username" id="username" placeholder = "Votre nom" class="form-control mb-3">
        </div>
        <div class="d-flex gap-3">
            <label>Prénom</label>
            <input type="text" name="firstname" id="firstname" placeholder = "Votre prenom" class="form-control mb-3">
        </div>
        <div class="d-flex gap-3">
            <label>Email</label>
            <input type="text" name="email" id="email" placeholder = "Votre email" class="form-control mb-3">
        </div>
        <div class="d-flex gap-3">
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder = "Votre mot de passe" class="form-control mb-3">
        </div>
       
            <button class="btn btn-primary">S'inscrire</button>
    </form>
    </div>

</main>

<?php include '../../footer.php'; ?>

 
       

