<!-- button management :  Connection / Disconnection  -->
<!-- gestion des boutons: Connexion / Déconnexion  -->
<?php if(!isset($_SESSION['user'])){ ?>
    <div id="registration">
        <a href="/connect.php" title="Connectez-vous pour pouvoir envoyé un message">Inscription / Connexion</a>
    </div>
<?php }elseif(isset($_SESSION['user'])){ ?>
    <div id="registration">
            <a href="/connect.php?deconnexion=0604" title="Déconnectez-vous">Déconnexion</a>
        <?php }else{ ?>
        <?php }
        ?>
    </div>