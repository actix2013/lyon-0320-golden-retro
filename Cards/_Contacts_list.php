<?php
$title = "Page administration";
require "../sql/connect.php";
$DEBUG = false;
$callDeleteMessage = isset($_POST['deleteClick']);
// Traitement global , appel des fonctions
$val =  $_COOKIE['filterPlatformName'];

if ($callDeleteMessage) {
    deleteOnDatabaseWithPrepare(false, $_POST['objectId']);
}



if ($DEBUG) var_dump($firstName);

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

function getMessageOnDatabase(): array
{
    $pdointerne = new PDO(DSN, USER, PASS);
    $queryinterne = "SELECT * FROM retro_invader.contact_messages";
    $statementinterne = $pdointerne->query($queryinterne);
    $friendsinterne = $statementinterne->fetchAll(PDO::FETCH_CLASS);
    return $friendsinterne;
}


function deleteOnDatabaseWithPrepare(bool $DEBUG, string $id)
{
    try {
        $state = "New";
        $pdo = new PDO(DSN, USER, PASS);
        $query = "DELETE FROM retro_invader.contact_messages WHERE id=:id";
        $statement = $pdo->prepare($query);
        if ($statement) {
            $statement->bindValue(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            /* pour remise a 0 des variables si pas de redirection vers success , evite 2 x le meme user si actualisation*/
            $_POST = array();
        } else {
            if ($DEBUG) echo "Erreur de sntaxe lors de la preparation requette ";
            die('prepare() failed: ' . htmlspecialchars($pdo->error));
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    };
//header('Location: /success.php?message=' . $message);
}

$val =  $_COOKIE['filterPlatformName'];
$messageList = getMessageOnDatabase();

?>

<div class="contact">
    <div>
        <h5>Historique des messages : </h5>
        <div>
            <ul class="list-group">
                <?php for ($i = 0; $i < count($messageList) && $i < 3; $i++) {
                    $obj = $messageList[$i];
                    switch ($obj->state) {
                        case "Terminer":
                            $classList = "list-group-item list-group-item-success";
                            break;
                        case "Traitement en cour":
                            $classList = "list-group-item list-group-item-warning";
                            break;
                        case "New":
                            $classList = "list-group-item list-group-item-info";
                            break;
                        Default :
                            $classList = "list-group-item list-group-item-secondary";
                            break;


                    }

                    ?>
                    <li class="<?php echo $classList ?>">

                        <form action="" method="post" ;>
                            <?php
                            //var_dump($obj);
                            //var_dump($_POST);
                            $controlValueOfSelectedMessage = $obj->id;
                            ?>
                            <p> <?= "Message from  " . $obj->name . ". Sending date :" . $obj->dateOfCeation . " State : " . $obj->state . "<br>"; ?></p>
                            <input type="hidden" name="objectId" value="<?= $controlValueOfSelectedMessage ?>">
                            <button type="submit" class="btn btn-outline-secondary" name="showMessageClick"
                                    value="true">Afficher
                                Message
                            </button>
                            <button type="submit" class="btn btn-outline-success" name="setTerminateClick"
                                    value="true">Traitement
                                Terminer
                            </button>
                            <button type="submit" class="btn btn-outline-danger" name="deleteClick"
                                    value="true">Supprimer
                            </button>
                            <?php
                            var_dump($controlValueOfSelectedMessage);
                            var_dump($_POST);
                            echo "<p>*------------Valeur objet id en cours : $obj->id  et valeur post id ---" . $_POST['$obj->id'] . "</p>";
                            if ($_POST["objectId"] === $controlValueOfSelectedMessage) {
                                echo "<p>*------------------------ dtection egalitée de click ------------------------*</p>";
                                if (!empty($_POST['showMessageClick'])) {
                                    echo "Affichage du  message non implementée !!!<br>";
                                }
                                if (isset($_POST['setTerminateClick'])) {
                                    echo "Changement de status non implementée !!!<br>";
                                }
                                if (isset($_POST['deleteClick'])) {
                                    echo "Supression non implementé !!!<br>";
                                }
                            }

                            ?>
                        </form>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>