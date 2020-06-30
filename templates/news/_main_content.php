<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
?>

    <div class="section"> 
        <!-- da e h2?! -->
        <!-- da napravia samia title font-size po-golam ot na samia entry title??? -->
        <!-- da ima fragment link do tuka i da mozesh da go vzemesh ot tozi General text??? -->
        <!-- vertical separator da e sas ::before??? -->
        <h2 class="title">General</h2>
        <?php
//            echo "<pre>";
//            print_r($xml_object->news->entry[1]);
//            echo "</pre>";
        ?>
        
        <?php foreach ($xml_object->news->entry as $entry): ?>
        
        <div class="news-entry">
          <img class="thumbnail" src="img/<?= $entry->{'thumbnail-name'} ?>"/>
          <div class="news-content">
            <div class="news-title"> <a class="news-title-hover" href="<?= $entry->{'news-link'} ?>"><?= $entry->{'title'} ?></a> </div>
            <p class="news-information">
              <span class="news-publisher"> <?= $entry->{'company'} ?> </span>
              | 
                <span class="news-time"> <?= $entry->{'author'} ?> </span>
            </p>

            <p class="news-description">
              <?= $entry->{'description'} ?>
                <a href="<?= $entry->{'news-link'} ?>" class="show-more-link" style="color: rgb(236, 128, 19); text-decoration: none;">Read More</a>
            </p>
          </div>
        </div>

        <?php endforeach ?>
        
<!--
        <div class="news-entry">
          <img class="thumbnail" src="img/thekla.jpg"/>
          <div class="news-content">
            <div class="news-title">Test Title</div>
            <p class="news-information">
              <span class="news-publisher">
                Reuters
              </span>
              |
              <span class="news-time"> 6 hours ago </span>
            </p>

            <p class="news-description">
              This is some information about this. Also this some other additional information blabalbla... <span class="show-more">show more</span>
            </p>
          </div>
        </div>
-->
<!--
        <div class="empty-entry">
          
          <div class="news-encouragement">
            Be up to date with the latest news by signing up to the newsletter
          </div>
          
          <form class="newsletter-form">
            <input class="email-input" type="text" placeholder="SIGN UP FOR NEWSLETTER"> 
            <input class="sign-up" type="submit" value="SIGN UP">
          </form>
        </div>
      </div>
-->