select * from logdata

create table logdata
(
 log_id number not null,
 logdate varchar(50) not null,
 executive varchar(100) not null,
 shift varchar(100) not null,
 bfappserver1 varchar(100),
 bfappstorage varchar(50),
 bfxml varchar(50),
 bfappserver2 varchar(50),
 bfdbstorage varchar(50),
 bfmimic varchar(50),
 bfdbserver1 varchar(50),
 bffirewall varchar(50),
 bfl2hmi varchar(50),
 bfdbserver2 varchar(50),
 bfnwswitch varchar(50),
 bfl1opc varchar(50),
 bfdcserver1 varchar(50),
 bfl2hmipc varchar(50),
 bfl2services varchar(50),
 bfdcserver2 varchar(50),
 bfbhs1pc varchar(50),
 bfl3erp varchar(50),
 bfdevpc varchar(50),
 bfcrl2pc varchar(50),
 bfportal varchar(50),
 bflabpc varchar(50),
 bfremotepc varchar(50)
);

INSERT INTO logdata(logdate,shift) values ('01-10-2021','A');

create sequence logdata_sequence;

CREATE OR REPLACE TRIGGER logdata_on_insert
  BEFORE INSERT ON logdata
  FOR EACH ROW
BEGIN
  SELECT logdata_sequence.nextval
  INTO :new.log_id
  FROM dual;
END;

truncate table logdata

select * from logdata

select log_id, executive from logdata

INSERT INTO logdata(logdate,executive,shift,bfappserver1,bfappstorage,bfxml,bfappserver2,bfdbstorage,bfmimic,
bfdbserver1,bffirewall,bfl2hmi,bfdbserver2,bfnwswitch,bfl1opc,bfdcserver1,bfl2hmipc,bfl2services,
bfdcserver2,bfbhs1pc,bfl3erp,bfdevpc,bfcrl2pc,bfportal,bflabpc,bfremotepc) 
    values ('01/10/2021','Test 2','B','Ok','Ok','Running','Ok','Ok','Running','Ok','Ok','Running','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','Ok','ok');
<============================bf2======================>

ALTER TABLE logdata MODIFY bf2appserver1 varchar(50) NOT NULL;
ALTER TABLE logdata ADD bf2appstorage varchar(100);
ALTER TABLE logdata ADD bf2xml varchar(100);
ALTER TABLE logdata ADD bf2appserver2 varchar(100);
ALTER TABLE logdata ADD bf2dbstorage varchar(100);
ALTER TABLE logdata ADD bf2mimic varchar(100);
ALTER TABLE logdata ADD bf2dbserver1 varchar(100);
ALTER TABLE logdata ADD bf2firewall varchar(100);
ALTER TABLE logdata ADD bf2l2hmi varchar(100);
ALTER TABLE logdata ADD bf2dbserver2 varchar(100);
ALTER TABLE logdata ADD bf2nwswitch varchar(100);
ALTER TABLE logdata ADD bf2l1opc varchar(100);
ALTER TABLE logdata ADD bf2dcserver1 varchar(100);
ALTER TABLE logdata ADD bf2l2hmipc varchar(100);
ALTER TABLE logdata ADD bf2l2services varchar(100);
ALTER TABLE logdata ADD bf2dcserver2 varchar(100);
ALTER TABLE logdata ADD bf2bhs1pc varchar(100);
ALTER TABLE logdata ADD bf2l3erp varchar(100);
ALTER TABLE logdata ADD bf2webserver varchar(100);
ALTER TABLE logdata ADD bf2crl2 varchar(100);
ALTER TABLE logdata ADD bf2portal varchar(100);
ALTER TABLE logdata ADD bf2devpc varchar(100);
ALTER TABLE logdata ADD bf2remotepc varchar(100);
ALTER TABLE logdata ADD bf2labpc varchar(100);

<=======================End=================>

