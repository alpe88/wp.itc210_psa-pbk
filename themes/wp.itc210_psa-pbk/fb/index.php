<?php
//inits
$profile_id = "275539505711";
$limit = "5";
//App Info, needed for Auth
$app_id = "1687789394791547";
$app_secret = "e25bd6bc62833626081795ea813ff3ef";

getData($profile_id,$limit,$app_id,$app_secret);

function getData($pid,$l,$appid,$appsec){
$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$appid}&client_secret={$appsec}");
	

$json_object = fetchUrl("https://graph.facebook.com/{$pid}/feed?{$authToken}&limit={$l}");
$json_object = fetchUrl("https://graph.facebook.com/{$pid}/");
echo $json_object;
$json_output = json_decode($json_object);

foreach ( $json_output->data as $post )
{
	echo "<h2>{$post->name}</h2><br />";
    echo "{$post->message}<br /><br />";
}
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