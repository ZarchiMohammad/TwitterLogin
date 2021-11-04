<?php

session_start();
require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

const CONSUMER_KEY = '*****';
const CONSUMER_SECRET = '*****';
const OAUTH_CALLBACK = 'http://127.0.0.1/login/';

if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token']) && $_REQUEST['oauth_token'] == $_SESSION['oauth_token']) {
    $request_token = [];
    $request_token['oauth_token'] = $_SESSION['oauth_token'];
    $request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
    $connection = new TwitterOAuth(
        CONSUMER_KEY,
        CONSUMER_SECRET,
        $request_token['oauth_token'],
        $request_token['oauth_token_secret']
    );
    $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
    $_SESSION['access_token'] = $access_token;
    header("location:./");
} else {
    if (!isset($_SESSION['access_token'])) {
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
        $_SESSION['oauth_token'] = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        //echo $url;
        echo "<a href='$url'>Click to login</a>";
    } else {
        $access_token = $_SESSION['access_token'];
        echo "Consumer Key: <code>" . CONSUMER_KEY . "</code><br>";
        echo "Consumer Secret: <code>" . CONSUMER_SECRET . "</code><br>";
        echo "Oauth Token: <code>" . $access_token['oauth_token'] . "</code><br>";
        echo "Oauth Token Secret: <code>" . $access_token['oauth_token_secret'] . "</code><br>";
    }
}
