<?php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('786986700635-uqm1500amrvha3ibodlp9fpiprbrnjrs.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://itcareer.app/candidate-login/model/check_login.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>