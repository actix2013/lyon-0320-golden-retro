<!DOCTYPE html>
<?php
$title = "Bilan formulaire";
require 'includes/_header.php';
?>

<main>
    <section class="banner-contact">

        <div class="mail_discard">
            <h2>Sending mail function actualy not implmented.</h2>
            <p>You can see here the informations where have writed </p>
        </div>
    </section>

    <?php
    // affectation du  name
    if (isset($_POST['user_name'])) {
        $localName = htmlspecialchars($_POST['user_name']);
    } else {
        $localName = 'No readable value for Name';
    }
    // affectation mail
    if (isset($_POST['user_mail'])) {
        $localMail= htmlspecialchars($_POST['user_mail']);
    } else {
        $localMail = 'No readable value for Mail';
    }
    // affectation message
    if (isset($_POST['user_message'])) {
        $localuser_Message = $_POST['user_message'];
    } else {
        $localuser_Message = 'No readable value for user message';
    }
    ?>

    <div class="middle">
        <div class="form">
            <h2>Given informations :  </h2>
            <form action="index.php" method="post">
                <label for="name"></label>
                <input type="text" id="name" name="user2_name"  value="<?php echo $localName; ?>" readonly>
                <label for="mail"></label>
                <input type="email" id="mail" name="user2_mail"  value="<?php echo $localMail; ?>" readonly>
                <label for="msg"></label>
                <textarea id="msg" name="user2_message"  readonly><?php echo $localuser_Message; ?></textarea>
                <button type="submit" class="button" >Back</button>
            </form>

        </div>
    </div>


</main>

<?php require "includes/_footer.php" ?>