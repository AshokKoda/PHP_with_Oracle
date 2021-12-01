create table erptable
(
 erpid number(10) primary key not null,
 currentdate varchar(10) not null,
 shift varchar(10) not null,
 display varchar(100) not null
);

DROP TABLE erp;



create sequence erptable_sequence;

CREATE OR REPLACE TRIGGER erptable_on_insert
  BEFORE INSERT ON erptable
  FOR EACH ROW
BEGIN
  SELECT erptable_sequence.nextval
  INTO :new.erpid
  FROM dual;
END;

select * from erptable;

select * from erp;

truncate table erptable;

INSERT INTO erptable(datetime, shift, display) values ('21/11/2021', 'A','Insert some deatils into block');
