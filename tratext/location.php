<?php
error_reporting(0);

# Kullanıcının ip adresini alıyoruz. Linux Sunucu için HTTP_CLIENT_IP, localde REMOTE_ADDR kullanın.

function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ',')) {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = @$_SERVER['HTTP_CLIENT_IP'];
    }
    return $ip;
}

## Kullanıcının lokasyon bilgisi hiç alınmadıysa lokasyon bilgisini alıyoruz. 

if(!isset($_SESSION['location_info'])) {
    //$ip = $_REQUEST['HTTP_CLIENT_IP']; // the IP address to query
    //var_dump( GetIP() );
    $query = unserialize(file_get_contents('http://ip-api.com/php/' . GetIP()));
    if ($query && $query['status'] == 'success') {
        $_SESSION['location_info'] = $query['countryCode'];
        //echo $_SESSION['location_info'];
    } else {
        $_SESSION['location_info'] = "UNK";
        //echo  'olmadý';
    }
}







