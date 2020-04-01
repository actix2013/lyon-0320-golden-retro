<?php
$title = "Page administration";
$docRoot=$_SERVER['DOCUMENT_ROOT'];
require $docRoot . "/sql/connect.php";
$DEBUG = false;
$callDeleteMessage = isset($_POST['deleteClick']);
// Traitement global , appel des fonctions
$val =  $_COOKIE['filterPlatformName'];



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
                <th scope="row"><?= $obj->id;?></th>
                <td><?= $obj->name; ?></td>
                <td><?= $obj->email; ?></td>
                <td><?= $obj->message; ?></td>
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