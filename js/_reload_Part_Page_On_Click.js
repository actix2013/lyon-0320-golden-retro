

    function reloadPArtPage(cookiesName,cookiesValue,page) { /// Wait till page is loaded
        document.cookie = cookiesName + "=" + cookiesValue;
        $('#relodOnLinkClick').load(page);
    }
    function reloadPArtPage(cookiesValue,page) { /// Wait till page is loaded
        document.cookie = "filterCardAdmin=" + cookiesValue;
        $('#relodOnLinkClick').load(page);
    }
    function reloadPartPagePlatforms(cookiesValue,page) { /// Wait till page is loaded
        document.cookie = "filterPlatformName=" + cookiesValue;
        $('#relodOnLinkClick').load(page);
    }

    function adminPageReloadPartPage(cookiesValue,page) { /// Wait till page is loaded
        document.cookie = "filterCardAdmin=" + cookiesValue;
        $('#relodOnLinkClick').load("admin2.php");
    }
