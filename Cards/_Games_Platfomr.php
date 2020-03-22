<?php
$val =  $_COOKIE['filterPlatformName'];
$docRoot=$_SERVER['DOCUMENT_ROOT'];
$csv = array_map('str_getcsv', file($docRoot . '/data/games.csv'));

for($i =1 ;$i < count($csv) ;$i++ ){

    if($val==='vide') {
       ?>
        <div class="<?php echo $csv[$i][0] ?>">
            <span><?php echo $csv[$i][1] ?>"</span>
            <h3><?php echo $csv[$i][2] ?>"</h3>
            <a href="<?php echo $csv[$i][3] ?>" class="<?php echo $csv[$i][4] ?>"><?php echo $csv[$i][5] ?></a>
        </div>

        <?php
    }else if($val===$csv[$i][1]){ ?>
        <div class="<?php echo $csv[$i][0] ?>">
            <span><?php echo $csv[$i][1] ?>"</span>
            <h3><?php echo $csv[$i][2] ?>"</h3>
            <a href="<?php echo $csv[$i][3] ?>" class="<?php echo $csv[$i][4] ?>"><?php echo $csv[$i][5] ?></a>
        </div>
<?php
    }
} ?>

<!--
<div class="bloc super-mario-bros-2-container"><span>NES</span><h3>Super Mario Bros</h3><a href="Games/super-mario-bros.html" class="button button-on-hover">See More</a></div>
<div class="bloc street-fighter-container"><span>Arcade</span><h3>Street Fighter</h3><a href="Games/street-fighter-2.html" class="button button-on-hover">See More</a></div>
<div class="bloc sonic-the-hedgehog-2-container"><span>Genesis</span><h3>Sonic The Hedgehog 2</h3><a href="Games/sonic-the-hedgehog-2.html" class="button button-on-hover">See More</a></div>
<div class="bloc tloz-alttp-container"><span>Super Nintendo</span><h3>TLoZ A Link To The Past</h3><a href="Games/a-link-to-the-past.html" class="button button-on-hover">See More</a></div>
<div class="bloc tloz-oot-container"><span>Nintendo 64</span><h3>TLoZ Ocarina of Time</h3><a href="Games/ocarina-of-time.html" class="button button-on-hover">See More</a></div>
<div class="bloc tloz-mm-container"><span>Nintendo 64</span><h3>TLoZ Majora's Mask</h3><a href="Games/majora-mask.html" class="button button-on-hover">See More</a></div>
<div class="bloc aladdin-container"><span>Super Nintendo</span><h3>Disney's Aladdin</h3><a href="Games/aladdin.html" class="button button-on-hover">See More</a></div>
<div class="bloc altered-beast-container"><span>Genesis</span><h3>Altered Beast</h3><a href="Games/altered-beast.html" class="button button-on-hover">See More</a></div>
<div class="bloc kirby-dreamland-container"><span>Super Nintendo</span><h3>Kirby's Dreamland</h3><a href="Games/kirby-dreamland.html" class="button button-on-hover">See More</a></div>
<div class="bloc lion-king-container"><span>Super Nintendo</span><h3>Disney's The Lion King</h3><a href="#" class="button button-on-hover">See More</a></div>
<div class="bloc metal-slug-container"><span>Arcade</span><h3>Metal Slug</h3><a href="Games/metal-slug.html" class="button button-on-hover">See More</a></div>
<div class="bloc super-mario-64-container"><span>Nintendo 64</span><h3>Super Mario 64</h3><a href="Games/super-mario-64.html" class="button button-on-hover">See More</a></div>
<div class="bloc virtual-tennis-container"><span>Dreamcast</span><h3>Virtual Tennis</h3><a href="Games/virtual-tennis.html" class="button button-on-hover">See More</a></div>
-->
