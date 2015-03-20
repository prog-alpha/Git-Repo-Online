<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive photo gallery.">

    <title>IT Store</title>

    
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/gallery-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/gallery-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/gallery-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/gallery.css">
    <!--<![endif]-->

</head>
<body>

<div>
    <div class="header">
<?php
//display footer
include_once("navigation.php");
?>
    </div>

    <div class="pure-g">
        <div class="photo-box u-1 u-med-1-3 u-lrg-1-4">
            <a href="http://www.dillonmcintosh.tumblr.com/">
                <img height="300" width="300" src="./images/POSH SJ4000W.jpg">
            </a>

            <aside class="photo-box-caption">
                <span>by <a href="http://www.dillonmcintosh.tumblr.com/">Dillon McIntosh</a></span>
            </aside>
        </div>

        <div class="text-box u-1 u-med-2-3 u-lrg-3-4">
            <div class="l-box">
                <h1 class="text-box-head">Latest Gadget</h1>
                <p class="text-box-subhead">Bring them home before its sold out.</p>
            </div>
        </div>

        <div class="photo-box u-1 u-med-1-2 u-lrg-1-3">
            <a href="http://ngkhanhlinh.dunked.com/">
                <img height="300" width="300" src="./images/iLuv Earphones.jpg">
            </a>

            <aside class="photo-box-caption">
                <span>
                    by <a href="http://ngkhanhlinh.dunked.com/">Linh Nguyen</a>
                </span>
            </aside>
        </div>

        <div class="photo-box u-1 u-med-1-2 u-lrg-1-3">
            <a href="http://www.nilssonlee.se/">
                <img height="300" width="300" src="./images/Sony CP-V5.jpg">
            </a>

            <aside class="photo-box-caption">
                <span>
                    by <a href="http://www.nilssonlee.se/">Jonas Nilsson Lee</a>
                </span>
            </aside>
        </div>

        <div class="photo-box u-1 u-med-1-2 u-lrg-1-3">
            <a href="http://www.flickr.com/photos/rulasibai/">
                <img height="300" width="300" src="./images/Norton IS.jpg">
            </a>

            <aside class="photo-box-caption">
                <span>
                    by <a href="http://www.flickr.com/photos/rulasibai/">Rula Sibai</a>
                </span>
            </aside>
        </div>
    </div>
</div>
</body>
<?php
//display footer
include_once("footer.php");
?>
</html>