<================BF3============================>
ALTER TABLE logdata ADD bf3appserver1 varchar(50);
ALTER TABLE logdata ADD bf3appstorage varchar(100);
ALTER TABLE logdata ADD bf3hsmodel varchar(100);
ALTER TABLE logdata ADD bf3appserver2 varchar(100);
ALTER TABLE logdata ADD bf3dbstorage varchar(100);
ALTER TABLE logdata ADD bf3sachem varchar(100);
ALTER TABLE logdata ADD bf3dbserver1 varchar(100);
ALTER TABLE logdata ADD bf3firewall varchar(100);
ALTER TABLE logdata ADD bf3xml varchar(100);
ALTER TABLE logdata ADD bf3dbserver2 varchar(100);
ALTER TABLE logdata ADD bf3nwswitch varchar(100);
ALTER TABLE logdata ADD bf3mimic varchar(100);
ALTER TABLE logdata ADD bf3dcserver1 varchar(100);
ALTER TABLE logdata ADD bf3l2hmipc varchar(100);
ALTER TABLE logdata ADD bf3l2hmi varchar(100);
ALTER TABLE logdata ADD bf3dcserver2 varchar(100);
ALTER TABLE logdata ADD bf3labpc varchar(100);
ALTER TABLE logdata ADD bf3l1opclink varchar(100);
ALTER TABLE logdata ADD bf3webserver varchar(100);
ALTER TABLE logdata ADD bf3crl2 varchar(100);
ALTER TABLE logdata ADD bf3l2service varchar(100);
ALTER TABLE logdata ADD bf3devpc varchar(100);
ALTER TABLE logdata ADD bf3erp varchar(100);
ALTER TABLE logdata ADD bf3portal varchar(100);
<===================End============>
select * from logdata

<=============BF LEVEL-2 Room Environment Status=======>
ALTER TABLE logdata ADD bf1temp varchar(50);
ALTER TABLE logdata ADD bf2temp varchar(100);
ALTER TABLE logdata ADD bf3temp varchar(100);
ALTER TABLE logdata ADD remarks varchar(100);

ALTER TABLE logdata ADD bf1ac varchar(100);
ALTER TABLE logdata ADD bf2ac varchar(100);
ALTER TABLE logdata ADD bf3ac varchar(100);
ALTER TABLE logdata ADD remarksac varchar(100);

ALTER TABLE logdata ADD bf1ups varchar(100);
ALTER TABLE logdata ADD bf2ups varchar(100);
ALTER TABLE logdata ADD bf3ups varchar(100);
ALTER TABLE logdata ADD remarksups varchar(100);

ALTER TABLE logdata ADD bf1backup varchar(100);
ALTER TABLE logdata ADD bf2backup varchar(100);
ALTER TABLE logdata ADD bf3backup varchar(100);
ALTER TABLE logdata ADD remarksback varchar(100);

ALTER TABLE logdata ADD bf1back varchar(100);
ALTER TABLE logdata ADD bf2back varchar(100);
ALTER TABLE logdata ADD bf3back varchar(100);
ALTER TABLE logdata ADD downtime varchar(100);
<===================End============>
select * from logdata

<==================PMs Done================>
ALTER TABLE logdata ADD area varchar(100);
ALTER TABLE logdata ADD device varchar(100);
ALTER TABLE logdata ADD job varchar(100);
ALTER TABLE logdata ADD abnormal varchar(100);
ALTER TABLE logdata ADD pmremarks varchar(100);
<===================End============>
select * from logdata

<==================Customer Complaints================>
ALTER TABLE logdata ADD sno varchar(100);
ALTER TABLE logdata ADD person varchar(100);
ALTER TABLE logdata ADD dess varchar(100);
ALTER TABLE logdata ADD reptime varchar(100);
ALTER TABLE logdata ADD acttime varchar(100);
ALTER TABLE logdata ADD closetime varchar(100);
ALTER TABLE logdata ADD curemarks varchar(100);
ALTER TABLE logdata DROP COLUMN des;
ALTER TABLE logdata ADD dess varchar(100);
<===================End============>
select * from logdata

<==================Other Jobs Done/ Taken Up================>
ALTER TABLE logdata ADD ssno varchar(100);
ALTER TABLE logdata ADD locperson1 varchar(100);
ALTER TABLE logdata ADD locperson2 varchar(100);
ALTER TABLE logdata ADD locperson3 varchar(100);
<===================End============>
select * from logdata

<==================Other Information================>
ALTER TABLE logdata ADD information varchar(100);
<===================End============>
select * from logdata
