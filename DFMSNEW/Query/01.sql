select * from dfms_df_mast
select * from dfms_df_col
select * from dfms_col_cnt

truncate table dfms_df_col

select df_id,df_name, null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id=5)a,
(select col_no from dfms_col_cnt where col_no<=(select df_col from dfms_df_mast where df_id=5))b order by col_no


