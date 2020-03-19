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
                   <!-- <a href="house.php?id=<?php echo $house_id;?>">
                        <?php echo $house_name;?>
                    </a>-->
                    <h2>
                        <?php
                        if(isset($_GET['platformFilter']))
                        {

                            $val=$_GET['platformFilter'];
                            echo "platformfilter detected " . $val;

                        }esle
                        {
                            echo "platformfilter detected " . $val;

                        }
                        ?>
                        <a href="plateformes.php?id=<php?platformFilter=<?php echo 'Genesis'; ?>">Genesis</a>



                    </h2>
                    <h2><a href="Platforms/genesis.html">Genesis</a></h2>
                    <h2><a href="Platforms/nes-classic.html">NES Classic</a></h2>
                    <h2><a href="Platforms/dreamcast.html">Dreamcast</a></h2>
                    <h2><a href="Platforms/nintendo-64.html">Nintendo 64</a></h2>
                    <h2><a href="Platforms/arcade.html">Arcade</a></h2>
                    <h2><a href="Platforms/super-nintendo.html">Super Nintendo</a></h2>
                </div>

            </nav>

            <section>

                <div class="bloc-container">
                        <div class="bloc super-mario-bros-2-container"><span>NES</span><h3>Super Mario Bros</h3><a href="Games/super-mario-bros.html" class="button button-on-hover">See More</a></div>
                        <?php require 'Cards/_Games_Platfomr.php'; ?>
                </div>

            </div>
    </main>

        <?php require 'includes/_footer.html' ?>
</main>
        
        <?php require 'includes/_burger_menu_click.js'; ?>
    
</body>
</html>