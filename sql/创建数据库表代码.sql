create table dept (
	deptno char(4) primary key, 
	deptname char(4), 
	deptp char(20), 
	deptnum int);
create table dept_major(
	deptno char(4) , 
	majno char(4) primary key, 
	foreign key(deptno) references dept(deptno));

create table dept_apart(
	deptno char(4) primary key , 
	apartno varchar(6));


create table association(
	assno char(10) primary key, 
	assname varchar(20), 
	assyear int, 
	assp varchar(20));
create table class(
	classno varchar(10) primary key, 
	inyear int, 
	deptno char(4), 
	classnum int, 
	foreign key(deptno) references dept(deptno));
//添加约束条件
create table student(
	sno varchar(20) primary key, 
	sname varchar(10), 
	sage int, 
	sex ENUM('男', '女') COLLATE utf8_estonian_ci, 
	classno varchar(10), 
	foreign key(classno) references class(classno) on UPDATE CASCADE);

ALTER TABLE `student` ADD UNIQUE(`sno`);

create table stu_ass(
	sno varchar(20), 
	assno char(10), 
	sinyear int, 
	foreign key(sno) references student(sno), 
	foreign key(assno) references association(assno));