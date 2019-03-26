<?php

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

    function Student_ADD($sno,$sname,$sage,$sex,$classno)
    {
        echo "in pre", '</br>';
        echo $sno, $sname, $sage, $sex, $classno;
        $sql = "INSERT INTO student VALUE($sno,'$sname',$sage,'$sex',$classno)";
          $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
            {
             echo "新记录插入成功";
            }
    }

    function Class_ADD($classno,$inyear,$deptno,$classnum)
    {
        $sql = "INSERT INTO class VALUE ('$classno','$inyear','$deptno','$classnum')";
          $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
            {
            echo "新记录插入成功";
        }
    }


    function  dept_major_ADD ($deptno,$majno)
    {

        $sql = "INSERT INTO dept-major VALUE('$deptno','$majno' ) ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "新记录插入成功";
        }
    }

    function  dept_apart_ADD ($deptno,$apartno)
    {

        $sql = "INSERT INTO dept-apart VALUE('$deptno','$apartno' ) ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "新记录插入成功";
        }
    }


    function Dept_ADD($deptno,$deptname,$deptp,$deptnum)
    {
        $sql = "INSERT INTO dept VALUE ('$deptno','$deptname','$deptp','$deptnum')";
          $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>" ;
        }
        else
        {
            echo "新记录插入成功";
        }
    }
    function Association_ADD($assno,$assname,$assyear,$assp)
    {
        $sql = "INSERT INTO association VALUE ('$assno','$assname','$assyear','$assp')";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>" ;
        }
        else
        {
            echo "新记录插入成功";
        }
    }

    function  stu_ass_ADD ($sno,$assno,$sinyear)
    {

        $sql = "INSERT INTO stu-ass VALUE('$sno','$assno','$sinyear' ) ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "新记录插入成功";
        }
    }

    function  course_ADD ($cno,$cname,$credit)
    {

        $sql = "INSERT INTO course VALUE('$cno','$cname','$credit' ) ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "新记录插入成功";
        }
    }

    function  sc_ADD ($sno,$cno,$grade)
    {

        $sql = "INSERT INTO sc VALUE('$sno','$cno','$grade' ) ";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {
            echo "新记录插入成功";
        }
    }
    public function dbclose()
    {
        @mysqli_close($this->coon);
    }
}
?>