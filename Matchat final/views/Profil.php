<!DOCTYPE html>

<html>
    <head>
        <title>Baizodrome</title>
        <link rel="stylesheet" type="text/css" href="styleDark.css" />
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
            <div>
                <a href="<?= route("utilisateur", "showForum") ?>">Forum par défaut</a></p>
                <h4 id= "intérêts" >Ce qui te définit</h4> <br>
                <p>

                        <?php $pseudo = $_SESSION['pseudo']; 
                        showResultTest($pseudo);?> 

                </p>
                 
            </div>
            <div id="Description">
                
                <h4 id= "intérêts" > Amis</h4>
                <form method="post" action="<?= route("utilisateur", "AddFriend") ?>"> <!-- allows to add a new friend --> 
                    Rechercher des amis
                    <input type="text" name="pseudoFriend"> 
                    <input type="submit" value="Rechercher des amis">
                </form>

                    <?php if ($err !== null) { ?>
                        <p><?= $err ?></p>
                    <?php } ?>

                <p>
                    <?php $pseudo = $_SESSION['pseudo'];
                        
                        showFriends($pseudo);
            
                    ?>
                </p>
            </div>
        </div>
    </body>
</html>

