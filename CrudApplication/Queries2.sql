CREATE TABLE login (
    empid number NOT NULL,
    employeeno varchar(100) NOT NULL,
    empname varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    cpassword varchar(100) NOT NULL,  
    PRIMARY KEY  (empid)
);

select * from login;

create sequence login_sequence;

CREATE OR REPLACE TRIGGER login_on_insert
  BEFORE INSERT ON login
  FOR EACH ROW
BEGIN
  SELECT login_sequence.nextval
  INTO :new.empid
  FROM dual;
END;

select * from erpdata;
drop table erpdata;

create sequence erpdata_sequence;

CREATE OR REPLACE TRIGGER erpdata_on_insert
  BEFORE INSERT ON erpdata
  FOR EACH ROW
BEGIN
  SELECT erpdata_sequence.nextval
  INTO :new.erpid
  FROM dual;
END;

CREATE TABLE erpdata (
    erpid int NOT NULL,
    erpdate varchar(10) NOT NULL,
    erpshift varchar(10) NOT NULL,
    erpdis varchar(100) NOT NULL,
    login_id int,
    PRIMARY KEY (erpid),
    CONSTRAINT FK_erpdatas FOREIGN KEY (login_id)
    REFERENCES login(empid)
);
