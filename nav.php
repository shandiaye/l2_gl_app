
<header data-bs-theme="dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

    <a class="navbar-brand" href="index.php">L2 GL APP</a>

    <!-- Bouton menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo $index ? 'active' : '' ?>" href="/index.php">Accueil</a>
        </li>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $login ? 'active' : '' ?>" href="/views/auth/login.php">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $register ? 'active' : '' ?>" href="/views/auth/register.php">Inscription</a>
            </li>
          </ul>
        <?php endif; ?>
      <?php if (isset($_SESSION['user_id'])): ?>
        <form action="" method="post">
          <ul>
            <li class="nav-item">
              <a class="nav-link <?php echo $produit ? 'active' : '' ?>" href="/views/auth/produit.php">Produit</a>
            </li>
          </ul>
      </form>
          <form class="d-flex" action="/action/auth/action_logout.php">
            <button class="btn btn-danger" type="submit">
              Déconnexion
            </button>
          </form>
      <?php endif; ?>
    </div>
  </div>
</nav>
</header>

   

  