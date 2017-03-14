<?php

require_once 'location.php';

// Bu fonksiyon metnin translate işlemini yapıyor. Yandex API Key edinerek işleminizi yapabilirsiniz.

function translator($text, $key = ''){
    
    # Öncelikle metnin hangi dil olduğunu alıyoruz. Burada hint değeri metnin muhtemel olarak hangi dillerden olabileceğini belirtiyor. O alana istediğiniz kadar ülke kodu girebilirsiniz.

    $detect_language =  file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?hint=en,de&key=". $key . "&text=" . $text);

    # String ifadenin içerisinden ülke kodunu ayrıştırıyoruz.

    $explode = explode(':', $detect_language);
    $country_code =  str_replace(['"', '}'], ['',''], $explode[2]) ;

    # Çevirme işlemini yapıyoruz. 

    $data = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&lang='. $country_code .'-'.strtolower($_SESSION['location_info']).'&text='.$text);
    $json = json_decode($data);
    echo $json->text[0];
}

// Metin, kullanıcının lokasyon bilgisi ile aynı değilse 'Translate' yazısı çıksın. Bu fonksiyon bu işlemi yapıyor.

function show_translate_string($text, $key = '') {
    $detect_language =  file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?hint=en,de,tr,es,be,br,cn,ba&key=". $key . "&text=" . $text);

    $explode = explode(':', $detect_language);
    $country_code =  str_replace(['"', '}'], ['',''], $explode[2]) ;

    if($country_code != strtolower($_SESSION['location_info'])) {
?>    
    <small class="pull-right translate" role="button"><b>Translate</b></small><hr>
    <small class="trans_string"></small>

<?php
    }
}


# Çevirme işlemini asenkron olarak post ettiğimizde fonksiyonumuzu tetikleyelim.

if(isset($_POST['text'])) {
    translator($_POST['text']);
}

