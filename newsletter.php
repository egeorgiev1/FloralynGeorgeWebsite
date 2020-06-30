<?php

// samia sendinblue dava error kato samia email e invalid!!!, da vida da moga da kaza na usera tazi rabota!

require('./Mailin.php');
$mailin = new Mailin("https://api.sendinblue.com/v2.0", "v19Arhxfyb5F0UB8");
$data = array( "email" => $_POST["email"],
    //"attributes" => array("NAME"=>"name", "SURNAME"=>"surname"),
    "listid" => array(2)
);

if(strcmp($mailin->create_update_user($data)['code'], "success") != 0) {
    header("HTTP/1.1 503 Error");
    die;
}

// Do tuka se stiga samo ako samia email e valid!!!
file_put_contents("./emails", $_POST["email"]."\r\n", FILE_APPEND | LOCK_EX); // zasega tova raboti, no po-natatuka triabva da se fixne, inache niama da moze da se updateva ot mnogo hora
header("HTTP/1.1 200 OK");
//header('Location: '.$_SERVER['HTTP_REFERER']);
die;

?>