<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
    $top_content = $xml_object->{'page-descriptors'}->shows->{'top-content'};
?>

<div class="top-content scroll-scale">

  <img class="bg-image scroll-fade-in" src="img/<?= $top_content->{'image-blurred'} ?>" />
  <img class="bg-image scroll-fade-out" src="img/<?= $top_content->{'image'} ?>" />
<!--      <div class="image-overlay"></div>-->
  <div class="content perspective-fix scroll-fade-out">
    <div class="title"> <?= $top_content->{'title'} ?> </div>
    <div class="description"> <?= $top_content->{'details'} ?> </div>
      <div>
        <button class="tickets-button" onclick="$('html, body').animate({ scrollTop: $('#tickets').offset().top-100 }, 500);">
            <i class="fa fa-ticket fa-2x"></i>
            <span class="label"> Get Tickets </span>
        </button>
      </div>
  </div>
  <i class="down-arrow fa fa-angle-down fa-5x scroll-fade-out" aria-hidden="true"></i>
</div>