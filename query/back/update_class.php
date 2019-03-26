<?php
/**
 * Created by PhpStorm.
 * User: C.Y.Y
 * Date: 2018/12/8 0008
 * Time: 15:00
 */
class mysql
{
    private static $dbhost = 'localhost';
    private static $dbuser = 'root';
    private static $dbpassword = '';
    private static $dbname = 'data_student';
    public $conn = null;

    function __construct()
    {
        $this->conn = new mysqli(self::$dbhost, self::$dbuser, self::$dbpassword, self::$dbname);
        if (!$this->conn)
        {
            die("数据库连接失败！" . $this->conn->connect_error);
        }
        else
        {
            echo "连接成功！";
        }
        $this->conn->query("set sname utf8");
    }

    function UPDATE($oldclassno, $newclassno)
    {
        echo $oldclassno, $newclassno;

        $sql3 = "UPDATE class  SET classno='$newclassno' WHERE classno='$oldclassno' ";
        $res=$this->conn->query($sql3);
        if ($res == NULL)
        {
            echo "Error: " . $sql3 . "<br>";
        }
        else
        {
            echo "class班号更改成功";
        }
        $sql2 = "UPDATE student  SET classno='$newclassno' WHERE classno='$oldclassno'";
        $res=$this->conn->query($sql2);
        if ($res == NULL)
        {
            echo "Error: " . $sql2 . "<br>";
        }
        else
        {
            echo "student班号更改成功";
        }

        $sql = "SELECT classno FROM class WHERE classno=$newclassno ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            return $res;
        }

    }

    public function dbclose()
    {
        @mysqli_close($this->coon);
    }
}
?>