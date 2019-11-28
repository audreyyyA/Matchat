<!DOCTYPE html>

<html>
    <head>
        <title>Baizodrome</title>
        <link rel="stylesheet" type="text/css" href="styleDark.css"/>
        <meta charset="utf-8">
    </head>
        

    <body>
         
        <div class="fond">
               <?php 
                if (isset($_SESSION['pseudo'])) {
                    ?>
                <p>Coucou, <?php echo $_SESSION['pseudo'] ?>. <a href="<?= route("utilisateur", "logout") ?>">Deconnexion.</a></p>
                <?php
                } else {
                
                    require ("/views/presentation.php") ;
                }
                ?>

            <div id="band">
                <h1 id= "nomSite">Baizodrome</h1>
               
            </div>
                <h4 id= "intérêts" >Centres d'intérêts</h4>
                <a href="index.php?controle=utilisateur&action=ShowForum">Mes forums</a>
                Rechercher un forum
                    <form method="post" action="index.php?controle=utilisateur&action=addForum">
                        <input type="text" id="name" name="name"> 
                        <input type="submit" value="Rechercher un nouveau forum">
                    </form>
            <div id="Description">
                
                <h4 id= "intérêts" > Amis</h4>
                <form method="post" action="<?= route("utilisateur", "AddFriend") ?>"> <!-- à changer: permet d'ajouter un ami à sa liste --> 
                    Rechercher des amis
                    <input type="text" name="pseudoFriend"> 
                    <input type="submit" value="Rechercher des amis">
                </form>

                    <?php if ($err !== null) { ?>
                        <p><?= $err ?></p>
                    <?php } ?>
            </div>
        </div>
    </body>
</html>

