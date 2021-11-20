<?php
   $conn = oci_connect('hdk', 'hdk', 'devpdb1');
   
   //print_r ($_POST);
   
   $p_project_id=$_REQUEST['project_id'];;
   $p_proj_name=$_REQUEST['p_proj_name'];
   $p_proj_acronym=$_REQUEST['p_proj_acronym'];
   $p_dept_cd=$_REQUEST['p_dept_cd'];
   $p_e_no_cust=$_REQUEST['p_e_no_cust'];
   $p_e_no_cont=$_REQUEST['p_e_no_cont'];
   $p_e_mobile_cont=$_REQUEST['p_e_mobile_cont'];
   $p_e_mail_id_cont=$_REQUEST['p_e_mail_id_cont'];
   $p_schedule_months=$_REQUEST['p_schedule_months'];
   $p_team_size=$_REQUEST['p_team_size'];
   $p_date_started=$_REQUEST['p_date_started'];
   $p_date_target=$_REQUEST['p_date_target'];
   $p_est_efforts=$_REQUEST['p_est_efforts'];
   $p_est_size=$_REQUEST['p_est_size'];
   $p_e_no_proj_mgr=$_REQUEST['p_e_no_proj_mgr'];
   $p_reasons_nosize=$_REQUEST['p_reasons_nosize'];
   $p_id_user_modified=$_REQUEST['p_id_user_modified'];
   $p_it_dvp_proj_id_for_mrf='';
   $p_hod_approved='P';
   $p_recommend_flag='N';
   
  $RESULT='';
   
   echo "<br>" ;
      $sql = "begin".
   
           ":result := pan.update_pan(p_project_id => :p_project_id,".
           "p_proj_name => :p_proj_name,".
           "p_proj_acronym => :p_proj_acronym,".
           "p_dept_cd => :p_dept_cd,".
           "p_e_no_cust => :p_e_no_cust,".
           "p_e_no_cont => :p_e_no_cont,".
           "p_e_mobile_cont => :p_e_mobile_cont,".
           "p_e_mail_id_cont => :p_e_mail_id_cont,".
           "p_schedule_months => :p_schedule_months,".
           "p_team_size => :p_team_size,".
           "p_date_started => :p_date_started,".
           "p_date_target => :p_date_target,".
           "p_est_efforts => :p_est_efforts,".
           "p_est_size => :p_est_size,".
           "p_e_no_proj_mgr => :p_e_no_proj_mgr,".
           "p_reasons_nosize => :p_reasons_nosize,".
           "p_id_user_modified => :p_id_user_modified,".
           "p_it_dvp_proj_id_for_mrf => :p_it_dvp_proj_id_for_mrf,".
           "p_hod_approved => :p_hod_approved,".
           "p_recommend_flag => :p_recommend_flag);".
   
   
   "end;";
           echo $sql;
           echo "<br><br>";
   $stid = oci_parse($conn, $sql );
   oci_bind_by_name($stid, ":result", $RESULT, 3000);
   oci_bind_by_name($stid, ':p_project_id',$p_project_id);
   oci_bind_by_name($stid, ':p_proj_name',$p_proj_name);
   oci_bind_by_name($stid, ':p_proj_acronym',$p_proj_acronym);
   oci_bind_by_name($stid, ':p_dept_cd',$p_dept_cd);
   oci_bind_by_name($stid, ':p_e_no_cust',$p_e_no_cust);
   oci_bind_by_name($stid, ':p_e_no_cont',$p_e_no_cont);
   oci_bind_by_name($stid, ':p_e_mobile_cont',$p_e_mobile_cont);
   oci_bind_by_name($stid, ':p_e_mail_id_cont',$p_e_mail_id_cont);
   oci_bind_by_name($stid, ':p_schedule_months',$p_schedule_months);
   oci_bind_by_name($stid, ':p_team_size',$p_team_size);
   oci_bind_by_name($stid, ':p_date_started',$p_date_started);
   oci_bind_by_name($stid, ':p_date_target',$p_date_target);
   oci_bind_by_name($stid, ':p_est_efforts',$p_est_efforts);
   oci_bind_by_name($stid, ':p_est_size',$p_est_size);
   oci_bind_by_name($stid, ':p_e_no_proj_mgr',$p_e_no_proj_mgr);
   oci_bind_by_name($stid, ':p_reasons_nosize',$p_reasons_nosize);
   oci_bind_by_name($stid, ':p_id_user_modified',$p_id_user_modified);
   oci_bind_by_name($stid, ':p_it_dvp_proj_id_for_mrf',$p_it_dvp_proj_id_for_mrf);
   oci_bind_by_name($stid, ':p_hod_approved',$p_hod_approved);
   oci_bind_by_name($stid, ':p_recommend_flag',$p_recommend_flag);
   
   oci_execute($stid);
   echo "<br>";
   //to print values from database
   echo "p_project_id : " .$p_project_id . "<br>";
   echo "p_proj_name : " .$p_proj_name . "<br>";
   echo "p_proj_acronym : " .$p_proj_acronym . "<br>";
   echo "p_dept_cd : " .$p_dept_cd . "<br>";
   echo "p_e_no_cont : " .$p_e_no_cont . "<br>";
   echo "p_e_no_cust : " .$p_e_no_cust . "<br>";
   echo "p_e_mobile_cont : " .$p_e_mobile_cont . "<br>";
   echo "p_e_mail_id_cont : " .$p_e_mail_id_cont . "<br>";
   echo "p_schedule_months : " .$p_schedule_months . "<br>";
   echo "p_team_size : " .$p_team_size . "<br>";
   echo "p_date_started : " .$p_date_started . "<br>";
   echo "p_date_target : " .$p_date_target . "<br>";
   echo "p_est_efforts : " .$p_est_efforts . "<br>";
   echo "p_est_size : " .$p_est_size . "<br>";
   echo "p_e_no_proj_mgr : " .$p_e_no_proj_mgr . "<br>";
   echo "p_reasons_nosize : " .$p_reasons_nosize . "<br>";
   echo "p_id_user_modified : " .$p_id_user_modified . "<br>";
   echo "p_it_dvp_proj_id_for_mrf : " .$p_it_dvp_proj_id_for_mrf . "<br>";
   echo "p_hod_approved : " .$p_hod_approved . "<br>";
   echo "p_recommend_flag : " .$p_recommend_flag . "<br>";
   
   echo "<br>";
   
   echo $RESULT;
   
   echo "<br>";
   
   ?>
<!DOCTYPE html> 
<body>
   <h1>
      <center>
         DATA UPDATED SUCCESSFULLY
         <br>
         <br>
         <input type="button" value="Back" onclick="history.back()">
      </center>
   </h1>
</body>
</html>