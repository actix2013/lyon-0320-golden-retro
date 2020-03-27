<?php
require_once "connect.php";

$errors = [];
$firstName = "";
$lastName = "";
$formAlredySend = isset($_POST['submit']);

// Traitement global , appel des fonctions
if ($formAlredySend) {
    $valid = isFormValid();
    if($valid){
        //writteOnDatabase();
        writteOnDatabaseWithPrepare();
    }

}


/*
 *  foontion de controle des champs du  formulaire. si  vide ou trop long
 */
function isFormValid():bool {
    global $email;
    global $firstName;
    global $errors;
    $firstName = trim($_POST['firstName']);
    $email = trim($_POST['lastName']);
    $error=true;

    if(empty($firstName)){
        //echo PHP_EOL ."******************** Detection first name est empty <br>" . PHP_EOL;
        $errors['firstName'] = "Merci de remplir le champ nom";
        $error=false;
    }elseif(strlen($firstName)>45){
        //echo PHP_EOL ."******************** Detection first name trop grand <br>" . PHP_EOL;
        $errors['firstName'] = "Le champ prénon est trop long , il doit etre inférieur a 45 lettres.";
        $error=false;
    }

    if(empty($email)){
       // echo PHP_EOL ."******************** Detection last name empty  <br>" . PHP_EOL;
        $errors['lastName'] = "Merci de remplir le champ prenom";
        $error=false;
    }elseif (strlen($email)>45){
        //echo PHP_EOL ."******************** Detection last name trop grand <br>" . PHP_EOL;
        $errors['lastName'] = "Le champ non est trop long , il doit etre inférieur a 45 lettres.";
        $error=false;
    }
    return $error;
}

/*
 * Ecrit dans la database ( est appeller si  le controle champ  valide est ok )
 */
function writteOnDatabase() : bool{
    try{
        global $email;
        global $firstName;
        $pdo = new PDO(DSN, USER, PASS);
        $query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstName','$email' )";
        $statement = $pdo->exec($query);
        if(!$statement) {
            echo $firstName. " Erreur enregistrement database :". $email;
            echo("Errormessage: " . mysqli_error());
        }else {
            $_POST = array();
            $firstName = "";
            $email = "";
        }
    }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return $statement;
    }
    return $statement;


}

/*
 * Ecrit dans la database avec prepation pour controle antiinjection
 */
function writteOnDatabaseWithPrepare(){
    try{
        global $email;
        global $firstName;
        $pdo = new PDO(DSN, USER, PASS);
        $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstNameP,:lastNameP )';
        $statement = $pdo->prepare($query);
        $statement->bindValue(":firstNameP",$firstName,PDO::PARAM_STR);
        $statement->bindValue(":lastNameP",$email,PDO::PARAM_STR);
        $statement->execute();
    }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return $statement;
    }
    $message="Bravo  ," . $firstName . " " . $email . " tu est maintenant mon amis et a été enregistré dans ma base.";
    header ('Location: /success.php?message=' . $message);
    /* pour remise a 0 des variables si pas de redirection vers success , evite 2 x le meme user si actualisation
    $_POST = array();
    $firstName = "";
    $lastName = ""; */

}

function getValueFriends () : array {

    $pdointerne = new PDO(DSN, USER, PASS);
    $queryinterne = "SELECT * FROM friend";
    $statementinterne = $pdointerne->query($queryinterne);
    $friendsinterne = $statementinterne->fetchAll(PDO::FETCH_CLASS);
    //var_dump($friendsinterne);
    return $friendsinterne;
}
$friends = getMessageOnDatabase();

// contien le header  + style bootstrap
require_once "_header.php";

?>

<div class="container">
    <ul>
        <?php for ($i = 0; $i < count($friends); $i++) {
            $obj = $friends[$i];
            ?>
            <li><?php echo $obj->firstname ." " . $obj->lastname; ?></li>
        <?php } ?>
    </ul>

    <div class="container">

        <h1>Engregistrer un utilisateur : </h1>
        <form action="index.php" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="form-group">
                <label for="inputName">Nom :</label>
                <input type="text" class="form-control" id="inputName" name="firstName" value=<?= $firstName ?>>
                <?php if (isset($errors['firstName'])) { ?>
                    <small id="firstNameHelp" class="form-text text-error">
                        <?php echo $errors['firstName'] ?>
                    </small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="lastName">Prénom :</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value=<?= $lastName ?>>
                <?php if (isset($errors['lastName'])) { ?>
                    <small id="lastNameHelp" class="form-text text-error">
                        <?php echo $errors['lastName'] ?>
                    </small>
                <?php } ?>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Enregistrer l'utilisateur</button>
        </form>
    </div>

<?php require_once "_footer.php" ?>