<style>
   @media (min-width: 992px){
   .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .main-footer, .sidebar-mini.sidebar-collapse .main-header {
   margin-left: 0 !important;
   }
   }
   @media (max-width: 991.98px){
   .content-wrapper{
   margin-left:0!important;
   }
   /* .main-header {
   margin-left: 350px !important;
   } */
   .main-footer{
   margin-left:0px !important;
   }
   }
   @media (max-width: 991.98px){
   .main-sidebar, .main-sidebar:before {
   box-shadow: none !important;
   margin-left: -290px;
   }
   }
   .sidebar-collapse .main-sidebar{
   margin-left:-290px !important;
   }
   @media (max-width: 991.98px){
   .sidebar-mini.sidebar-collapse .content-wrapper ,.sidebar-mini.sidebar-collapse {
   margin-left :0 !important;
   }
   }
</style>
<?php $cur_tab =
   $this->uri->segment(2) == "" ? "dashboard" : $this->uri->segment(2); ?>  
<?php $cur_tab1 =
   $this->uri->segment(3) == "attendance_master"
       ? "attendance_master"
       : ""; ?>  
<?php $cur_tab5 =
   $this->uri->segment(3) == "school_list_exam_for_allocation"
       ? "school_list_exam_for_allocation"
       : ""; ?>  
<?php $cur_tab2 =
   $this->uri->segment(3) == "reports_list" ? "reports_list" : ""; ?>  
<?php $cur_tab3 =
   $this->uri->segment(3) == "exam_list_super_user"
       ? "exam_list_super_user"
       : ""; ?>  
<?php $cur_tab4 =
   $this->uri->segment(3) == "consent_recieved_by_super_user"
       ? "exam_list_super_user"
       : ""; ?>  
