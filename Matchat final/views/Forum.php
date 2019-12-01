<!DOCTYPE html>

<html>
    <head>
        <title>Baizodrome</title>
        <link rel="stylesheet" type="text/css" href="styleDark.css"/>
        <meta charset="utf-8">
    </head>
        

    <body>
         
        <div class="fond">
            
            <p>Bienvenu sur le Forum par défaut <a href="<?= route("utilisateur", "profile") ?>">Retour</a></p>
            

            <div id="band">
                <h1 id= "nomSite">Baizodrome</h1>
               
            </div>
            <div>
                
                <p>
                        <?php $pseudo = $_SESSION['pseudo']; 
                        showMessageForum($pseudo);?> 
                </p><br></br>
                 
                <form method="post" action="<?= route("utilisateur", "addPost") ?>">
                    <textarea cols="70" rows="10" required name="content"></textarea>
                    <input type="submit" value="Add post">
                    <input type="hidden" value="<?php echo $_SESSION["pseudo"]?>">
                </form>
            </div>
        </div>
    </body>
</html>

