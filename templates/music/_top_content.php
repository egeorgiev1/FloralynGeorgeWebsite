<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
    $album = $xml_object->albums->album[count($xml_object->albums->album)-1];
    $top_content = $album->{'top-content'};
?>

<div class="top-content">
    <script id="content-xml" type="text/xmldata">
        <?php include dirname(__FILE__).'/../../content.xml' ?>
    </script>
    
    <div class="carousel stacked-layout screen-sized">
        <div class="items">
            
            <div class="stacked-layout no-overflow">
                <div class="stacked-layout">
                    <div class="stacked-layout carousel-item right scroll-scale">
                        <div class="stacked-layout">
                            <!-- image, video etc. -->
                            
                            <!-- DEFAULT LEFT, MID, RIGHT CLASSES SLAGANE?! -->
                            
                            <!-- dobaviane img tags za prefetching? -->
                            <img class="background bg-image keyframe-fix carousel-background left js-background" src="img/album-image-blurred.jpg" />
                            <img class="background bg-image keyframe-fix carousel-background mid js-background" src="img/<?= $top_content->{'background-image'} ?>" />
                            <img class="background bg-image keyframe-fix carousel-background right js-background" src="img/album-image-blurred.jpg" />

                            <div class="item-content keyframe-fix scroll-fade-out">
                              <div class="content">
                                <!-- dobaviane img tags za prefetching? -->
                                  <div style="height: 200px;width: 200px; position: relative; top: 0; left: 0; overflow: visible;" class="album-images-container">
                                        <!-- premahvane izlishni box shadows -->
                                        <img style="position: absolute; top: 0; left: 0;" class="album-image album-cover left js-album-image" src="img/album-image.jpg"/>
                                        <img style="position: absolute; top: 0; left: 0;" class="album-image album-cover mid js-album-image" src="img/<?= $album->image ?>"/>
                                        <img style="position: absolute; top: 0; left: 0;" class="album-image album-cover right js-album-image" src="img/album-image.jpg"/>
                                  </div>
                                
                                <!-- tuka ima problem sas participationa vav parent flexboxa, zatova e izmesteno po-nadolu!!! -->
                                  <!-- moze da kopiram elementite vav vatreshnia absolutely positioned element vav parenta i da gi
                                napravia invisible ili visibility attribute da modifyna, da ia vida taia rabota, za da pridadat nuznia height na elementa -->
                                <!-- da napravia samia layout sas 2 elementa, percentage margin za stacking na 2ta elementa??? -->
                                <div class="" style="position: relative; top: 0; left: 0; width: 100%; "> <!-- only to take up the right amount of space, tuka sashto da modifyvam samia content sa ssamia templating???, moze edin red da stane na multiline ako mu sloza dostatuchno text i da se promeniat razmerite -->
                                    <div style="visibility: hidden;" class="item-content album-controls"> <!-- nuzen li e keyframe fix? -->
                                            <a style="color: white; text-decoration: none;" class="album-name">When Light Falls Asleep</a>
                                            <div class="content-message">Pre-order now</div>
                                            <div class="content-actions">
                                              <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                  <button class="transparent-button play-button"> <!-- leko zelen -->
                                                    <i class="fa fa-play fa-2x"></i>
                                                    <span class="label"> Play Now </span>
                                                  </button>
                                                </a>
                                                <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                    <button class="transparent-button buy-button"> <!-- leko zalt(amazon?) -->
                                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                                        <span class="label"> Pre-order </span>
                                                    </button>
                                                </a>
                                            </div>
                                    </div>
                                    
                                    <div style="position: absolute; top: 0; left: 0; right: 0;" class="album-controls left">
                                        <div class="item-content album-controls"> <!-- nuzen li e keyframe fix? -->
                                            <a style="color: white; text-decoration: none;" class="album-name">Test</a>
                                            <div class="content-message">Pre-order now</div>
                                            <div class="content-actions">
                                              <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                  <button class="transparent-button play-button"> <!-- leko zelen -->
                                                    <i class="fa fa-play fa-2x"></i>
                                                    <span class="label"> Play Now </span>
                                                  </button>
                                                </a>
                                                <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                    <button class="transparent-button buy-button"> <!-- leko zalt(amazon?) -->
                                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                                        <span class="label"> Pre-order </span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>    
                                    </div>
                                    <div style="position: absolute; top: 0; left: 0; right: 0;" class="album-controls mid">
                                        <div class="item-content album-controls"> <!-- nuzen li e keyframe fix? -->
                                            <a style="color: white; text-decoration: none;" class="album-name"><?= $album->title ?></a>
                                            <div class="content-message"><?= $top_content->details ?></div>
                                            <div class="content-actions">
                                                <a class="button-link" href="<?= $top_content->{'play-link'} ?>">
                                                  <button class="transparent-button play-button"> <!-- leko zelen -->
                                                    <i class="fa fa-play fa-2x"></i>
                                                    <span class="label"> <?= $top_content->{'play-button'} ?> </span>
                                                  </button>
                                                </a>
                                                <a class="button-link" href="<?= $top_content->{'buy-link'} ?>">
                                                    <button class="transparent-button buy-button"> <!-- leko zalt(amazon?) -->
                                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                                        <span class="label"> <?= $top_content->{'buy-button'} ?> </span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>    
                                    </div>
                                    <div style="position: absolute; top: 0; left: 0; right: 0;"  class="album-controls right">
                                        <div class="item-content album-controls"> <!-- nuzen li e keyframe fix? -->
                                            <a style="color: white; text-decoration: none;" class="album-name">When Light Falls Asleep</a>
                                            <div class="content-message">Pre-order now</div>
                                            <div class="content-actions">
                                              <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                  <button class="transparent-button play-button"> <!-- leko zelen -->
                                                    <i class="fa fa-play fa-2x"></i>
                                                    <span class="label"> Play Now </span>
                                                  </button>
                                                </a>
                                                <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                                                    <button class="transparent-button buy-button"> <!-- leko zalt(amazon?) -->
                                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                                        <span class="label"> Pre-order </span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
            
        </div>

        <div class="carousel-controls scroll-scale scroll-fade-out">
          <i class="disabled-arrow fa fa-angle-left fa-5x control-left" aria-hidden="true"></i>

          <div class="middle-controls">
            <div class="carousel-buttons">
