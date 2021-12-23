<?php
session_start();
require_once( 'Facebook/autoload.php' );

$fb = new Facebook\Facebook([
  'app_id' => '1693288947547308',
  'app_secret' => '9f356cd024aeed33365a0b13e5b294dd',
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl('https://itcareer.app/employer-login/model/check_login.php', $permissions);
header("location: ".$loginUrl);

?>