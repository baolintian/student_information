<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/12/4
 * Time: 12:02
 */
class mysql{
    private static $dbhost='localhost';
    private static $dbuser='root';
    private static $dbpassword='';
    private static $dbname='data_student';
    private $conn=null;

    function __construct()
    {
        $this->conn=new mysqli(self::$dbhost,self::$dbuser,self::$dbpassword,self::$dbname);
        if(!$this->conn)
        {
           die("数据库连接失败！".mysqli_connect_error());
        }
        else
        {
            echo "连接成功！";
        }
        $this->conn->query("set names utf8");
    }
    //视图查询，根据学会号查询加入学会的总人数
    function View($Assno)
    {
        $sql="SELECT * FROM ass_stunum where assno = $Assno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }

    }
    //根据学号查询学生信息及所在班级、系、宿舍区
    function Student_select($Sno)
    {
        $sql="SELECT student.*,class.inyear,class.deptno,dept_major.majno,dept_apart.apartno 
              FROM student,class,dept_major,dept_apart 
              where student.classno = class.classno and 
              class.deptno = dept_major.deptno and 
              class.deptno = dept_apart.deptno and 
              student.sno = '$Sno' ";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            echo '查询成功', '</br>';
            return $res;
        }
    }
    function  Call_P()
    {
        $sql="CALL NUM_CHECK()";
        $res=$this->conn->query($sql);
        if ($res == NULL)
        {
            echo "Error: " . $sql . "<br>";
        }
        else
        {

            echo "成功", '</br>';
            $sql="SELECT * FROM temp";
            $res1=$this->conn->query($sql);
            if($res1==NULL)
            {
                echo "查询失败";
                return NULL;
            }
            else
            {
                echo '查询成功', '</br>';
                return $res1;
            }
        }
    }
    //根据系号查询系的相关信息
    function Dept_select($Deptno)
    {
        $sql="SELECT * FROM dept where Deptno = $Deptno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }
    }
    //根据学会号查询学会信息
    function Association_select($Assno)
    {
        $sql="SELECT * FROM association where assno = $Assno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }
    }
    //根据学会号和学号查询相关信息
    function Stu_Ass_select($Sno,$Assno)
    {
        $sql="SELECT * FROM stu_ass where Sno = $Sno and Assno = $Assno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }
    }
    //根据课程号查询课程信息
    function Course_select($Cno)
    {
        $sql="SELECT * FROM course where Cno = $Cno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }
    }
    //根据学生学号和课程号查询成绩
    function SC_select($Sno,$Cno)
    {
        $sql="SELECT * FROM SC where Sno = $Sno and Cno = $Cno";
        $res=$this->conn->query($sql);
        if($res==NULL)
        {
            echo "查询失败";
            return NULL;
        }
        else
        {
            return $res;
        }
    }
    //function Student_update($Sno,$)

    public function dbclose()
    {
        @mysqli_close($this->coon);
    }
}
?>
