CREATE PROCEDURE NUM_CHECK()
BEGIN
	DECLARE local_sum1 int;
	DECLARE Deptno1 char(4);
	DECLARE Deptname1 char(4);
	DECLARE stu_sum1 int;

	DECLARE done BOOLEAN DEFAULT 0;

	DECLARE My_Cursor CURSOR FOR (SELECT deptno,deptname,deptnum FROM dept);
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

	OPEN My_Cursor;
	DROP TEMPORARY TABLE IF EXISTS temp;
    CREATE TEMPORARY TABLE temp(
      deptno CHAR(4),
      deptname CHAR(4),
      old_num INT,
      real_num INT
    );
		myLoop:LOOP
			FETCH My_Cursor into Deptno1,Deptname1,local_sum1;
			IF(done) THEN
				LEAVE myLoop;
			END IF;
			SELECT COUNT(sno) INTO stu_sum1 
			FROM student,class 
			WHERE student.classno = class.classno
				 AND class.deptno = Deptno1 
			GROUP BY class.deptno;
			IF(stu_sum1<>local_sum1) THEN
				UPDATE dept SET deptnum = stu_sum1
				WHERE deptno=Deptno1;
				INSERT INTO temp(deptno,deptname,old_num,real_num) 
				VALUES (Deptno1,Deptname1,local_sum1,stu_sum1);	
			END IF;
		END LOOP myLoop;
		CLOSE My_Cursor;
END
			