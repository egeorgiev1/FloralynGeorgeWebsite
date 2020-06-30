<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
    $top_content_videos = $xml_object->{'page-descriptors'}->videos->{'top-content'};
    $top_content_shows  = $xml_object->{'page-descriptors'}->shows->{'top-content'};

    $album = $xml_object->albums->album[count($xml_object->albums->album)-1];
    $top_content = $album->{'top-content'};
?>

<div class="top-content">
    <div class="carousel stacked-layout screen-sized">
        <div class="items">
            
            <div class="stacked-layout no-overflow">
                <div class="stacked-layout">
                    <div class="stacked-layout carousel-item stacked-layout scroll-scale">  
                        <div class="stacked-layout">
                            <!-- image, video etc. -->
                            <img class="background keyframe-fix" src="img/<?= $top_content_shows->{'image'} ?>" />

                            <div class="item-content keyframe-fix scroll-fade-out">
                              <a href="shows.php" style="text-decoration: none; color: white;" class="title"> <?= $top_content_shows->{'title'} ?> </a>
                              <div class="description"> <?= $top_content_shows->{'details'} ?> </div>
                                <a href="shows.php#tickets-top" class="tickets-button-link">
                                    <button class="tickets-button">
                                <i class="fa fa-ticket fa-2x"></i>
                                <span class="label"> Get Tickets </span>
                              </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="stacked-layout no-overflow">
                <div class="stacked-layout">
                    <div class="stacked-layout carousel-item right scroll-scale">
                        <div class="stacked-layout">
                            <!-- image, video etc. -->
                            <img class="background bg-image keyframe-fix" src="img/<?= $top_content->{'background-image'} ?>" />

                            <div class="item-content keyframe-fix scroll-fade-out">
                              <div class="content">
                                <img class="album-image" src="img/<?= $album->{'image'} ?>"/>
                                <a href="music.php" style="color: white; text-decoration: none;" class="album-name"><?= $album->title ?></a>
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
                          </div>
                      </div>
                </div>
            </div>

            <div class="stacked-layout no-overflow">
                <div class="stacked-layout">
                    <div class="stacked-layout carousel-item right scroll-scale">
                        <div class="stacked-layout">
                            <!-- image, video etc. -->
                            <img class="background keyframe-fix" src="img/<?= $top_content_videos->{'image'} ?>" />

                            <div class="item-content keyframe-fix scroll-fade-out">
                              <div class="content">

                                <a href="" style="text-decoration: none; color: white;" class="title"> <?= $top_content_videos->{'title'} ?> </a>
                                <div class="description"> <?= $top_content_videos->{'details'} ?> </div>
                                <a style="text-decoration: none;" href="<?= $top_content_videos->{'video-link'} ?>">
                                    <button class="tickets-button">
                                      <i class="fa fa-play fa-2x"></i>
                                      <span class="label"> Watch Now </span>
                                    </button>
                                </a>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="carousel-controls scroll-scale scroll-fade-out">
          <i class="left-arrow disabled-arrow fa fa-angle-left fa-5x" aria-hidden="true"></i>

          <div class="middle-controls">
            <div class="carousel-buttons">
              <i class="carousel-option fa fa-circle" aria-hidden="true"></i>
            </div>

            <i style="margin-bottom: -10px; margin-top: -10px" class="down-arrow fa fa-angle-down fa-5x" aria-hidden="true"></i>
          </div>

          <i class="right-arrow fa fa-angle-right fa-5x" aria-hidden="true"></i>
        </div>

      </div>
</div>