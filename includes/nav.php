<header>
    <nav role="navigation">
        <ul>
            <li><a href="index.php?page=home">Accueil</a></li>
            <?php
                if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
                    echo "<li><a href=\"index.php?page=logout\">Logout</a></li>";
                    echo "<li><a href=\"index.php?page=account\">Mon compte</a></li>";
                    echo "<li><a href=\"index.php?page=temoignage\">Deposer temoignage</a></li>";

                }
                else {
                    echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                    echo "<li><a href=\"index.php?page=inscription\">Inscription</a></li>";
                    echo "<li><a href=\"index.php?page=temoignage\">Deposer temoignage</a></li>";

                }
            ?>
            <?php
                if((isset($_SESSION['login']) && $_SESSION['login'] === true) && $_SESSION['role'] >= 2 ) {
                    echo "<li><a href=\"index.php?page=admin\">Administration</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>