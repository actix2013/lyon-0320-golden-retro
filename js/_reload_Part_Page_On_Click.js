<script type="text/javascript">
    function reloadPArtPage(chaine,page) { /// Wait till page is loaded
        document.cookie = "filterPlatformName=" + chaine;
        $('#relodOnLinkClick').load(page);
    }
    </script>