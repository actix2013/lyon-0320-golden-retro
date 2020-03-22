<!DOCTYPE html>
<html lang="en">
<head>
   <?php require 'includes/_head_fusion.html'; ?>
   <title>Plateforms</title>
</head>
<body>
        <?php require 'includes/_header.html'; ?>

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
                    <h2><a href="#" onclick="reloadPArtPage('vide');return false;">Toutes plateformes</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('Genesis');return false;">Genesis</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('NES');return false;">NES Classic</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('Dreamcast');return false;">Dreamcast</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('Nintendo 64');return false;">Nintendo 64</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('Arcade');return false;">Arcade</a></h2>
                    <h2><a href="#" onclick="reloadPArtPage('Super Nintendo');return false;">Super Nintendo</a></h2>
                </div>
            </nav>

            <section>

            <?php
                $cookie_name = "filterPlatformName";
                $cookie_value = "vide";
                setcookie($cookie_name, $cookie_value);
                ?>
            <div id=relodOnLinkClick class="bloc-container">

                <?php
                require 'Cards/_Games_Platfomr.php';
                ?>
            </div>
            </section>
        </section>
    </main>
        <footer>
            <?php require 'includes/_footer.html' ?>
        </footer>

        <script type="text/javascript">
                function reloadPArtPage(chaine) { /// Wait till page is loaded
                    document.cookie = "filterPlatformName="+chaine;
                    $('#relodOnLinkClick').load("Cards/_Games_Platfomr.php");
                }
        </script>

        <?php require 'js/_burger_menu_click.js'; ?>

    
</body>
</html>