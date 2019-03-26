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

    <form action="../back/query.php" method = "post">
        <div style="font-size: 30px; font-family: 'Adobe 楷体 Std R'">学号
            <input type = "text" name = "sno">
        </div>

        <input type = "submit" value ="查询">


    </form>

    <?php
    require_once "mysql.php";
    header("Content-type: text/html; charset=utf-8");
    $sno = $_POST['sno'];
    echo '<!-- CSS goes in the document HEAD or added to your external stylesheet -->
            <center>
            <style type="text/css">
            table.imagetable {
                font-family: verdana,arial,sans-serif;
                font-size:30px;
                color:#333333;
                border-width: 1px;
                border-color: #999999;
                border-collapse: collapse;
            }
            table.imagetable th {
                background:#b5cfd2 url(\'cell-blue.jpg\');
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #999999;
            }
            table.imagetable td {
                background:#dcddc0 url(\'cell-grey.jpg\');
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #999999;
            }
            </style>';

    $mfgh=new mysql();
    $result =  $mfgh->Student_select($sno);
    if($result instanceof mysqli_result){
        echo "The following are the results", "<br/>";
        echo '<center><table class="imagetable">
            <tr>
                <th>学号</th><th>姓名</th><th>年龄</th><th>性别</th><th>班号</th><th>系号</th><th>专业号</th><th>宿舍区</th>
            </tr>';
        while($row = $result->fetch_object()){
            echo $row->sno;
            echo '<tr>
                <td>', $row->sno, '</td><td>', $row->sname, '</td><td>', $row->sage, '</td><td>', $row->sex, '</td><td>',  $row->classno, '</td><td>', $row->deptno,  '</td><td>',  $row->majno, '</td><td>', $row->apartno, '</td>
            </tr>';
        }
        echo '</center>';
    }
    ?>

</div>
</body>
</html>