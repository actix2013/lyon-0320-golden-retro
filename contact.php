
<html lang="en">
<head>
    <?php require "includes/_head_contact_us.html" ?>
</head>

<body>

    <div id="nav-mobile-container" class="nav-mobile-full no-content">
            <div class="close-menu-mobile no-content">
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <nav class="mobile-nav">
                    <ul>
                        <a href="plateformes.php"><li>Platforms</li></a>
                        <a href="about_us.php"><li>About Us</li></a>
                        <a href="contact.php"><li>Contact</li></a>
                    </ul>
            </nav>

        </div>

    <header>
        <section class="logo">
            <a href="index.php">
                <img class ="logo_smartphone" alt="logo_retro_invaders_smartphone" src="https://raw.githubusercontent.com/WildCodeSchool/lyon-0320-golden-retro/dev/Images/Autres/blog-loco-green.png" height="110" width="auto">
                <div class="logo-header"></div>
            </a>

        </section>

        <section class="menu_burger_container">
            <article id="burger-menu-click" class="menu_burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>

            </article>
        </section>

        <nav>
            <ul>
                <li><a href="plateformes.php">Platforms</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

    </header>

    <main>

        <section class="banner-contact">

            <div class="contact-banner-content-container">
                <h2>Feel free to contact us</h2>
                <p>You have any questions about our website, our games cotation or want to submit a game? Please feel free to send us a message, we'll do our best to answer your question as quick as possible.</p>
            </div>

        </section>
    <div class="middle">

        <div class="form">
            <h2>Get in Touch !</h2>

            <form action="#" method="post">

                <label for="name"></label>
                <input type="text" id="name" name="user_name" placeholder="Name">


                <label for="mail"></label>
                <input type="email" id="mail" name="user_mail" placeholder="Mail">


                <label for="msg"></label>
                <textarea id="msg" name="user_message" placeholder="Message"></textarea>

            </form>
                <button type="submit" class="button">Send</button>

        </div>

        <div class="contact">
            <div class="mail">

                <h5>Mail</h5>
                <div>
                    <i class="fa fa-envelope" aria-hidden="true">
                        Contact@retro-golden.fr
                    </i>

                </div>
            </div>
            <div class="call-us">
                <h5>Call Us</h5>
                <div>
                    <i class="fa fa-phone" aria-hidden="true">
                        0800 00 00 00
                    </i>

                </div>
            </div>

            <div class="location">
                <h5>Location</h5>
                <div>
                    <i class="fa fa-map" aria-hidden="true">
                        Bowser Castle <i class="fa fa-heart" aria-hidden="true"></i>
                    </i>

                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

</main>
        
        <script type="text/javascript">
        jQuery(function(){
            var div = jQuery("#burger-menu-click"), div = jQuery("#nav-mobile-container"), div = jQuery(".close-menu-mobile");
            jQuery("#burger-menu-click").click(function(){
                jQuery("#burger-menu-click").toggleClass ("no-content");
                jQuery("#nav-mobile-container").toggleClass ("no-content");
                jQuery(".close-menu-mobile").toggleClass ("no-content");
            });     
            jQuery(".close-menu-mobile").click(function(){
                jQuery("#burger-menu-click").toggleClass ("no-content");
                jQuery("#nav-mobile-container").toggleClass ("no-content");
                jQuery(".close-menu-mobile").toggleClass ("no-content");
            });   
        });
        </script>


</body>

</html>