<?php
    // Template arguments
    // $page_name
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include dirname(__FILE__).'/_head.php'; ?>
    </head>
    <body>
        
        <!-- mobile i desktop navbar da sa otdelni??? -->
        
        <!-- $page_name is used here -->
        <?php include dirname(__FILE__)."/_navbar.php"; ?>
        
        <?php include dirname(__FILE__)."/{$page_name}/_top_content.php"; ?>
        
        <div class="main-content">
            <?php include dirname(__FILE__)."/{$page_name}/_main_content.php"; ?>
        </div>
        
        <?php include dirname(__FILE__).'/_footer.php'; ?>
    </body>
</html>