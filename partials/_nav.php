<div class="dropdown-backdrop navi">
	<a class="project-name" href="index.php">Dev Forward</a>
	<span class="nav-items"><a class="menu" href="index.php">Accueil</a>
	<a class="menu" href="register.php">Inscription</a> <?php
        if ($title!='Accueil' && $title!='Connexion' && $title!='Inscription') {
            echo '<a href="functions/deconnecte.php" class="menu" onclick="$("#idds").load("functions/deconnecte.php")">Deconnexion</a>';
        }
        else {
            echo '<a class="menu" href="connexion.php">Connexion</a>';
        }
        ?>
    </span>
</div>
