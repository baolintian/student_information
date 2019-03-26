<?php
/**
 * Created by PhpStorm.
 * User: C.Y.Y
 * Date: 2018/12/5 0005
 * Time: 20:59
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
        $this->conn->query("set names utf8");
    }

    function student_DELETE($sno)
    {

        $sql = "Delete FROM student WHERE sno= $sno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function class_DELETE($classno)
    {

        $sql = "Delete FROM class WHERE classno= $classno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function dept_major_DELETE($majno)
    {

        $sql = "Delete FROM dept-major WHERE majno= $majno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function dept_apart_DELETE($deptno)
    {

        $sql = "Delete FROM dept-apart WHERE deptno= $deptno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function dept_DELETE($deptno)
    {

        $sql = "Delete FROM dept WHERE deptno= $deptno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function association_DELETE($assno)
    {

        $sql = "Delete FROM association WHERE assno= $assno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function stu_ass_DELETE($sno,$assno)
    {

        $sql = "Delete FROM stu-ass WHERE sno= $sno AND assno=$assno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function course_DELETE($cno)
    {

        $sql = "Delete FROM course WHERE cno= $cno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }

    function sc_DELETE($sno,$cno)
    {

        $sql = "Delete FROM sc WHERE sno= $sno AND cno=$cno";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "记录删除成功";
        }
    }
    public function dbclose()
    {
        @mysqli_close($this->coon);
    }


}


?>