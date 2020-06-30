<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
?>

<div class="section">
    <h2 class="title"><?= $xml_object->{'page-descriptors'}->videos->{'section-title'} ?></h2>
    <div class="video-entries">
        
    <?php foreach ($xml_object->videos->entry as $entry): ?>

      <a class="video-entry" href="<?= $entry->{'video-link'} ?>">
        <div class="video-thumbnail-container">
          <img class="video-thumbnail-new" src="img/<?= $entry->{'thumbnail-name'} ?>"/>
          <div class="video-thumbnail-overlay">
            <i class="thumbnail-icon fa fa-play" aria-hidden="true"></i>
          </div>
          <div class="video-thumbnail-length"> <?= $entry->{'length-text'} ?> </div>
        </div>
        <div class="video-title"> <?= $entry->{'name'} ?> </div>
        <div class="video-info">
          <span class="video-time">
              <?= $entry->{'date-text'} ?>
          </span>
        </div>
      </a>
        
    <?php endforeach ?>
        
        
    <!-- moze i kakto vav vimeo da go pravia 64.8K views, za da zaema po-malko prostranstvo, moze da smala font size da e kakto vav vimeo, da vida taka i za drugi??? -->
<!--
    <div class="video-entry" onclick="alert('Coming soon on VEVO')">
        <div class="video-thumbnail-container">
          <img class="video-thumbnail-new" src="img/video-image-small.jpg"/>
          <div class="video-thumbnail-overlay">
            <i class="thumbnail-icon fa fa-play" aria-hidden="true"></i>
          </div>
          <div class="video-thumbnail-length"> 4:54 </div>
        </div>
        <div class="video-title"> Floralyn George - Burning Sea(Live Session) </div>
        <div class="video-info">
          <span class="video-views"> 3K views</span>
          |
          <span class="video-time">
            35 minutes ago
          </span>
        </div>
    </div>
-->


      <!-- http://stackoverflow.com/questions/18744164/flex-box-align-last-row-to-grid , da vida da go napravia po-dobre ot tova-->
      <!-- da go napravia bez img?! -->
      <!--          <div class="video-entry empty"><img class="video-thumbnail"></div><div class="video-entry empty"><img class="video-thumbnail"></div><div class="video-entry empty"><img class="video-thumbnail"></div><div class="video-entry empty"><img class="video-thumbnail"></div><div class="video-entry empty"><img class="video-thumbnail"></div><div class="video-entry empty"><img class="video-thumbnail"></div>-->
      <div class="video-entry empty"></div>
      <div class="video-entry empty"></div>
      <div class="video-entry empty"></div>
      <div class="video-entry empty"></div>
      <div class="video-entry empty"></div>
      <div class="video-entry empty"></div>
    </div>
</div>