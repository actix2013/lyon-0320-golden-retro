<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'includes/_head_about_us.html';?>
  </head>
  <body>
    <?php require_once 'includes/_header.html';?>
      <main>
    <section class="about-us-banner">
      <h1>Meet the team</h1>
      <p>Our passion for video games started when we were young so we love to share it. Non-contractual photographs</p>
    </section>
      <div class="gca_about_us align_center">

        <?php for($i=0;$i<10;$i++){ ?>
          <?php include 'Cards/_About_Us_Card.php'; ?>
          <?php } ?>

          <!-- Debut d'une card-->
          <div class="gca_row ">          
                 <div class="gca_img_box guillaume">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">Actix</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: </span>PC</span>
                      <span class="category"><span class="category-title">Favorite game: </span>Diablo</span>
                      <p>
                          Passionate since I was a teenager, my first big game is FF VII.
                          Very quickly I started playing games in Japanese (without speaking or reading it) and then on the PC with games like Fallout or Little Big Adventue.
                          But my favorite "time food" was undoubtedly Diablo I, II, III.
                          Today I only play POE, well it was before the Wild.
                        </p>
                  </div>
              </div>
          </div>

          <div class="gca_row ">          
                 <div class="gca_img_box geoffroy">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">Gottfrieden</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: </span>Nintendo 64</span>
                      <span class="category"><span class="category-title">Favorite game: </span>The Legend of Zelda Majora's Mask</span>
                      <p>
                          I've always been curious about interaction and how video games are concepted. My first console was the Nintendo 64 and I spent a huge amount of hours playing zelda OOT and MM.
                      </p>
                  </div>
              </div>
          </div>

          <div class="gca_row ">          
                 <div class="gca_img_box victor">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">BenKenobi</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: </span>Playstation Classic</span>
                      <span class="category"><span class="category-title">Favorite game: </span>Goldeneye (N64)</span>
                      <p>
                          When I was young, I used to play platformers such as Crash Bandicoot on Playstation Classic but also Disney's Aladdin on Super Nintendo of course. Today, I still play regularly but much more on strategic games on PC (Civilization VI and Europa Universalis IV).
                      </p>
                  </div>
              </div>
          </div>

          <div class="gca_row ">          
                 <div class="gca_img_box gael">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">SamplitO</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: </span>NES</span>
                      <span class="category"><span class="category-title">Favorite game: </span>Super Mario Bros.</span>
                      <p>
                          I'm a huge fan of Super Mario Bros that i discovered when i was 8. From then, i never stopped playing videos games.
                      </p>
                  </div>
              </div>
          </div>

          <div class="gca_row ">          
                 <div class="gca_img_box abdel">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">Ken Master</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: Super Nintendo </span></span>
                      <span class="category"><span class="category-title">Favorite game: </span>Street Fighter</span>
                      <p>
                          I remember when i discovered street fighter for the first time : that was a massive discovery for me to be able to fight with my friends. 
                      </p>
                  </div>
              </div>
          </div>

          <div class="gca_row ">          
                 <div class="gca_img_box stephane">   </div>             
              
              <div class="gca_column">
                <span class="pseudo">Double_Pizza</span>

                  <div class="gca_content">                     
                      <span class="category"><span class="category-title">Favorite platform: </span>Genesis</span>
                      <span class="category"><span class="category-title">Favorite game: </span>Sonic the Hedgehog 2</span>
                      <p>
                          Hey ! I'm Stéphane, in my childhood i always loved to play video games on my Sega genesis. My favorite ever is definitely Sonic The Hedgehog.
                      </p>
                  </div>
              </div>
          </div>

          </main>
    <footer>
        <?php require_once 'includes/_footer.html';?>
    </footer>
        
       <?php require_once 'includes/_burger_menu_click.js';?>
          
          
      </div>
  </body>
</html>
