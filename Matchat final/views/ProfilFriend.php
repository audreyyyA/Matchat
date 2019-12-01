<!DOCTYPE html>

<html>
    <head>
        <title>Baizodrome</title>
        <link rel="stylesheet" type="text/css" href="styleDark.css"/>
        <meta charset="utf-8">
    </head>
        

    <body>
         
        <div class="fond">
            <?php $friend = $_POST['friend'];?>
            <p>Bienvenu sur le compte de   <?php echo $friend ?> <a href="<?= route("utilisateur", "profile") ?>">Retour</a></p>
            

            <div id="band">
                <h1 id= "nomSite">Baizodrome</h1>
               
            </div>
            <div>
                <h4 id= "intérêts" >Informations:</h4> <br>
                <p>

                       <?php $sex = $_POST['sex'];  $age = $_POST['age'];
                       echo 'Sex: ' .$sex; ?> <br>
                       <?php echo 'Age: ' .$age .'ans'; ?> <br>

                </p>
                 
            </div>
            <div id="Description">
                
                
            </div>
        </div>
    </body>
</html>

