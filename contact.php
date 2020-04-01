<?php
$title = "Page contact";
require 'includes/_header.php';
require "sql/connect.php";
$DEBUG = false;
$errors = [];
$firstName = "";
$email = "";
$message = "";
$formAlredySend = isset($_POST['submit']);
$callDeleteMessage = isset($_POST['deleteClick']);
// Traitement global , appel des fonctions
$success = false;

if ($formAlredySend) {
    $valid = isFormValid($DEBUG, $firstName, $email, $message, $errors);
    if ($valid) {
        //writteOnDatabase();
        writteOnDatabaseWithPrepare($DEBUG, $email, $firstName, $message);
        $sucess = true;
    }
// destection de demande de suppression de formulaire
} elseif ($callDeleteMessage) {
    deleteOnDatabaseWithPrepare(false, $_POST['objectId']);

}


/*
 * Function who  is control if given value in form are valid
 * @return :  true if no error , false if error
 * Global var used : one for each value of form.
 * Global  var $errors used and updated  with  detected errors
 */
function isFormValid(bool $DEBUG, string &$firstName, string &$email, string &$message, array &$errors): bool
{
    $firstName = trim($_POST['firstName']);
    $email = $_POST['email'];
    $message = $_POST['message'];
    $noError = true;

    if ($DEBUG) var_dump($firstName);


    // controle de conformité pour fisrtname
    if (empty($firstName)) {
        if ($DEBUG) echo PHP_EOL . "******************** Detection first name est empty <br>" . PHP_EOL;
        $errors['firstName'] = "Merci de remplir le champ nom";
        $noError = false;
    } elseif (strlen($firstName) > 45) {
        if ($DEBUG) echo PHP_EOL . "******************** Detection first name trop grand <br>" . PHP_EOL;
        $errors['firstName'] = "Le champ prénon est trop long , il doit etre inférieur a 45 lettres.";
        $noError = false;
    }

    // controle de conformitée pour email

    if (empty($email)) {
        if ($DEBUG) echo PHP_EOL . "******************** Detection email empty  <br>" . PHP_EOL;
        $errors['email'] = "Merci de remplir le champ email";
        $noError = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($DEBUG) echo PHP_EOL . "******************** Detection email invalide <br>" . PHP_EOL;
        $errors['email'] = "Le champ email n'a pas été valider , merci de corriger";
        $noError = false;
    }

    // controle de conformitée pour email
    if (empty($message)) {
        // echo PHP_EOL ."******************** Detection last name empty  <br>" . PHP_EOL;
        $errors['message'] = "Merci de saisir un message";
        $noError = false;
    }
    return $noError;
}


/*
 * Ecrit dans la database avec prepation pour controle antiinjection
 */
function writteOnDatabaseWithPrepare(bool $DEBUG, string &$email, string &$firstName, string &$message)
{
    try {
        $state = "New";
        $pdo = new PDO(DSN, USER, PASS);
        $query = "INSERT INTO retro_invader.contact_messages(name, message,  email, state) VALUES (:nameP, :messageP, :emailP, :stateP)";
        $statement = $pdo->prepare($query);
        if ($statement) {
            $statement->bindValue(":nameP", $firstName, PDO::PARAM_STR);
            $statement->bindValue(":emailP", $email, PDO::PARAM_STR);
            $statement->bindValue(":messageP", $message, PDO::PARAM_STR);
            $statement->bindValue(":stateP", $state, PDO::PARAM_STR);
            $statement->execute();
            /* pour remise a 0 des variables si pas de redirection vers success , evite 2 x le meme user si actualisation*/
            $_POST = array();
            $firstName = "";
            $email = "";
            $message = "";
        } else {
            if ($DEBUG) echo "Erreur de sntaxe lors de la preparation requette ";
            die('prepare() failed: ' . htmlspecialchars($pdo->error));
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
    $resultat = "Bravo  ," . $firstName . " " . $email . " tu est maintenant mon amis et a été enregistré dans ma base.";
    //header('Location: /success.php?message=' . $message);
}


?>
    <main>

        <section class="banner-contact">

            <div class="contact-banner-content-container">
                <h2>Feel free to contact us</h2>
                <p>You have any questions about our website, our games cotation or want to submit a game? Please feel
                    free
                    to send us a message, we'll do our best to answer your question as quick as possible.</p>
            </div>

        </section>

        <?php
            if ($sucess) { ?>
                <div class="contact-banner-content-container">
                    <?= "Victory , your message have been sent. ";?>
                </div>
                <?php
            } else {
                require_once "Cards/Contact_Form.php";
            }

        ?>


    </main>

<?php require "includes/_footer.php" ?>