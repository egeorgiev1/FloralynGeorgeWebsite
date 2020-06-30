<?php
    $result = "";
    function showResultStatus($resultString) {
        global $result;
        $result = '<div style="border: 1px solid black; padding: 1em; text-align: center;">'.$resultString.'</div>';
    }

    if(isset($_POST['operation'])) {
        $operation = $_POST['operation'];
        if(strcmp($operation, "content-upload") == 0 && isset($_FILES['fileToUpload'])) { // DA DOVARSHA!!!
            $target_dir = dirname(__FILE__)."/test/";
            $target_file = $target_dir . "content.xml";
            $uploadOk = 1;
            $fileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
            
            if(strcmp($fileType, "xml") == 0) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    showResultStatus("Content file uploaded successfully.");
                } else {
                    showResultStatus("An error occured while uploading. Operation unsuccessful.");
                }
            } else {
                showResultStatus("File does not have an xml extension. Operation cancelled.");
            }
        } else if(strcmp($operation, "image-upload") == 0 && isset($_FILES['fileToUpload'])) { // zashto isset ne raboti za fileToUpload???
            $target_dir = dirname(__FILE__)."/test/img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"]) && strlen($_FILES["fileToUpload"]["tmp_name"]) != 0) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check === false) {
                    showResultStatus("File is not an image. Operation cancelled.");
                } else {
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        showResultStatus("An error occured while uploading. Operation unsuccessful.");
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            showResultStatus("Image uploaded successfully.");
                        } else {
                            showResultStatus("An error occured while uploading. Operation unsuccessful.");
                        }
                    }
                }
            } else {
                showResultStatus("No file selected. Operation cancelled.");
            }
        } else if(strcmp($operation, "replicate") == 0) {
            $successful = true;
            if(copy(dirname(__FILE__)."/test/content.xml", dirname(__FILE__)."/content.xml")) {
                $dir = new DirectoryIterator(dirname(__FILE__)."/test/img");
                foreach ($dir as $fileinfo){
                    if ($fileinfo->isDot()) {
                        continue;
                    }
                    if(!copy(dirname(__FILE__)."/test/img/".$fileinfo->getFilename(), dirname(__FILE__)."/img/".$fileinfo->getFilename())) {
                        $successful = false;
                    }
                }
            } else {
                $successful = false;
            }
            
            if($successful) {
                showResultStatus("File replication successful.");
            } else {
                showResultStatus("File replication partially failed.");
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height" />
        <meta http-equiv="expires" content="0">

        <title> Floralyn George - Admin </title>
        <link rel="icon" type="image/png" href="img/icon.png" />
        
        <style>
            h1, h2, h3 {
                text-align: center;
            }
            
            form {
                display: flex;
                flex-direction: column;
                width: 200px;
                border: 1px solid black;
                padding: 1em;
                text-align: left;
            }
            
            .form-container {
                display: flex;
                justify-content: center;
            }
            
            body {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?= $result; ?>
        <h1>Admin Page</h1>
        <h2>Download and Replace Content File</h2>
        <div class="form-container">
            <form action="MKHgxWzKONXjW4NtAp8Rj4ySgZQx6Ruj5mWkIqL1OoT3A58cw7Zl1jDDntiZkrOA.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="operation" value="content-upload">
                Select content file(xml file):
                <br/>
                <br/>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br/>
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>
        <br/>
        <a href="content.xml" download>Download Production Content File</a>
        
        <h2>Manage Images</h2>
        <div class="form-container">
            <form action="MKHgxWzKONXjW4NtAp8Rj4ySgZQx6Ruj5mWkIqL1OoT3A58cw7Zl1jDDntiZkrOA.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="operation" value="image-upload">
                Upload and replace image:
                <br/>
                <br/>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br/>
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>
        <h3>List of Images</h3>
        
        <div class="images-list" style="display: flex; flex-wrap: wrap; background-color: rgba(0, 0, 0, 0.5); justify-content: center; padding: 0.5em;">
            <?php
                $dir = new DirectoryIterator(dirname(__FILE__)."/test/img");
                foreach ($dir as $fileinfo):
                    if ($fileinfo->isDot()) {
                        continue;
                    }
            ?>
            
                <div style="display: flex; align-items: center; flex-direction: column; border: 1px solid black; margin: 0.5em;">
                    <span style="padding: 0.5em; padding-bottom: 0;"><?= $fileinfo->getFilename(); ?></span>
                    <img style="height: 100px; padding: 0.5em;" src="test/img/<?= $fileinfo->getFilename(); ?>" />
                </div>
            
            <?php endforeach; ?>
        </div>
        
        <div style="display: flex; align-items: center; flex-direction: column;">
            <h2 style="margin-bottom: 0.5em;">Replicate to Production</h2>
            <form style="border: none; padding: 0; padding-bottom: 1em;" action="MKHgxWzKONXjW4NtAp8Rj4ySgZQx6Ruj5mWkIqL1OoT3A58cw7Zl1jDDntiZkrOA.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="operation" value="replicate">
                <input style="font-size: 20px; padding: 0.3em 1em; cursor: pointer;" type="submit" value="Replicate" name="submit">
            </form>
        </div>
        
    </body>
</html>