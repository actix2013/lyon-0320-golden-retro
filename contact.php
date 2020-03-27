<?php
$title = "Page contact";
require 'includes/_header.php';
require "sql/connect.php";
$DEBUG = true;
$errors = [];
$firstName = "";
$email = "";
$message = "";
$formAlredySend = isset($_POST['submit']);

// Traitement global , appel des fonctions
if ($formAlredySend) {
    $valid = isFormValid($DEBUG);
    if ($valid) {
        //writteOnDatabase();
        writteOnDatabaseWithPrepare($DEBUG);
    }

}


/*
 * Function who  is control if given value in form are valid
 * @return :  true if no error , false if error
 * Global var used : one for each value of form.
 * Global  var $errors used and updated  with  detected errors
 */
function isFormValid(bool $DEBUG): bool
{
    global $email;
    global $firstName;
    global $message;
    global $errors;
    $firstName = trim( $_POST['firstName']);
    var_dump($firstName);
    $email = $_POST['email'];
    $message = $_POST['message'];
    $noError = true;

    // controle de conformité pour fisrtname
    if (empty($firstName)) {
        echo PHP_EOL ."******************** Detection first name est empty <br>" . PHP_EOL;
        $errors['firstName'] = "Merci de remplir le champ nom";
        $noError = false;
    } elseif (strlen($firstName) > 45) {
        if($DEBUG)echo PHP_EOL ."******************** Detection first name trop grand <br>" . PHP_EOL;
        $errors['firstName'] = "Le champ prénon est trop long , il doit etre inférieur a 45 lettres.";
        $noError = false;
    }

    // controle de conformitée pour email

    if (empty($email)) {
        if($DEBUG)echo PHP_EOL ."******************** Detection email empty  <br>" . PHP_EOL;
        $errors['email'] = "Merci de remplir le champ email";
        $noError = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if($DEBUG)echo PHP_EOL ."******************** Detection email invalide <br>" . PHP_EOL;
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
 * Ecrit dans la database ( est appeller si  le controle champ  valide est ok )
 */
function writteOnDatabase(): bool
{
    try {
        global $email;
        global $firstName;
        $pdo = new PDO(DSN, USER, PASS);
        $query = "INSERT INTO friend (firstname, email) VALUES ('$firstName','$email' )";
        $statement = $pdo->exec($query);
        if (!$statement) {
            echo $firstName . " Erreur enregistrement database :" . $email;
            echo("Errormessage: " . mysqli_error());
        } else {
            $_POST = array();
            $firstName = "";
            $email = "";
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return $statement;
    }
    return $statement;
}

/*
 * Ecrit dans la database avec prepation pour controle antiinjection
 */
function writteOnDatabaseWithPrepare(bool $DEBUG)
{
    try {
        global $email;
        global $firstName;
        global $message;
        $pdo = new PDO(DSN, USER, PASS);
        $query = "INSERT INTO contact_messages ( message,  email) VALUES ( :messageP, :emailP)";
        $statement = $pdo->prepare($query);
        if(!$statement){
            //$statement->bindValue(":firstNameP", $firstName, PDO::PARAM_STR);
            $statement->bindValue(":emailP", $email, PDO::PARAM_STR);
            $statement->bindValue(":messageP", $message, PDO::PARAM_STR);
            $statement->execute();
            $statement->close();

            /* pour remise a 0 des variables si pas de redirection vers success , evite 2 x le meme user si actualisation*/
            $_POST = array();
            $firstName = "";
            $email = "";
            $message = "";
        }
        else {
            if($DEBUG)echo "Erreur de sntaxe lors de la preparation requette ";
            die('prepare() failed: ' . htmlspecialchars($pdo->error));
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";

    }
    $resultat = "Bravo  ," . $firstName . " " . $email . " tu est maintenant mon amis et a été enregistré dans ma base.";
    //header('Location: /success.php?message=' . $message);



}

function getMessageOnDatabase(): array
{

    $pdointerne = new PDO(DSN, USER, PASS);
    $queryinterne = "SELECT * FROM contact_messages";
    $statementinterne = $pdointerne->query($queryinterne);
    $friendsinterne = $statementinterne->fetchAll(PDO::FETCH_CLASS);
    return $friendsinterne;
}
$messageList=getMessageOnDatabase();
//$friends = getMessageOnDatabase();
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
        <div class="middle">

            <div class="form container">
                <h2>Get in Touch !</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="firstName"></label>
                        <input type="text" id="firstName" name="firstName" placeholder="non , prenom , pseudo"
                               value=<?= $firstName ?>>
                        <?php if (isset($errors['firstName'])) { ?>
                            <small id="firstNameHelp" class="form-text text-error">
                                <?php echo $errors['firstName'] ?>
                            </small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Mail" value=<?= $email ?>>
                        <?php if (isset($errors['email'])) { ?>
                            <small id="emailHelp" class="form-text text-error">
                                <?php echo $errors['email'] ?>
                            </small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="msg"></label>
                        <textarea id="msg" name="message" placeholder="Message"><?= $message ?></textarea>
                    </div>
                    <button type="submit" class="button" name="submit">Envoyer</button>
                </form>
            </div>

        </div>
        <div class="contact">
            <div >
                <h5>Historique des messages : </h5>
                <div>
                    <ul class="list-group">
                        <?php for ($i = 0; $i < count($messageList); $i++) {
                            $obj = $messageList[$i];
                            if($obj->state == "Terminer"){
                                $classList="list-group-item list-group-item-success";
                            }else {
                                $classList="list-group-item list-group-item-warning";
                            }
                            ?>
                            <li class="<?php echo $classList?>">
                                <?php echo "Message de  " . $obj->name . " daté du " . $obj->dateOfCeation . " Etat en cours : " . $obj->state . "<br>"; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>


    </main>

<?php require "includes/_footer.php" ?>