<div class="header">
      <!-- the newsletter one is ugly, da go napravia black, ili pod navbara, ili izcialo vav footera ili kato highlighted button dropdown?! -->
      <div class="newsletter"> <!-- tuka da e form??? sashto da se kompresira vav samia menu button samia newsletter, moze da e kato edna ot samite opcii i da te otkara vav otdelna stranica, ili da te otkara do footera??? onclick da izleze da se typene email, moze da ne znaiat, che e email newsletter?! kakto gledam ne sa go doobmislili tova vav na justin timberlake website??? -->
        <form action="newsletter.php" method="post">
          <input class="news-item" name="email" type="text" placeholder="SIGN UP FOR NEWSLETTER"> 
          <input class="news-item" type="submit" value="SIGN UP">
            <span style="align-self: center; color: black;" class="loading-indicator"><i style="align-self: center;" class="fa fa-circle-o-notch fa-fw fa-lg fa-spin"></i></span>
        </form>

        <div class="separator"></div>

        <!-- http://stackoverflow.com/questions/39741709/css-focus-not-working -->
        <div tabindex="1" class="follow-container news-item">
          <div class="follow-button">
            <i class="fa fa-share-alt" aria-hidden="true"></i>
            <span>Follow</span> <!-- triabva li da e vav span? -->
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </div>
          <div class="follow-dropdown">
            <a href="https://play.spotify.com/artist/5daKLnSAvNb5n5Xw2sXmGP"> <!-- default target attribute??? -->
              <i class="social-icon fa fa-spotify fa-lg" aria-hidden="true"></i>
              Spotify
            </a>
            <a href="https://soundcloud.com/floralyngeorge"> <!-- default target attribute??? -->
              <i class="social-icon fa fa-soundcloud" aria-hidden="true"></i>
              SoundCloud
            </a>
            <a href="https://www.facebook.com/floralyngeorge">
              <i class="social-icon fa fa-facebook" aria-hidden="true"></i>
              Facebook
            </a>
            <a href="https://twitter.com/FloralynGeorge">
              <i class="social-icon fa fa-twitter" aria-hidden="true"></i>
              Twitter
            </a>
            <a href="https://www.instagram.com/floralyngeorge/">
              <i class="social-icon fa fa-instagram" aria-hidden="true"></i>
              Instagram
            </a>
            <a href="https://www.youtube.com/channel/UCpoabha4z0dqGpNeq-HUJ-w">
              <i class="social-icon fa fa-youtube-play" aria-hidden="true"></i>
              Youtube
            </a>
          </div>
        </div>
      </div>

      <div class="navbar">
        <a class="navbar-logo-container menu-item" href="index.php">
          <img class="navbar-logo" src="img/logo.png" />
          <img class="navbar-name" src="img/name.png" />
        </a>

        <div class="separator"></div>

        <a class="menu-item <?= strcmp($page_name, "music") == 0 ? "highlighted" : "" ?> " href="music.php"> Music </a>
        <a class="menu-item <?= strcmp($page_name, "videos") == 0 ? "highlighted" : "" ?> " href="videos.php"> Videos </a>
        <a class="menu-item <?= strcmp($page_name, "shows") == 0 ? "highlighted" : "" ?> " href="shows.php"> Shows </a>
        <a class="menu-item <?= strcmp($page_name, "news") == 0 ? "highlighted" : "" ?> " href="news.php"> News </a><a class="menu-item <?= strcmp($page_name, "blog") == 0 ? "highlighted" : "" ?> " href="https://tsvetimusic.wixsite.com/floralynsblog"> Blog </a>
      </div>
    </div>
    <div class="mobile-navbar">
      <div class="navbar">
        <!--        <a href="./index.html" class="logo"> Floralyn George </a>-->
        <a class="navbar-logo-container menu-item" href="index.php">
          <img class="navbar-logo" src="img/logo.png" />
          <img class="navbar-name" src="img/name.png" />
        </a>
        <div class="selected"> <?= ucfirst($page_name) ?> </div>
        <i class="menu-icon fa fa-bars fa-lg"></i>
      </div>

      <div class="menu">
        <div class="social-icons">
          <div class="social-icons-row">
            <a href="https://play.spotify.com/artist/5daKLnSAvNb5n5Xw2sXmGP" class="social-icon fa fa-lg fa-spotify" aria-hidden="true"></a>
            <a href="https://soundcloud.com/floralyngeorge" class="social-icon fa fa-lg fa-soundcloud" aria-hidden="true"></a>
            <a href="https://www.youtube.com/channel/UCpoabha4z0dqGpNeq-HUJ-w" class="social-icon fa fa-lg fa-youtube-play" aria-hidden="true"></a>
          </div>
          <div class="social-icons-row">
            <a href="https://www.facebook.com/floralyngeorge" class="social-icon fa fa-lg fa-facebook" aria-hidden="true"></a>
            <a href="https://twitter.com/FloralynGeorge" class="social-icon fa fa-lg fa-twitter" aria-hidden="true"></a>
            <a href="https://www.instagram.com/floralyngeorge/" class="social-icon fa fa-lg fa-instagram" aria-hidden="true"></a>
          </div>
        </div>

        <a href="music.php" class="menu-item"> Music </a>
        <a href="videos.php" class="menu-item"> Videos </a>
        <a href="shows.php" class="menu-item"> Shows </a>
        <a href="news.php" class="menu-item"> News </a>
        <a href="https://tsvetimusic.wixsite.com/floralynsblog" class="menu-item"> Blog </a>

        <form class="newsletter-form" action="newsletter.php" method="post">
          <!-- onclick da izleze da se typene email, moze da ne znaiat, che e email newsletter?! kakto gledam ne sa go doobmislili tova vav na justin timberlake website??? -->
          <input class="email-input" type="text" name="email" placeholder="SIGN UP FOR NEWSLETTER"> 
          <input class="sign-up" type="submit" value="SIGN UP">
            <span style="align-self: center;" class="loading-indicator mobile"><i style="align-self: center;" class="fa fa-circle-o-notch fa-fw fa-lg fa-spin"></i></span>
        </form>
      </div>
    </div>
