<?php
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/Facebook/');
require_once __DIR__ . '/Facebook/autoload.php';

//inits
$profile_id = "275539505711";
$limit = "5";
//App Info, needed for Auth
$app_id = "1687789394791547";
$app_secret = "e25bd6bc62833626081795ea813ff3ef";

getData($app_id,$app_secret);

function getData($appid,$appsec){
	$fb = new Facebook\Facebook([
	  'app_id' => '{$appid}',
	  'app_secret' => '{$appsec}',
	  'default_graph_version' => 'v2.2',
	  ]);

	try {
	  $accessToken = $getFat($appid,$appsec);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
	
	$user = $response->getGraphUser();
	echo 'Name: ' . $user['name'];
}
function fetchUrl($url){
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_TIMEOUT, 20);
 // You may need to add the line below
 // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
 $feedData = curl_exec($ch);
 curl_close($ch); 
 return $feedData;
}
function getFat($appid,$appsec){
	$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$appid}&client_secret={$appsec}");
	return $authToken;
}

/*

$json_object = fetchUrl("https://graph.facebook.com/{$pid}/feed?{$authToken}&limit={$l}");
echo $json_object;
$json_output = json_decode($json_object);

foreach ( $json_output->data as $post )
{
	echo "<h2>{$post->name}</h2><br />";
    echo "{$post->message}<br /><br />";
}*/