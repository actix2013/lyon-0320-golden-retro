<!DOCTYPE html>
<?php
$title = "Plateformes";
$cookie_name = "filterPlatformName";
$cookie_value = "vide";
setcookie($cookie_name, $cookie_value);
require 'includes/_header.php';
?>

<main>

    <section class="banner-platforms">
        <h1>Pick a game</h1>
        <p>Select your favorite game and get ready to play!</p>
    </section>


    <section class="nav-and-bloc-container-admin">
        <!-- reload composant ok  -->
        <nav class="nav-admin">

            <h2>Select task :</h2>
            <div class="nav-admin-links-container">
                <h2><a href="#" onclick="reloadPArtPage('messages','Cards/_Contacts_list.php');return false;">Admin messages</a></h2>
                <h2><a href="#" onclick="reloadPArtPage('vide','Cards/_Games_Platfomr.php');return false;">Admin games</a></h2>
                <h2><a href="#" onclick="reloadPArtPage('platforms','');return false;">Admin platforms</a></h2>
            </div>
        </nav>

        <section >
            <div id=relodOnLinkClick class="bloc-admin-container">

                <?php
                $filtreParCokies =  $_COOKIE['filterPlatformName'];
                switch($filtreParCokies){
                    case "messages" :
                        include 'Cards/_Contacts_list.php';
                        break;
                    case "vide" :
                        include 'Cards/_Games_Platfomr.php';
                        break;
                    case "platforms" :

                        break;
                    Default :
                        var_dump( $filtreParCokies);
                        break;
                }

                ?>
            </div>
        </section>
    </section>
</main>

<?php require "includes/_footer.php" ?>