<?php $cur_tab6 =
   $this->uri->segment(3) == "downreportbutton" ? "downreportbutton" : ""; ?>  
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <!--   <a href="<?= base_url("admin") ?>" class="brand-link">
      <img src="<?= base_url(
         $this->general_settings["favicon"]
         ) ?>" alt="Logo" class="brand-image img-circle elevation-3"
      
      
      
           style="opacity: .8">
      
      
      
      <span class="brand-text font-weight-light"><?= $this->general_settings[
         "application_name"
         ] ?></span>
      
      
      
      </a> -->
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel py-3 d-flex justify-content-center">
         <div class="info mt-1 p-0">
            <a href="#" class="d-block"><?php echo ucwords(
               $this->session->userdata["username"]
               ) .
               "<br/>" .
               " (" .
               ucwords($this->session->userdata("admin_role")) .
               ")"; ?><br/>
            <?php if ($this->session->userdata("last_login") != "") {
               $dateTime = explode(" ", $this->session->userdata("last_login"));
               $date = $dateTime[0] != "" ? date("d-m-Y", strtotime($dateTime[0])) : "";
               $time = isset($dateTime[1]) ? $dateTime[1] : "";
               } else {
               $date = "";
               $time = "";
               } ?> 
            <?php
               //$addTimeinDate = strtotime("+15 minutes", strtotime($this->session->userdata('last_login'))); echo date("Y-m-d H:i:s", $addTimeinDate);
               ?>
            Last Login IP :  <?php echo $this->session->userdata(
               "last_ip"
               ); ?> <br/>Date & Time <?php echo $date . " " . $time; ?>
            </a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
               $menu = get_sidebar_menu();
               
               foreach ($menu as $nav):
               
                   $sub_menu = get_sidebar_sub_menu($nav["module_id"]);
               
                   $has_submenu = count($sub_menu) > 0 ? true : false;
                   ?>
            <?php if (
               $this->rbac->check_module_permission(
                   $nav["controller_name"]
               )
               ): ?> 
            <li id="<?= $nav[
               "controller_name"
               ] ?>" class="nav-item <?= $has_submenu
               ? "has-treeview"
               : "" ?> has-treeview">
               <a href="<?= base_url(
                  "admin/" . $nav["controller_name"]
                  ) ?>" class="nav-link">
                  <i class="nav-icon fa <?= $nav[
                     "fa_icon"
                     ] ?>"></i>
                  <p>
                     <?= trans($nav["module_name"]) ?>
                     <?= $has_submenu
                        ? '<i class="right fa fa-angle-left"></i>'
                        : "" ?>
                  </p>
               </a>
               <!-- sub-menu -->
               <?php if ($has_submenu): ?>
               <ul class="nav nav-treeview  ">
                  <?php foreach ($sub_menu as $sub_nav):
                     //    $activePAge = $this->uri->segment(2);
                     if (
                         $this->uri->segment(2) == "profile"
                     ) {
                         $activePAge = "View Profile";
                     } elseif (
                         $this->uri->segment(3) ==
                             "exam_list" ||
                         $this->uri->segment(3) ==
                             "addSubjectNew" ||
                         $this->uri->segment(3) ==
                             "view_all_subjectNew" ||
                         $this->uri->segment(3) ==
                             "edit_subject_new" ||
                         $this->uri->segment(3) ==
                             "exam_add" ||
                         $this->uri->segment(3) ==
                             "exam_edit" ||
                         $this->uri->segment(3) == "que_list"
                     ) {
                         $activePAge = "Create Exam Detail";
                     } elseif (
                         $this->uri->segment(2) ==
                             "dashboard" ||
                         $this->uri->segment(3) ==
                             "consent_list" ||
                         $this->uri->segment(2) == "step1" ||
                         $this->uri->segment(2) == "step2" ||
                         $this->uri->segment(2) == "step3" ||
                         $this->uri->segment(2) == "step4" ||
                         $this->uri->segment(2) == "step5" ||
                         $this->uri->segment(2) == "step6" ||
                         $this->uri->segment(2) == "step7" ||
                         $this->uri->segment(3) ==
                             "update_user_info" ||
                         $this->uri->segment(3) ==
                             "consent_add"
                     ) {
                         $activePAge = "Dashboard";
                     } elseif (
                         $this->uri->segment(3) ==
                             "invt_list" ||
                         $this->uri->segment(3) ==
                             "invitation_add" ||
                         $this->uri->segment(3) ==
                             "invitation_preview"
                     ) {
                         $activePAge =
                             "Create Exam Schedule";
                     } elseif (
                         $this->uri->segment(3) ==
                             "app_of_candidate" ||
                         $this->uri->segment(3) ==
                             "candidate_add" ||
                         $this->uri->segment(3) ==
                             "candidate_view" ||
                         $this->uri->segment(3) ==
                             "candidate_edit"
                     ) {
                         $activePAge =
                             "Candidate Applications";
                     } elseif (
                         $this->uri->segment(3) ==
                             "create_letter" ||
                         $this->uri->segment(3) ==
                             "consent_letter_preview" ||
                         $this->uri->segment(3) ==
                             "date_sheet_edit" ||
                         $this->uri->segment(3) ==
                             "create_invt_add"
                     ) {
                         $activePAge = "Create Letter";
                     } elseif (
                         $this->uri->segment(3) ==
                             "send_consent" ||
                         $this->uri->segment(3) ==
                             "send_invitation" ||
                         $this->uri->segment(3) ==
                             "date_sheet_edit" ||
                         $this->uri->segment(3) ==
                             "create_invt_add"
                     ) {
                         $activePAge = "Send Consent";
                     } elseif (
                         $this->uri->segment(3) ==
                             "invitation_sent_list" ||
                         $this->uri->segment(3) ==
                             "consent_recieved_by_user_list" ||
                         $this->uri->segment(3) ==
                             "consent_not_recieved_by_user_list" ||
                         $this->uri->segment(3) ==
                             "consent_add_1" ||
                         $this->uri->segment(3) ==
                             "consent_add_2" ||
                         $this->uri->segment(3) ==
                             "consent_add_3" ||
                         $this->uri->segment(3) ==
                             "consent_add_4" ||
                         $this->uri->segment(3) ==
                             "consent_add_5" ||
                         $this->uri->segment(3) ==
                             "consent_add_6"
                     ) {
                         $activePAge = "Consent Recieved";
                     } elseif (
                         $this->uri->segment(3) ==
                             "examList" ||
                         $this->uri->segment(3) ==
                             "allocation_list"
                     ) {
                         $activePAge = "Allocate Candidates";
                     } elseif (
                         $this->uri->segment(3) ==
                             "allocation_send" ||
                         $this->uri->segment(3) ==
                             "allocation_send_to_user"
                     ) {
                         $activePAge =
                             "Update to Exam Center";
                     } elseif (
                         $this->uri->segment(3) ==
                             "attendance_master" ||
                         $this->uri->segment(3) ==
                             "reports_list" ||
                         $this->uri->segment(3) ==
                             "school_list_exam_for_allocation" ||
                         $this->uri->segment(3) ==
                             "downreportbutton"
                     ) {
                         $activePAge = "";
                     } elseif (
                         $this->uri->segment(3) ==
                         "consent_recieved"
                     ) {
                         $activePAge = "Consent Recieved";
                     } elseif (
                         $this->uri->segment(3) ==
                             "allocation_user_list" ||
                         $this->uri->segment(3) ==
                             "allocation_data_recieve_by_user"
                     ) {
                         $activePAge = "Allocated List";
                     } elseif (
                         $this->uri->segment(3) ==
                             "mark_attendance" ||
                         $this->uri->segment(3) ==
                             "mark_attendance_allocation" ||
                         $this->uri->segment(3) ==
                             "allocate_user_attendance"
                     ) {
                         $activePAge = "Mark Attendance";
                     } elseif (
                         $this->uri->segment(2) == "admin" &&
                         $this->uri->segment(3) == ""
                     ) {
                         $activePAge = "System User List";
                     } elseif (
                         $this->uri->segment(2) ==
                         "admin_roles"
                     ) {
                         $activePAge = "Role & Permissions";
                     } elseif (
                         $this->uri->segment(3) ==
                         "grade_list"
                     ) {
                         $activePAge = "Grading /Status";
                     } elseif (
                         $this->uri->segment(2) ==
                             "consent_letter" &&
                         $this->uri->segment(3) ==
                             "consent_list"
                     ) {
                         $activePAge = "School/College List";
                     } elseif (
                         $this->uri->segment(3) == "add" ||
                         $this->uri->segment(2) == "admin"
                     ) {
                         $activePAge = "Add New System User";
                     } ?>
                  <li class="nav-item" <?php echo $activePAge ==
                     trans($sub_nav["name"])
                         ? 'style="background:#5f6d7b"'
                         : ""; ?>>
                     <?php if (
                        trans($sub_nav["name"]) !=
                        "View Paper (Subject)"
                        ) { ?>
                     <a href="<?= base_url(
                        "admin/" .
                            $nav["controller_name"] .
                            "/" .
                            $sub_nav["link"]
                        ) ?>" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>
                           <?php echo trans(
                              $sub_nav["name"]
                              ); ?>
                        </p>
                     </a>
                     <?php } ?>
                  </li>
                  <?php
                     endforeach; ?>
               </ul>
               <?php endif; ?>
            </li>
            <?php endif; ?>
            <?php
               endforeach;
               ?>
            <?php
               $admin_role_id = $this->session->userdata["admin_role_id"];
               
               if ($admin_role_id == 5) { ?>
            <li  class="nav-item" id="attendance_master">
               <a href="<?= base_url(
                  "admin/allocation_admin/attendance_master"
                  ) ?>" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                     Attendance Master                                                                   
                  </p>
               </a>
            </li>
            <li  class="nav-item" id="reports_list">
               <a href="<?= base_url(
                  "admin/allocation_admin/reports_list"
                  ) ?>" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                     Reports                                                                  
                  </p>
               </a>
            </li>
            <?php }
               ?>
            <?php if ($admin_role_id == 7) { ?>
            <li  class="nav-item" id="exam_list_super_user">
               <a href="<?= base_url(
                  "admin/Super_user/exam_list_super_user"
                  ) ?>"  class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                     Consent Recieved                                                         
                  </p>
               </a>
            </li>
            <?php } ?>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>