<!--              <i class="carousel-option fa fa-circle" aria-hidden="true"></i>-->
                <span class="carousel-indicator" style="text-shadow: 0 0 3px #000000; font-size: 1.125em">1/<?= count($xml_object->albums->album) ?></span>
            </div>

            <i style="margin-bottom: -10px; margin-top: -10px" class="down-arrow fa fa-angle-down fa-5x" aria-hidden="true"></i>
          </div>

          <i class="fa fa-angle-right fa-5x control-right" aria-hidden="true"></i>
        </div>

      </div>
</div>

<!--
<div class="top-content scroll-scale">
        <img class="bg-image" src="img/album-image-blurred.jpg" />
      <div class="content scroll-fade-out">
        <img class="album-image" src="img/album-image.jpg"/>
        <div class="album-name">When Light Falls Asleep</div>
        <div class="content-message">Pre-order Now</div>
        <div class="content-actions">
          <button class="transparent-button play-button" onclick="alert('Coming soon')">
            <i class="fa fa-play fa-2x"></i>
            <span class="label"> Play Now </span>
          </button>
            <a class="button-link" href="https://itunes.apple.com/gb/album/when-light-falls-asleep-ep/id1254531158">
                <button class="transparent-button buy-button">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                    <span class="label"> Pre-order </span>
                </button>
            </a>
        </div>
      </div>
      <i class="down-arrow fa fa-angle-down fa-5x scroll-fade-out" aria-hidden="true"></i>
</div>-->
