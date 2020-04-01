<!DOCTYPE html>
<?php
$docRoot=$_SERVER['DOCUMENT_ROOT'];
$title = "Administration";
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
                <h2><a href="#" onclick="reloadPArtPage('messages','Cards/Contact_list.php');return false;">Admin messages</a></h2>
                <h2><a href="#" onclick="reloadPArtPage('vide','Cards/_Games_Platfomr.php');return false;">Admin games</a></h2>
                <h2><a href="#" onclick="reloadPArtPage('filterCardAdmin','platforms','');return false;">Admin platforms</a></h2>
            </div>
        </nav>

        <section >
            <div id=relodOnLinkClick class="bloc-admin-container">
                <?php

                    if(!empty( $_COOKIE['filterCardAdmin'])){
                        $filtreParCokies =  $_COOKIE['filterCardAdmin'];
                    }else {
                        $filtreParCokies = "messages";
                    }
                switch($filtreParCokies){
                    case "messages" :
                        include $docRoot.'/Cards/Contact_list.php';
                        break;
                    case "vide" :
                        include 'Cards/_Games_Platfomr.php';
                        break;
                    case "platforms" :

                        break;
                    Default :
                        include $docRoot.'/Cards/Contact_list.php';
                        break;
                }

                ?>
            </div>
        </section>
    </section>
</main>

<?php require "includes/_footer.php" ?>