<script type="text/javascript">
    function reloadPArtPage(chaine) { /// Wait till page is loaded
        document.cookie = "filterPlatformName="+chaine;
        $('#relodOnLinkClick').load("Cards/_Games_Platfomr.php");
    }
    </script>