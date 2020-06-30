<?php 
    $xml_string = file_get_contents(dirname(__FILE__)."/../../content.xml");
    $xml_object = simplexml_load_string($xml_string) or die("Error: Cannot create object");
    $album = $xml_object->albums->album[count($xml_object->albums->album)-1];
    $songs = $album->songs->song;
?>

    <div class="section album-section">
        <?php
//            echo "<pre>";
//            print_r($album);
//            echo "</pre>";
        ?>
        <img class="album-image" src="img/<?= $album->image ?>" /> <!-- floated image?! -->
        <div class="album-info">
          <div class="album-name"><?= $album->title ?></div>
          <div class="album-details">
            <?= count($album->songs->song) ?> songs | <?= $album->length ?> minutes
          </div>
          <div class="album-description">
            <?= $album->description ?>
          </div>
        </div>

        <a class="fragment-link" name="play"></a>
        <table class="songs-list">
            <?php unset($index); $index = 0 ?>
            <?php foreach ($songs as $song): ?>
                <?php $index++ ?>
              <tr>
                <td><?= $index ?></td>
                <td><?= $song->name ?></td>
                <td>Classic</td>
                <td><?= $song->length ?></td>
                <td>
                  <a href="<?= $song->link ?>"> <!-- vsashtnost niama da sa linkove, tova da go prerabotia? -->
                    <button class="play"><i class="fa fa-play fa-lg" aria-hidden="true"></i></button>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </table>
        
        <a class="fragment-link" name="buy"></a>
        <div class="buy-title" style="margin: 1em; text-align: center; font-size: 1.125em;"><?= $album->{'purchase-label'} ?></div>
        <div class="purchase-links" style="margin: 1em; margin-top: 0; display: flex; justify-content: center; flex-wrap: wrap;">
            <?php foreach ($album->{'purchase-links'}->{'purchase-link'} as $entry): ?>
                <a href="<?= $entry->link ?>" class="buy-link">
                    <i class="fa <?= $entry->icon ?> fa-3x" aria-hidden="true"></i>
                    <span style="margin-top: 3px;"><?= $entry->title ?></span>
                    <span style="margin-top: 3px; color: rgb(236, 128, 19);"><?= $entry->warning ?></span>
                </a>
            <?php endforeach; ?>
        </div>
      </div>