//视图
CREATE VIEW ass_stunum(assno,assname,stunum)
AS 
SELECT association.assno,MIN(assname),COUNT(sno)
FROM association,stu_ass 
WHERE association.assno = stu_ass.assno 
GROUP BY association.assno;

//三个触发器
CREATE TRIGGER Insert_Stu
AFTER INSERT ON student
FOR EACH ROW
UPDATE class SET classnum=classnum+1
WHERE classno=new.classno

CREATE TRIGGER Delete_Stu_
AFTER DELETE ON student
FOR EACH ROW
UPDATE class SET classnum=classnum-1
WHERE class.classno=old.classno;

CREATE TRIGGER Update_Class
AFTER UPDATE ON class
FOR EACH ROW
BEGIN
    IF(new.classnum>old.classnum)THEN 
        UPDATE dept SET deptnum=deptnum+1 WHERE deptno=new.deptno;
    
    ELSEIF(new.classnum<old.classnum) THEN 
        UPDATE dept SET deptnum=deptnum-1 WHERE deptno=old.deptno;
    END IF;
END


