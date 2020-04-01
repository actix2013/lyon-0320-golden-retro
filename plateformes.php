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

    <section class="nav-and-bloc-container">
        <!-- implementation ajax en cours pour reload auto du  composant uniquement -->
        <nav class="nav-platforms">

            <h2>Select your platform</h2>
            <div class="nav-platforms-links-container">
                <h2><a href="#" onclick="reloadPartPagePlatforms('vide','Cards/_Games_Platfomr.php');return false;">Toutes plateformes</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('Genesis','Cards/_Games_Platfomr.php');return false;">Genesis</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('NES','Cards/_Games_Platfomr.php');return false;">NES Classic</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('Dreamcast','Cards/_Games_Platfomr.php');return false;">Dreamcast</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('Nintendo 64','Cards/_Games_Platfomr.php');return false;">Nintendo 64</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('Arcade','Cards/_Games_Platfomr.php');return false;">Arcade</a></h2>
                <h2><a href="#" onclick="reloadPartPagePlatforms('Super Nintendo','Cards/_Games_Platfomr.php');return false;">Super Nintendo</a></h2>
            </div>
        </nav>

        <section>
            <div id=relodOnLinkClick class="bloc-container">

                <?php
                require 'Cards/_Games_Platfomr.php';
                ?>
            </div>
        </section>
    </section>
</main>

<?php require "includes/_footer.php" ?>