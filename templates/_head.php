<!-- version za samite css, js i t.n. za cache busting??? a cache busting za samia html??? -->

<?php $version = 127; ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height" />
    <meta http-equiv="expires" content="0">

    <title> Floralyn George - <?= ucfirst($page_name) ?> </title>
    <link rel="icon" type="image/png" href="img/icon.png" />

    <!--    <link rel="stylesheet" href="/style/normalize.css?v=1.0.1">-->
    <link rel="stylesheet" href="style/reset.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/debug.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/layout.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/main-style.css?v=<?= $version ?>">
    <!-- TODO: vremenno? -->
    <link rel="stylesheet" href="style/<?= $page_name ?>.css?v=<?= $version ?>">
    <!-- ili css??? -->
    <link rel="stylesheet" href="style/mobile-navbar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/top-content.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/carousel.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/section.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/section-news.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/section-videos.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/section-events.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/desktop-navbar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="style/footer.css?v=<?= $version ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
<!--
    <link rel="stylesheet" href="style/font-awesome.min.css">
    <script src="scripts/jquery-3.1.1.js" type="text/javascript"></script>
-->
    <script src="scripts/script.js?v=<?= $version ?>" type="text/javascript"></script>
    <!-- slagane scripts za shortening i t.n. -->

      <script src="scripts/jquery.shorten.js?v=<?= $version ?>" type="text/javascript"></script>
      <script src="scripts/jquery.dotdotdot.js?v=<?= $version ?>" type="text/javascript"></script>
      <script type="text/javascript">
          $(window).on('load', function() {
                $('.uk-description').shorten({
	               moreText: 'Show More',
	               lessText: 'Show Less',
                    showChars: 300
                });
          });
      </script>

      <script type="text/javascript">
            var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            $(window).on('load', function() {
                if(w <= 540) { /* dali i ravno??? */
                    $('.album-description').shorten({
                        moreText: 'Show More',
                        lessText: 'Show Less',
                        showChars: 300
                    });
                }
            });
      </script>