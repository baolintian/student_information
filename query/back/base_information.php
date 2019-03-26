<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel='stylesheet' type='text/css' />

</head>
<body>

<div class="signin" style = "position: absolute; left: 30px; width: 480px; height: 10px; top: 10px;">
    <button onclick="window.location.href='../front/index.html'">首页</button>

</div>
<div class="login-form" style="height:900px; width:500px; top:10px;" >


    <div class="signin" style = "position: absolute; top: 3px; left: 10px; right: 10px; ">
        <button onclick="window.location.href='../front/query.html'">基本信息</button>

    </div>
    <div class="signin" style = "position: absolute; top: 90px; left: 10px; right: 10px; ">
        <button onclick="window.location.href='index2.html'">点击跳转</button>
    </div>
    <div class="signin" style = "position: absolute; top: 180px; left: 10px; right: 10px;">
        <button onclick="window.location.href='index2.html'">点击跳转</button>
    </div>
    <div class="signin" style = "position: absolute; top: 270px; left: 10px; right: 10px;">
        <button onclick="window.location.href='index2.html'">点击跳转</button>
    </div>
    <div class="signin" style = "position: absolute; top: 450px; left: 10px; right: 10px;">
        <button onclick="window.location.href='index2.html'">点击跳转</button>
    </div>


</div>

<div class="bbk" style="height:900px; width:70%; top:10px; left: 520px;" >


        <div>name:
            <input type = "text" name = "name">
        </div>
        <div>password:
            <input type = "text" name = "password">
        </div>

        <input type = "submit" value ="login">

    <center>
    <?php
    header("Content-type: text/html; charset=utf-8");
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'student_management';
    $charName = 'utf-8';
    $mysqlObj = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
    mysqli_set_charset($mysqlObj,"utf8");

    if(mysqli_connect_errno()){
        echo "connect failed", mysqli_connect_errno();
    }
    else {
        echo "connect success!", '</br>';
    }


    if (!isset($_POST['name'])) {
        die('you don\'dont type anything man.');
    }
    if (!isset($_POST['password'])) {
        die('you don\'dont type anything man.');
    }
    $name_get = $_POST['name'];
    $password_get = $_POST['password'];
    echo $name_get, $password_get;

    $strsql = "SELECT * FROM student where Sno = $name_get";

    $result = $mysqlObj->query($strsql);
    echo '<table border=1px bgcolor="#7fffd4"><tr>';
    echo '<tr><td>ID</td><td>姓名</td><td>邮箱</td><td>电话</td><td>地址</td></tr>';
    echo '</tr></table>';
    if($result instanceof mysqli_result){
        echo "The following are the results", "<br/>";
        while($row = $result->fetch_object()){
            echo "田宝林", "<br/>";
            echo $row->Sno. $row->Sname. "<br/>";
        }
    }

    ?>
    </center>
</div>
</body>
</html>