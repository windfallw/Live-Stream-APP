<?php
date_default_timezone_set('PRC');

function connectMysql()
{
    $hostname = 'localhost:3306';
    $username = '[PLEASE INPUT]';
    $password = '';
    $link = @mysqli_connect($hostname, $username, $password) or die('数据库服务器连接失败');
    mysqli_select_db($link, '[PLEASE INPUT]') or die('没有找到数据库');
    mysqli_query($link, 'set names utf8');
    return $link;
}

function getTime()
{
    return date('Y-m-d H:i:s', time());
}

function sortID($link)
{
    //对数据库的id列进行排序,保证数据删除后id列仍按顺序排序
    $deleteID = 'ALTER TABLE app.account DROP id';
    $addID = 'ALTER TABLE app.account
     ADD id INT(20) NOT NULL AUTO_INCREMENT FIRST,
     ADD PRIMARY KEY (id)';
    mysqli_query($link, $deleteID);
    mysqli_query($link, $addID);
}

function HTTPStatus($num)
{
    $http_protocol = "HTTP/1.0";
    if (isset($_SERVER['SERVER_PROTOCOL']) && stripos($_SERVER['SERVER_PROTOCOL'], "HTTP") >= 0)
    {
        $http_protocol = $_SERVER['SERVER_PROTOCOL'];
    }
    $http = array (100 => $http_protocol . ' 100 Continue', 101 => $http_protocol . ' 101 Switching Protocols', 200 => $http_protocol . ' 200 OK', 201 => $http_protocol . ' 201 Created',
                   202 => $http_protocol . ' 202 Accepted', 203 => $http_protocol . ' 203 Non-Authoritative Information', 204 => $http_protocol . ' 204 No Content',
                   205 => $http_protocol . ' 205 Reset Content', 206 => $http_protocol . ' 206 Partial Content', 300 => $http_protocol . ' 300 Multiple Choices',
                   301 => $http_protocol . ' 301 Moved Permanently', 302 => $http_protocol . ' 302 Found', 303 => $http_protocol . ' 303 See Other', 304 => $http_protocol . ' 304 Not Modified',
                   305 => $http_protocol . ' 305 Use Proxy', 307 => $http_protocol . ' 307 Temporary Redirect', 400 => $http_protocol . ' 400 Bad Request', 401 => $http_protocol . ' 401 Unauthorized',
                   402 => $http_protocol . ' 402 Payment Required', 403 => $http_protocol . ' 403 Forbidden', 404 => $http_protocol . ' 404 Not Found',
                   405 => $http_protocol . ' 405 Method Not Allowed', 406 => $http_protocol . ' 406 Not Acceptable', 407 => $http_protocol . ' 407 Proxy Authentication Required',
                   408 => $http_protocol . ' 408 Request Time-out', 409 => $http_protocol . ' 409 Conflict', 410 => $http_protocol . ' 410 Gone', 411 => $http_protocol . ' 411 Length Required',
                   412 => $http_protocol . ' 412 Precondition Failed', 413 => $http_protocol . ' 413 Request Entity Too Large', 414 => $http_protocol . ' 414 Request-URI Too Large',
                   415 => $http_protocol . ' 415 Unsupported Media Type', 416 => $http_protocol . ' 416 Requested Range Not Satisfiable', 417 => $http_protocol . ' 417 Expectation Failed',
                   500 => $http_protocol . ' 500 Internal Server Error', 501 => $http_protocol . ' 501 Not Implemented', 502 => $http_protocol . ' 502 Bad Gateway',
                   503 => $http_protocol . ' 503 Service Unavailable', 504 => $http_protocol . ' 504 Gateway Time-out', 505 => $http_protocol . ' 505 HTTP Version Not Supported',);
    header($http[$num]);
    return array ('code' => $num, 'error' => $http[$num],);
}
