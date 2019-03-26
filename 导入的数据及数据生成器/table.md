学生信息(学号， 姓名， 年龄， 性别, 班号)：

student(<u>sno</u>, sname, sage, sex, classno(foreign key))



班级（班号， 入校年份， 系号， 人数）：//系号起连接作用

class(<u>classno</u>, inyear, deptno (foreign key), classnum)



系-专业（系号， 专业号）：

dept-major(deptno, <u>majno</u>)



系-宿舍（系号， 宿舍区）：

dept-apart(<u>deptno</u>(foreign key), apartno)



----------------------------------------------------

+ 以上四个当成一个整体查询



系（系号， 系名， 系办公室， 人数）：

dept(<u>deptno</u>, deptname, deptp, deptnum)



学会（学会号， 学会名， 学会创建年份， 地点）

association(<u>assno</u>, assname, assyear, assp)



学生-学会（学号， 学会号， 入会年份）：

stu-ass(<u>sno</u>(foreign key),  <u>assno</u>(foreign key), sinyear)



课程信息（课程号， 课程名， 学分）

course(<u>cno</u>, cname, credit)



选修（学号， 课程号， 成绩）

sc(<u>sno</u>(foreign key), <u>cno</u>(foreign key), grade)