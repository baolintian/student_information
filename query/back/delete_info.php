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
<div class="login-form" style="height:900px; width:500px; top:50px;" >


    <div class="signin" style = "position: absolute; top: 3px; left: 10px; right: 10px; ">
        <button onclick="window.location.href='query.html'">基本信息查询</button>

    </div>
    <div class="signin" style = "position: absolute; top: 90px; left: 10px; right: 10px; ">
        <button onclick="window.location.href='add_info.html'">添加学生信息</button>
    </div>
    <div class="signin" style = "position: absolute; top: 180px; left: 10px; right: 10px;">
        <button onclick="window.location.href='delete_info.html'">删除学生信息</button>
    </div>
    <div class="signin" style = "position: absolute; top: 270px; left: 10px; right: 10px;">
        <button onclick="window.location.href='update.html'">修改班号</button>
    </div>
    <div class="signin" style = "position: absolute; top: 360px; left: 10px; right: 10px;">
        <button onclick="window.location.href='view.html'">视图查询</button>
    </div>
    <div class="signin" style = "position: absolute; top: 450px; left: 10px; right: 10px;">
        <button onclick="window.location.href='cursor.html'">游标检测</button>
    </div>


</div>
<div class="bbk" style="height:900px; width:70%; top:50px; left: 520px;" >

    <form action="../back/delete_info.php" method = "post">
        <div style="font-size: 30px; font-family: 'Adobe 楷体 Std R'">学号
            <input type = "text" name = "sno">

            <input type = "submit" value ="提交">


    </form>

    <?php
    require_once "mysql-delete.php";
    header("Content-type: text/html; charset=utf-8");
    $sno = $_POST['sno'];
    $mfgh=new mysql();
    $result =  $mfgh->student_DELETE($sno);
    ?>

</div>
</body>
</html>