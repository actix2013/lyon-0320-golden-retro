<?php
$title = "Page administration";
$docRoot=$_SERVER['DOCUMENT_ROOT'];
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


$val =  $_COOKIE['filterPlatformName'];
$messageList = getMessageOnDatabase();

?>


<div class="container contact">
    <h5>Historique des messages : </h5>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
        <th scope="col">State</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($messageList) && $i < 3; $i++) {
        $obj = $messageList[$i];
        ?>
        <tr>
            <th scope="row">1</th>
            <td><?= $obj->name; ?></td>
            <td><?= $obj->email; ?></td>
            <td>><?= $obj->message; ?></td>
            <td><?= $obj->dateOfCeation; ?></td>
            <td><?= $obj->state; ?></td>
            <td>
                <form class="form-up" method="POST" action=<?=$docRoot."/sql/delete_message.php"?>>
                    <input type="hidden" name="id" value="<?= $obj->id ?>" />
                    <button class="btn btn-sm btn-danger" name="butDelete"><a href="/sql/delete_message.php?id=<?=$obj->id?>" class="button-trash"></a></button>
                </form>
            </td>
        </tr>
     <?php } ?>

    </tbody>
</table>
</div>