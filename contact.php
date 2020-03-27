<?php
$title = "Page contact" ;
require 'includes/_header.php';
require "sql/connect.php";

$errors = [];
$firstName = "";
$email = "";
$message = "";
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
    $email = trim($_POST['email']);
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
        $errors['email'] = "Merci de remplir le champ prenom";
        $error=false;
    }elseif (strlen($email)>45){
        //echo PHP_EOL ."******************** Detection last name trop grand <br>" . PHP_EOL;
        $errors['email'] = "Le champ non est trop long , il doit etre inférieur a 45 lettres.";
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
        $query = "INSERT INTO friend (firstname, email) VALUES ('$firstName','$email' )";
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
        $query = 'INSERT INTO friend (firstname, email) VALUES (:firstNameP,:emailP )';
        $statement = $pdo->prepare($query);
        $statement->bindValue(":firstNameP",$firstName,PDO::PARAM_STR);
        $statement->bindValue(":emailP",$email,PDO::PARAM_STR);
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
    $email = ""; */

}

function getMessageOnDatabase () : array {

    $pdointerne = new PDO(DSN, USER, PASS);
    $queryinterne = "SELECT * FROM contact_messages";
    $statementinterne = $pdointerne->query($queryinterne);
    $friendsinterne = $statementinterne->fetchAll(PDO::FETCH_CLASS);
    //var_dump($friendsinterne);
    return $friendsinterne;
}
$friends = getMessageOnDatabase();
?>
    <main>

    <section class="banner-contact">

        <div class="contact-banner-content-container">
            <h2>Feel free to contact us</h2>
            <p>You have any questions about our website, our games cotation or want to submit a game? Please feel free
                to send us a message, we'll do our best to answer your question as quick as possible.</p>
        </div>

    </section>
    <div class="middle">

        <div class="form" >
            <h2>Get in Touch !</h2>
            <form action="form_informations.php" method="post">
                <label for="name"></label>
                <input type="text" id="name" name="user_name" placeholder="Name">
                <label for="mail"></label>
                <input type="email" id="mail" name="user_mail" placeholder="Mail">
                <label for="msg"></label>
                <textarea id="msg" name="message" placeholder="Message"></textarea>
                <button type="submit" class="button">Send</button>
            </form>

        </div>
        <div class="contact">
            <div class="mail">
                <h5>Mail</h5>
                <div>
                    <i class="fa fa-envelope" aria-hidden="true">
                        Contact@retro-golden.fr
                    </i>
                </div>
            </div>
        </div>
    </div>


</main>

<?php require "includes/_footer.php" ?>