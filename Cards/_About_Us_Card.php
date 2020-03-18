<?php
$csv = array_map('str_getcsv', file('data/about_us.csv'));
for($i =1 ;$i < count($csv) ;$i++ ){ ?>

    <div class="gca_row ">
        <div class="<?php echo  $csv[$i][4] ?> >">   </div>
        <div class="gca_column">
            <span class="pseudo"><?php echo $csv[$i][0]; ?></span>

            <div class="gca_content">
                <span class="category"><span class="category-title">Favorite platform: </span><?php echo $csv[$i][1]; ?></span>
                <span class="category"><span class="category-title">Favorite game: </span><?php echo $csv[$i][2]; ?></span>
                <p>
                    <?php echo $csv[$i][3];?>
                </p>
            </div>
        </div>
    </div>

<?php } ?>






