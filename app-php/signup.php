<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//header("Content-type: application/json; charset=utf-8");

include_once 'func.php';
$link = connectMysql();

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$name = $data['name'];
$password = $data['password'];
$token = $data['token'];

$ip = '[here is your server domain or ip]';

if ($name == null || $password == null || $token != 'XeuhrQVN2NhadNFcmwClVXrB0pEGkIuH') HTTPStatus(403);
else
{
    $link = ConnectMySQL();
    $path = "https://{$ip}/app/live/{$name}.m3u8";
    $time = getTime();
    $sql = "insert into app.account(name, password, path, registTime, lastLogin, attemptNum)
            values ('$name','$password','$path','$time','$time',0)";
    $result = mysqli_query($link, $sql);
    if (isset($result))
    {
        if ($result)
        {
            echo "注册成功您的帐号为: {$name}";
        }
        else
        {
            echo '注册失败，尝试换一个用户名';
        }
    }
    sortID($link);
}

mysqli_close($link);
