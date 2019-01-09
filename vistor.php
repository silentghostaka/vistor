<?php
error_reporting(0);
/**
# Copyright (c) 2018 IDSYSTEM404.
# Author      : Wahyu Arif P
# Version     : v1
# Created 	  : 07 Mei 2018 | 18:43:05
# Last Update : 08 Mei 2018 | 07:20:21
# "Hargai Copyright jangan di Ubah!" 
						-Wahyu Arif P
**/
echo "\n\e[1;35m 
  _________.__.__                 __      ________.__                    __   
 /   _____/|__|  |   ____   _____/  |_   /  _____/|  |__   _____________/  |_ 
 \_____  \ |  |  | _/ __ \ /    \   __\ /   \  ___|  |  \ /  _ \___   /\   __\
 /        \|  |  |_\  ___/|   |  \  |   \    \_\  \   Y  (  <_> )    /  |  |  
/_______  /|__|____/\___  >___|  /__|    \______  /___|  /\____/_____ \ |__|  
        \/              \/     \/               \/     \/            \/       
\e[0m\r\n";
$banner     = "   
\e[1;35m======================================================================
=> VITUR VISITOR BLOG :
=> IP
=> Proxy
=> Add Delay Time
=> 20 UserAgent
\e[1;31mPESAN : 
[ URL Harus Diawali Dengan http:// OR https:// ]
[ Proxy ] IP/PORT [ Contoh ] 127.0.0.1:80 [ Kosongkan Jika Bingung ] \e[0m
\e[1;35m======================================================================\e[0m\n";

print $banner;

$authorceo = 'SILENTGHOST';

echo "\nURL BLOG : ";
$url = trim(fgets(STDIN, 1024)); /** MANUAL URL $url = 'URL or Target'; **/
echo "\nJUMBLAH VISITOR : ";
$jumlah = trim(fgets(STDIN, 1024));
echo "\nPROXY : ";
$proxy       = rtrim( fgets( STDIN));
echo "\nDELAY : ";
$delay = trim(fgets(STDIN, 1024));
echo "\n";

echo "\n\e[1;35m   ___                                     
  / _ \_ __ ___  ___  ___  ___             
 / /_)/ '__/ _ \/ __|/ _ \/ __|            
/ ___/| | | (_) \__ \  __/\__ \  _   _   _ 
\/    |_|  \___/|___/\___||___/ (_) (_) (_)
                                           \e[0m\n";
// $url = 'http://'.substr(trim($url), 1);
for ($x=1; $x<=$jumlah; $x++) {

/** FUNCTION CURL **/
$idsystem404 = curl_init();
curl_setopt($idsystem404, CURLOPT_URL, 
"https://idsystem404.000webhostapp.com/api/api-autovisitor.php?url=".$url);
curl_setopt($idsystem404, CURLOPT_REFERER, "https://www.google.com");
curl_setopt($idsystem404, CURLOPT_HEADER, 0);
curl_setopt($idsystem404, CURLOPT_PROXY, $proxy);
curl_setopt($idsystem404, CURLOPT_HTTPPROXYTUNNEL, $proxy);
curl_setopt($idsystem404, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($idsystem404, CURLOPT_RETURNTRANSFER, true);
curl_setopt($idsystem404, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($idsystem404, CURLOPT_TIMEOUT, 10);
curl_setopt($idsystem404, CURLOPT_ENCODING, "gzip");
$exec = curl_exec($idsystem404);
if(!curl_errno($idsystem404)){
//$info = curl_getinfo($idsystem404, CURLINFO_HTTP_CODE);
$info = curl_getinfo($idsystem404);
$ip = $info['primary_ip'];
$port = $info['primary_port'];
$code = $info['http_code'];
curl_close($idsystem404);
	if ($exec == "primary_ip") {
		$jumlah += 1;
		echo "ERROR";
		flush();
		sleep(0); /** Delay **/		
	} else {
		echo "$x. [\e[1;31m $authorceo \e[0m] | URL : [\e[1;34m $url 
\e[0m] [\e[1;33m $ip:$port \e[0m] [ \e[1;92mSUCCESS ]\e[0m\n";
		flush();
		sleep(0); /** Delay **/		
	}
}
}
echo "\n\e[1;31mSUCCESS : Silahkan Cek Blog Kalian !\e[0m\n";
?>
