<?php
   //WORKING CODE.
   
   $conn = oci_connect('hdk', 'hdk', 'devpdb1');
   
   //print_r ($_POST);
   
   //requesting ID'S from database
   $p_proj_name=$_REQUEST['p_proj_name'];
   $p_proj_acronym=$_REQUEST['p_proj_acronym'];
   $p_dept_cd=$_REQUEST['p_dept_cd'];
   $p_e_no_cust=$_REQUEST['p_e_no_cust'];
   $p_e_no_cont=$_REQUEST['p_e_no_cont'];
   $p_e_mobile_cont=$_REQUEST['p_e_mobile_cont'];
   $p_e_mail_id_cont=$_REQUEST['p_e_mail_id_cont'];
   $p_project_type=$_REQUEST['p_project_type'];
   $p_schedule_months=$_REQUEST['p_schedule_months'];
   $p_team_size=$_REQUEST['p_team_size'];
   $p_date_started=$_REQUEST['p_date_started'];
   $p_date_target=$_REQUEST['p_date_target'];
   $p_est_efforts=$_REQUEST['p_est_efforts'];
   $p_est_size=$_REQUEST['p_est_size'];
   $p_app_grp_id=$_REQUEST['p_app_grp_id'];
   $p_e_no_proj_mgr=$_REQUEST['p_e_no_proj_mgr'];
   $p_reasons_nosize=$_REQUEST['p_reasons_nosize'];
   $p_id_user_entered=$_REQUEST['p_id_user_entered'];
   $p_it_dvp_proj_id_for_mrf='';
   $p_hod_approved='P';
   $p_recommend_flag='N';
   $p_mail_user_entered='tvkrao@vizagsteel.com';
   $p_project_id='';
   
   
   //if  result returns zero there is no complication
   
   $RESULT='';
   
   /*echo "<br>" ;
   echo $p_proj_name;
   
   echo "<br>" ;
   echo $p_proj_acronym;
   
   echo "<br>" ;
   echo $p_dept_cd;
   
   echo "<br>" ;
   echo $p_e_no_cust;
   
   echo "<br>" ;
   echo $p_e_no_cont;
   
   echo "<br>" ;
   echo $p_e_mobile_cont;
   
   echo "<br>" ;
   echo $p_e_mail_id_cont;
   
   echo "<br>" ;
   echo $p_project_type;
   
   echo "<br>" ;
   echo $p_schedule_months;
   
   echo "<br>" ;
   echo $p_team_size;
   
   echo "<br>" ;
   echo $p_date_started;
   
   echo "<br>" ;
   echo $p_date_target;
   
   echo "<br>" ;
   echo $p_est_efforts;
   
   echo "<br>" ;
   echo $p_est_size;
   
   echo "<br>" ;
   echo $p_app_grp_id;
   
   echo "<br>" ;
   echo $p_e_no_proj_mgr;
   
   echo "<br>" ;
   echo $p_reasons_nosize;
   
   echo "<br>" ;
   echo $p_id_user_entered;*/
   
   
   echo "<br>" ;
      
   //stored procedure to create pan
   
   $sql = "begin".
   
           ":result := pan.create_pan(p_proj_name => :p_proj_name,".
           "p_proj_acronym => :p_proj_acronym,".
           "p_dept_cd => :p_dept_cd,".
           "p_e_no_cust => :p_e_no_cust,".
           "p_e_no_cont => :p_e_no_cont,".
           "p_e_mobile_cont => :p_e_mobile_cont,".
           "p_e_mail_id_cont => :p_e_mail_id_cont,".
           "p_project_type => :p_project_type,".
           "p_schedule_months => :p_schedule_months,".
           "p_team_size => :p_team_size,".
           "p_date_started => :p_date_started,".
           "p_date_target => :p_date_target,".
           "p_est_efforts => :p_est_efforts,".
           "p_est_size => :p_est_size,".
           "p_app_grp_id => :p_app_grp_id,".
           "p_e_no_proj_mgr => :p_e_no_proj_mgr,".
           "p_reasons_nosize => :p_reasons_nosize,".
           "p_id_user_entered => :p_id_user_entered,".
           "p_it_dvp_proj_id_for_mrf => :p_it_dvp_proj_id_for_mrf,".
           "p_hod_approved => :p_hod_approved,".
           "p_recommend_flag => :p_recommend_flag,".
           "p_mail_user_entered => :p_mail_user_entered,".
           "p_project_id => :p_project_id);".
   "end;";
   
   
           //echo $sql;
   
   
   
   $stid = oci_parse($conn, $sql );
   //binding values
   oci_bind_by_name($stid, ":result", $RESULT, 3000);
   
   oci_bind_by_name($stid, ':p_proj_name',$p_proj_name);
   oci_bind_by_name($stid, ':p_proj_acronym',$p_proj_acronym);
   oci_bind_by_name($stid, ':p_dept_cd',$p_dept_cd);
   oci_bind_by_name($stid, ':p_e_no_cust',$p_e_no_cust);
   oci_bind_by_name($stid, ':p_e_no_cont',$p_e_no_cont);
   oci_bind_by_name($stid, ':p_e_mobile_cont',$p_e_mobile_cont);
   oci_bind_by_name($stid, ':p_e_mail_id_cont',$p_e_mail_id_cont);
   oci_bind_by_name($stid, ':p_project_type',$p_project_type);
   oci_bind_by_name($stid, ':p_schedule_months',$p_schedule_months);
   oci_bind_by_name($stid, ':p_team_size',$p_team_size);
   oci_bind_by_name($stid, ':p_date_started',$p_date_started);
   oci_bind_by_name($stid, ':p_date_target',$p_date_target);
   oci_bind_by_name($stid, ':p_est_efforts',$p_est_efforts);
   oci_bind_by_name($stid, ':p_est_size',$p_est_size);
   oci_bind_by_name($stid, ':p_app_grp_id',$p_app_grp_id);
   oci_bind_by_name($stid, ':p_e_no_proj_mgr',$p_e_no_proj_mgr);
   oci_bind_by_name($stid, ':p_reasons_nosize',$p_reasons_nosize);
   oci_bind_by_name($stid, ':p_id_user_entered',$p_id_user_entered);
   oci_bind_by_name($stid, ':p_it_dvp_proj_id_for_mrf',$p_it_dvp_proj_id_for_mrf);
   oci_bind_by_name($stid, ':p_hod_approved',$p_hod_approved);
   oci_bind_by_name($stid, ':p_recommend_flag',$p_recommend_flag);
   oci_bind_by_name($stid, ':p_mail_user_entered',$p_mail_user_entered);
   oci_bind_by_name($stid, ':p_project_id',$p_project_id, 40);
   oci_execute($stid);
   
   
   
   /*echo "<br>";
   
   echo $p_project_id;
   
   echo "<br>";
   
   echo $RESULT;
   */
   
   
   ?>
<!DOCTYPE html> 
<body>
   <h1>
      <center>
         DATA SUCCESSFULLY SAVED
         <br>
         <br>
         <input type="button" value="Back" onclick="history.back()">
      </center>
   </h1>
</body>
</html>