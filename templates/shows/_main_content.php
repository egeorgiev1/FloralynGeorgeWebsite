<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
?>

    <div class="section">
          <a id="tickets-top"></a> <!-- scroll location -->
        <h2 class="title"><?= $xml_object->{'page-descriptors'}->shows->{'section-title'} ?></h2> <!-- sections da sa na godini?! Previous 2016 events i takiva section names?! -->
        <!-- da vida i drug prototype za event, kadeto celia background e image na samia event, pri hover se poluchava sliding effecta, moze short zoom, leko poosvetlavane na samia semitransparent black overlay, moze sas gradient??? -->
        
        <?php
//            echo "<pre>";
//            print_r($xml_object->{'page-descriptors'}->shows);
//            echo "</pre>";
        ?>
        <div class="event-entry" style="display: block;">
                <div class="uk-description">
                    <?= $xml_object->{'page-descriptors'}->shows->{'section-description'} ?>
                </div>
        </div>
          <a id="tickets"></a> <!-- scroll location -->
        
        <?php foreach ($xml_object->shows->entry as $entry): ?>
        
        <div class="event-entry">
          <div class="event-thumbnail">
            <!-- JAN, FEB etc., takiva short month names!!! -->
            <div class="event-thumbnail-date-container">
              <div class="event-thumbnail-month"> <?= $entry->{'month'} ?> </div>
              <div class="event-thumbnail-date"> <?= $entry->{'day'} ?> </div>
            </div>
            <!-- black semitransparent overlay tuka??? -->
            <div class="event-thumbnail-overlay"></div>
            <img class="event-thumbnail-image" src="img/<?= $entry->{'thumbnail-name'} ?>"/>
          </div>
          <div class="event-content">
            <div class="event-title"><?= $entry->{'name'} ?></div> <!-- ili title, a ne name??? -->
            <div class="event-time"> <!-- moze i da e range, from edikoga si to edikoga si -->
              <?= $entry->{'date-text'} ?>
            </div>
            <div class="event-location">
              <?= $entry->{'location'} ?>
            </div>
            <div class="event-description">
              <?= $entry->{'description'} ?>
            </div>
          </div>
            <a class="get-tickets-link" href="<?= $entry->{'tickets-link'} ?>">
          <button class="get-tickets">
            <i class="fa fa-ticket fa-2x"></i>
            <span class="ticket-button-text">Get </span>

            <span class="ticket-button-text">Tickets</span>
          </button>
            </a>
        </div>
        
        <?php endforeach ?>
        
      </div>