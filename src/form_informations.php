<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'includes/_head_fusion.html'; ?>
    <title>Formulaire retour</title>
</head>
<body>
<?php require 'includes/_header.html'; ?>


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