<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
    $top_content = $xml_object->{'page-descriptors'}->videos->{'top-content'};
?>

<div class="top-content scroll-scale">
    <img class="bg-image scroll-fade-in" src="img/<?= $top_content->{'image-blurred'} ?>" />
    <img class="bg-image scroll-fade-out" src="img/<?= $top_content->{'image'} ?>" />
  <div class="content perspective-fix scroll-fade-out">
    <div class="title"> <?= $top_content->{'title'} ?> </div>
    <div class="description"> <?= $top_content->{'details'} ?> </div>
        <a style="text-decoration: none;" href="<?= $top_content->{'video-link'} ?>"> <!-- animation keyframe jerk fix creates a button clicking problem. fixed with this div(anchor sashto raboti) -->
            <button class="tickets-button">
                <i class="fa fa-play fa-2x"></i>
                <span class="label"> Watch Now </span>
            </button>
        </a>
  </div>
  <i class="down-arrow fa fa-angle-down fa-5x" aria-hidden="true"></i>
</div>