<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'func.php';
$link = ConnectMySQL();

if (isset($_POST['name']) && isset($_POST['password']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    $search = "SELECT * FROM app.account where name='$name'";
    $result = mysqli_query($link, $search);
    $row = mysqli_fetch_row($result);

    if ($result)
    {
        $num = $result->num_rows;

        if ($num > 0)
        {
            $attemptNum = $row[6];

            if ($attemptNum >= 5)
            {
                echo "尝试了{$attemptNum}次登录，请稍后再试。";
            }

            else if ($password == $row[2])
            {
                $time = getTime();
                $update = "UPDATE app.account SET lastLogin= '$time',attemptNum=0 WHERE account.name = '$name'";
                mysqli_query($link, $update);
                echo "登录成功, {$name}欢迎你，上次登录时间: {$row[5]}";
            }

            else
            {
                $attemptNum++;
                $update = "UPDATE app.account SET attemptNum= '$attemptNum' WHERE account.name = '$name'";
                mysqli_query($link, $update);
                echo "密码错误";
            }
        }

        else
        {
            echo '帐号不存在';
        }
    }

    else echo '出错了(数据库查询失败)，请重试。';
}

mysqli_close($link);