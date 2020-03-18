<?php
$csv = array_map('str_getcsv', file('../data/about_us.csv'));

for($i =0 ;$i < count($csv) ;$i++ ){ ?>

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

<?php } ?>