<script>
   if('<?= $admin_role_id == 7 ?>'){
      if('<?= $cur_tab3 ?>'=='exam_list_super_user'){
          $("#<?= $cur_tab3 ?> > a ").addClass('active');
         
      }else if('<?= $cur_tab4 ?>'=='consent_recieved_by_super_user'){
          $("#<?= $cur_tab4 ?> > a ").addClass('active');
      }
      else{
          $("#<?= $cur_tab ?> > a ").addClass('active');
      }
   
   }else{
      '<?= $cur_tab5 ?>'=='school_list_exam_for_allocation'
   
      if('<?= $cur_tab1 ?>'=='attendance_master'){
      $("#<?= $cur_tab1 ?> > a ").addClass('active');
   }else if('<?= $cur_tab5 ?>'=='school_list_exam_for_allocation') {
   
      $("#attendance_master > a ").addClass('active');
   }
   else if('<?= $cur_tab2 ?>'=='reports_list') {
      $("#<?= $cur_tab2 ?> > a ").addClass('active');
   }
   else if('<?= $cur_tab6 ?>'=='downreportbutton') {
      $("#reports_list > a ").addClass('active');
   }
   else{
      $("#<?= $cur_tab ?>").addClass('menu-open');
      $("#<?= $cur_tab ?> > a ").addClass('active');
   }
   }
   
   
   
   
   
      
   
   
   
</script>
<?php function curPageURL()
   {
       $url = $_SERVER["REQUEST_URI"];
   
       $url = explode("/", $url);
       $lastPart = array_pop($url);
   
       return $lastPart;
   }
   ?>