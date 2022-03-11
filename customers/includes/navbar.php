<nav class="navbar navbar-expand-lg navbar-light shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img src="../static/images/logo.png" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Accueil </a>
                </li>
                <span class="divided">|</span>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Produits</a>
                </li>
                <span class="divided">|</span>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <span class="divided">|</span>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <form action="search.php" class="d-flex">
                <div class="searchBox shadow-sm">
                    <input class="searchInput" type="text" name="" placeholder="Rechercher...">
                    <button class="searchButton" href="#">
                        <i class="material-icons scop">
                            search
                        </i>
                    </button>
                </div>
                <a href="../functions/logout.php">
                    <div class="header-item shadow-sm"><i class="material-icons">perm_identity</i>Déconnexion</div>
                </a>
                <a href="cart.php">
                    <div class="header-item cart shadow-sm"><i class="material-icons">shopping_cart</i></div>
                </a>
            </form>
        </div>
    </div>
</nav>