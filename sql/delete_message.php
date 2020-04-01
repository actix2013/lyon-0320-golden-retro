<?php
$docRoot=$_SERVER['DOCUMENT_ROOT'];
var_dump($docRoot);

if(isset($_POST)){
    require_once $docRoot."/sql/connect.php";
    deleteOnDatabaseWithPrepare(false,$_REQUEST['id']);
    header("location:admin2.php");
}





function deleteOnDatabaseWithPrepare(bool $DEBUG, string $id)
{
    try {
        $state = "New";
        $pdo = new PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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