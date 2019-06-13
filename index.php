<?
$requestParams = $_REQUEST;
$requestHeader = apache_request_headers();
$requestBody = file_get_contents('php://input');

$data = array(
    "requestHeader"=> $requestHeader,
    "requestParams"=> $requestParams, 
    "requestBody"=> json_decode($requestBody, true)
);

$date = date('dmyhis');
$fp = fopen('response/response-'.$date.'.log', 'w');
fwrite($fp, json_encode($data));
fclose($fp);

header('HTTP/1.0 250 Success');
echo "250";