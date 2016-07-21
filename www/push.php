<?php 
$urls = array(
    'http://www.smartlei.com/article/37',
);
$api = 'http://data.zz.baidu.com/urls?site=www.smartlei.com&token=yZqU5N8XbiKyZXI0';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
