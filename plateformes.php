<!DOCTYPE html>
<html lang="en">
<head>
   <?php require 'includes/_head_platform.html'; ?>

</head>
<body>
        <?php require 'includes/_header.html'; ?>

        <main>

        <section class="banner-platforms">
            <h1>Pick a game</h1>
            <p>Select your favorite game and get ready to play!</p>
        </section>

        <section class="nav-and-bloc-container">


            <nav class="nav-platforms">
                <h2>Select your platform</h2>
                <div class="nav-platforms-links-container">
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'vide'; ?>">Toutes plateformes</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'Genesis'; ?>">Genesis</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'NES'; ?>">NES Classic</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'Dreamcast'; ?>">Dreamcast</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'Nintendo 64'; ?>">Nintendo 64</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'Arcade'; ?>">Arcade</a></h2>
                    <h2><a href="plateformes.php?platformFilter=<?php echo 'Super Nintendo'; ?>">Super Nintendo</a></h2>
                </div>
            </nav>
            <section>

                <div class="bloc-container">
                    <?php
                    if(isset($_GET['platformFilter'])){
                        $val=$_GET['platformFilter'];
                    //echo "platform filter detected " . $val;
                    }else {
                        $val="vide";
                    }

                    require 'Cards/_Games_Platfomr.php'; ?>

                </div>

            </div>
    </main>
        <footer>
            <?php require 'includes/_footer.html' ?>
        </footer>


        <?php require 'includes/_burger_menu_click.js'; ?>
    
</body>
</html>