
<?php
/**
 * Created by PhpStorm.
 * User: 宝宝天龙
 * Date: 2018/11/30
 * Time: 14:20
 */
header("Content-type: text/html; charset=utf-8");
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'student_management';
$charName = 'utf-8';
$mysqlobj = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
mysqli_set_charset($mysqlobj,"utf8");

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
echo $name_get, $password_get, '</br>';
$strsql = "SELECT * FROM login where Uname = '$name_get'AND Upass = '$password_get'";
$result = $mysqlobj->query($strsql);
$len = mysqli_num_rows($result);
if($len <> 0){
    echo " 3秒后到达主页面";
    header("Refresh:3; url=../../query/front/index.html");
}
else{
    echo "failure";
    header("Refresh:3; url=../index.html");
}
