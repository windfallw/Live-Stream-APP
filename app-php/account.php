<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

include_once 'func.php';
$link = connectMysql();

$link = ConnectMySQL();
$sql = "select name,path from app.account";
$result = mysqli_query($link, $sql);
$row = $result->fetch_all();
if (isset($result))
{
    if ($result)
    {
        print_r(json_encode($row));
    }
    else
    {
        HTTPStatus(500);
    }
}

mysqli_close($link);