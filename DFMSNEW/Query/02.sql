CREATE TABLE dfms_df_mast(
df_id NUMBER NOT NULL PRIMARY KEY,
df_name VARCHAR(50),
df_desc VARCHAR(50)
);

SELECT * FROM dfms_df_mast;

CREATE SEQUENCE dfms_df_mast_sequence;

CREATE OR REPLACE TRIGGER dfms_df_mast_on_insert
  BEFORE INSERT ON dfms_df_mast
  FOR EACH ROW
BEGIN
  SELECT dfms_df_mast_sequence.nextval
  INTO :new.df_id
  FROM dual;
END;

CREATE TABLE dfms_df_columns(
df_col_id NUMBER NOT NULL PRIMARY KEY,
df_col_name VARCHAR(50),
df_col_desc VARCHAR(50),
df_id NUMBER,
FOREIGN KEY (df_id) REFERENCES dfms_df_mast(df_id)
);

SELECT * FROM dfms_df_columns;

CREATE SEQUENCE dfms_df_columns_sequence;

CREATE OR REPLACE TRIGGER dfms_df_columns_on_insert
  BEFORE INSERT ON dfms_df_columns
  FOR EACH ROW
BEGIN
  SELECT dfms_df_columns_sequence.nextval
  INTO :new.df_col_id
  FROM dual;
END;

select df_id,df_name,col_no,null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id=:21)a,
(select col_no from dfms_col_cnt where col_no<=(select df_col from dfms_df_mast where df_id=:21))b order by col_no ";

