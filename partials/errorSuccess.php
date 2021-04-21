<!----------- Viewing errors and successes ----------------->
<!----------- Affichage des erreurs et des réussites ----------------->
<?php if(isset($_GET["error"])){ ?>
    <div class="error">
        <span><?= $_GET["error"] ?></span>
        <a href="./" title="Fermer la fenêtre d'erreur">X</a>
    </div>
<?php }elseif(isset($_GET["success"])){ ?>
    <div class="success">
        <span><?= $_GET["success"] ?></span>
        <a href="./" title="Fermer la fenêtre de succès">X</a>
    </div>
<?php } ?>