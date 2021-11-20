//validate form
function validate() {
    if ((document.getElementById("p_project_type").value == null) || (document.getElementById("p_project_type").value == "")) {
      alert("select project type");
      document.getElementById("p_project_type").focus();
      return false;
    }
  
  
    if ((document.getElementById("p_app_grp_id").value == null) || (document.getElementById("p_app_grp_id").value == "")) {
      alert("select group type");
      document.getElementById("p_app_grp_id").focus();
      return false;
    }
  
  
    if ((document.getElementById("p_proj_name").value == null) || (document.getElementById("p_proj_name").value == "")) {
      alert("Please enter project name");
      document.getElementById("p_proj_name").focus();
      return false;
    }
  
    if ((document.getElementById("p_proj_acronym").value == null) || (document.getElementById("p_proj_acronym").value == "")) {
      alert("Please enter acronym");
      document.getElementById("p_proj_acronym").focus();
      return false;
    }
  
    if ((document.getElementById("p_dept_cd").value == null) || (document.getElementById("p_dept_cd").value == "")) {
      alert("select customer department");
      document.getElementById("p_dept_cd").focus();
      return false;
    }
  
  
    if ((document.getElementById("p_e_no_cont").value == null) || (document.getElementById("p_e_no_cont").value == "")) {
      alert("Please select customer name");
      document.getElementById("p_e_no_cont").focus();
      return false;
    }
  
    if ((document.getElementById("p_e_no_cust").value == null) || (document.getElementById("p_e_no_cust").value == "")) {
      alert("Please select contact person");
      document.getElementById("p_e_no_cust").focus();
      return false;
    }
  
    if ((document.getElementById("p_e_mobile_cont").value == null) || (document.getElementById("p_e_mobile_cont").value == "")) {
      alert("Please enter phone number");
      document.getElementById("p_e_mobile_cont").focus();
      return false;
    }
  
    if ((document.getElementById("p_e_mail_id_cont").value == null) || (document.getElementById("p_e_mail_id_cont").value == "")) {
      alert("Please enter email");
      document.getElementById("p_e_mail_id_cont").focus();
      return false;
    }
    if ((document.getElementById("p_team_size").value == null) || (document.getElementById("p_team_size").value == "")) {
      alert("Please enter team size");
      document.getElementById("p_team_size").focus();
      return false;
    }
    if ((document.getElementById("p_schedule_months").value == null) || (document.getElementById("p_schedule_months").value == "")) {
      alert("Please enter Scheduled month");
      document.getElementById("p_schedule_months").focus();
      return false;
    }
  
    if ((document.getElementById("p_date_started").value == null) || (document.getElementById("p_date_started").value == "")) {
      alert("Please select start date ");
      document.getElementById("p_date_started").focus();
      return false;
    }
    if ((document.getElementById("p_date_target").value == null) || (document.getElementById("p_date_target").value == "")) {
      alert("Please select end date");
      document.getElementById("p_date_target").focus();
      return false;
    }
    if ((document.getElementById("p_est_efforts").value == null) || (document.getElementById("p_est_efforts").value == "")) {
      alert("Please enter estimated effort");
      document.getElementById("p_est_efforts").focus();
      return false;
    }
    if ((document.getElementById("p_est_size").value == null) || (document.getElementById("p_est_size").value == "")) {
      alert("Please enter estimated size");
      document.getElementById("p_est_size").focus();
      return false;
    }
    if ((document.getElementById("p_e_no_proj_mgr").value == null) || (document.getElementById("p_e_no_proj_mgr").value == "")) {
      alert("Please select project manager");
      document.getElementById("p_e_no_proj_mgr").focus();
      return false;
    }
    if ((document.getElementById("p_reasons_nosize").value == null) || (document.getElementById("p_reasons_nosize").value == "")) {
      alert("Please enter reason");
      document.getElementById("p_reasons_nosize").focus();
      return false;
    }
  
    return true;
  }