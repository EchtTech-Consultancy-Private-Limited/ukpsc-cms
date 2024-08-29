<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_model extends CI_Model {

    public function insertData($tableName, $data = array()) {
        $this->db->insert($tableName, $data);

        //die();
        return $this->db->insert_id();
    }

    public function add_date_sheet($data) {

        $this->db->insert('ci_examination', $data);
         return true;
    }    

    //   public function add_return_invitation($dataUpdate2,$admin_id ) {
    //     // print_r($dataUpdate2);
    //     // print_r($admin_id); die();
    //         $this->db->where('admin_id', $admin_id);
    //     $this->db->update('ci_exam_registration',$dataUpdate2);
        
    //     echo $this->db->last_query(); die();
    //      return true;
    // }
    public function add_return_invitation($dataUpdate,$dataUpdate2,$admin_id) {
        
        $this->db->trans_start();
        $this->db->where('admin_id', $admin_id);
        $this->db->update('ci_exam_registration', $dataUpdate2);
          // echo $this->db->last_query(); die();
        $this->db->update('ci_exam_invitation', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }


    public function getdata_invite(){

        $this->db->select('*');
        $this->db->from('ci_invite_return');
        $this->db->where('id',$id);
        $q= $this->db->get();
        return $q->row_array();
    

    }







    public function add_invitation($data) {

        $this->db->insert('ci_exam_invitation', $data);
         return true;
    }
    public function edit_invitation($data) {

        $this->db->where('exam_name', $data['exam_name']);
        $this->db->update('ci_exam_invitation', $data);
         return true;
    }
    
    public function update_invitation($data,$user_id) {
    
        $this->db->where('id', $user_id);
        $this->db->update('ci_exam_invitation', $data);
        return true;
    }

  public function add_application_cand($data) {

        $this->db->insert('ci_candidate_app', $data);
         return true;
    }
    public function get_all_candidate_data(){
        $admin_id = $this->session->userdata('admin_id');  
        $array = array('created_by' => $admin_id);
        return  $this->db->select('*')->from('ci_candidate_app')->where($array)->order_by('id','desc')->get()->result_array();
    }

    public function subjectline_name($subjectline){
        
        $query = $this->db->query("SELECT * from ci_exam_master where id =$subjectline  ORDER BY id DESC ");
        return $query->result();   
    }

	function get_all_invites_ids($id) {
        // $query = $this->db->select('*')->from('ci_exam_registration')->where('id', $id)->get()->row_array();  
        $admin_id = $this->session->userdata('admin_id');  
        $array = array('id' => $id);
        // return  $this->db->select('*')->from('ci_exam_registration')->where($array)->order_by('id','desc')->get()->result_array();
        return  $this->db->select('*')->from('ci_exam_according_to_school')->where($array)->order_by('id','desc')->get()->result_array();       
    }
	function get_all_invites_idsupdate($id) {
        // $query = $this->db->select('*')->from('ci_exam_registration')->where('id', $id)->get()->row_array();  
        $admin_id = $this->session->userdata('admin_id');  
        $array = array('id' => $id);
        return  $this->db->select('*')->from('ci_exam_registration')->where($array)->order_by('id','desc')->get()->result_array();
        // return  $this->db->select('*')->from('ci_exam_according_to_school')->where($array)->order_by('id','desc')->get()->result_array();       
    }
	function get_all_registration_data() {
    
        $this->db->from('ci_exam_registration');
        $admin_role_id = $this->session->userdata('admin_role_id');
// new
        // if ($state_name != '' ) {
        //     $this->db->where('ci_exam_registration.district', $state_name);
        // }
        // if ($city_name != '') { 
         
        //     $this->db->where('ci_exam_registration.city', $city_name);
        // }
        // if ($grade_name != '') {
        //     $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        // }

////// end code
        if ($admin_role_id == 5) {
              $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
            $this->db->where('ci_exam_registration.created_by',$this->session->userdata('admin_id'));
        }

        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_registration.id', 'desc');
        $query = $this->db->get();
        $module = array();
    
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        return $module;
    }
	

    function getAllRegisterDataForInvitation($state_name, $city_name, $grade_name,$exam_id) {
    
        $this->db->from('ci_exam_registration');
        $admin_role_id = $this->session->userdata('admin_role_id');
        if ($state_name != '' ) {
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        if ($city_name != '') { 
         
            $this->db->where('ci_exam_registration.city', $city_name);
        }
        if ($grade_name != '') {
            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }

        if ($admin_role_id == 5) {
              $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
            $this->db->where('ci_exam_registration.created_by',$this->session->userdata('admin_id'));
        }
        // $this->db->where('ci_exam_registration.created_by','jogi');
        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_registration.id', 'desc');
        $query = $this->db->get();
        $module = array();
    
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        return $module;
    }
    
    function get_all_search_registration_data($state_name, $city_name, $grade_name,$exam_id) {

        $this->db->from('ci_exam_registration');
        if ($state_name != '' ) {
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        if ($city_name != '') { 
         
            $this->db->where('ci_exam_registration.city', $city_name);
        }
        if ($grade_name != '') {
            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }
        $admin_role_id = $this->session->userdata('admin_role_id');
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.created_by',
                    $this->session->userdata('admin_id'));
        }

        $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_registration.id', 'desc');
        $query = $this->db->get();
        $module = array();
        
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        return $module;
    }
    function get_all_search_registration_data_recieved($state_name, $city_name, $grade_name,$exam_id) {
        $this->db->select_sum('ci_exam_registration.max_allocate_candidate');
        $this->db->from('ci_exam_registration');
        if ($state_name != '' ) {
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        if ($city_name != '') { 
         
            $this->db->where('ci_exam_registration.city', $city_name);
        }
        if ($grade_name != '') {
            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }
    

        $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        $data = $query->result_array();
        
        if(isset($data[0]['max_allocate_candidate']))
        {
            $data = $data[0]['max_allocate_candidate'];
        }
        else
        {
            $data = 0;
        }
        return $data;
    }
    function get_all_search_registration_data_not_recieved($state_name, $city_name, $grade_name,$exam_id) {
        // echo $state_name."==".$city_name."==".$grade_name."=".$exam_id;
        //  die();
        $this->db->from('ci_exam_according_to_school');
        if ($state_name != '' ) {
            $this->db->where('ci_exam_according_to_school.district', $state_name);
        }
        if ($city_name != '') { 
         
            $this->db->where('ci_exam_according_to_school.city', $city_name);
        }
        if ($grade_name != '') {
            $this->db->where('ci_exam_according_to_school.ranking_admin', $grade_name);
        }
    

        $this->db->where('ci_exam_according_to_school.fileName6 is  NOT NULL');
        $this->db->where('ci_exam_according_to_school.invt_recieved',0);
        $this->db->where('ci_exam_according_to_school.ref_id',$exam_id);
        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_according_to_school.id', 'desc');

        $query = $this->db->get();
        return $query->num_rows();
    }
 
// NEW LOGIC FOR COUNTS
    public function getTotalCountinDistrict($district_name,$city_name)
    {
     
            $this->db->select_sum('ci_exam_registration.max_allocate_candidate');
            $this->db->from('ci_exam_registration');
            if ($district_name != '' ) {
                $this->db->where('ci_exam_registration.district', $district_name);
            }
            if ($city_name != '') { 
             
                $this->db->where('ci_exam_registration.city', $city_name);
            }

            $this->db->order_by('max_allocate_candidate desc');
            $query = $this->db->get();
            $data = $query->result_array();
            
            if(isset($data[0]['max_allocate_candidate']))
            {
                $data = $data[0]['max_allocate_candidate'];
            }
            else
            {
                $data = 0;
            }
            return $data;
    
    }


    public function getTotalCountinDistrictConsentNotRecieved(){
        $query = $this->db->query("SELECT SUM(ci_exam_registration.max_allocate_candidate)
        FROM ci_exam_registration
        INNER JOIN ci_registration_invitation ON ci_exam_registration.id=ci_registration_invitation.school_id WHERE ci_exam_registration.district='Dehradun' AND ci_registration_invitation.ref_id=1;
        ");
    }


    public function getTotalCountinSchoolWise($ids)
    {
           if($ids=='all')
           {
            $this->db->select_sum('ci_exam_registration.max_allocate_candidate');
            $this->db->from('ci_exam_registration');
            // $this->db->where_in('ci_exam_registration.id',$ids);
            $this->db->order_by('max_allocate_candidate desc');
           }
           else
           {
            $this->db->select_sum('ci_exam_registration.max_allocate_candidate');
            $this->db->from('ci_exam_registration');
            $this->db->where_in('ci_exam_registration.id',$ids);
            $this->db->order_by('max_allocate_candidate desc');
           }
         
            $query = $this->db->get();
            $data = $query->result_array();
            
            if(isset($data[0]['max_allocate_candidate']))
            {
                $data = $data[0]['max_allocate_candidate'];
            }
            else
            {
                $data = 0;
            }
            return $data;
    
    }

    public function getGradeCount($district_name,$city_name, $grade_name)
    {
     
            $this->db->select_sum('ci_exam_registration.max_allocate_candidate');
            $this->db->from('ci_exam_registration');
            if($district_name)
            {
                $this->db->where('ci_exam_registration.district',$district_name);
            }
            if($city_name)
            {
                $this->db->where('ci_exam_registration.city',$city_name);
            }
            if($grade_name) {
                $this->db->where('ci_exam_registration.ranking_admin',$grade_name);
            }
            $this->db->order_by('max_allocate_candidate desc');
            $query = $this->db->get();
            $data = $query->result_array();
            
            if(isset($data[0]['max_allocate_candidate']))
            {
                $data = $data[0]['max_allocate_candidate'];
            }
            else
            {
                $data = 0;
            }
            return $data;
    
    }
    // END NEW LOGIC FOR COUNTS

   

     public function edit_date_sheet($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_examination', $data);
        return true;
    }
    public function totalCountNumberInExam($id){
        $query = $this->db->get_where('ci_exam_master',
        array('id' => $id));
       $result = $query->row_array()['no_of_cand'];
       return $result;

    }
     public function edit_candi($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_candidate_app', $data);
        return true;
    }

 
       public function get_datesheet_id($id) {
        $query = $this->db->get_where('ci_examination',
                array('id' => $id));
        return $result = $query->row_array();
    } 
 public function get_data_candidate($id) {
        $query = $this->db->get_where('ci_candidate_app', array('id' => $id));
        return $result = $query->row_array();
    } 
 public function getCadidateDataUsingExamId($id) {
        $query = $this->db->get_where('ci_candidate_app', array('exam_name' => $id));
        return $result = $query->row_array();
    } 

 public function getInvitationUsingExamId($id) {
        $query = $this->db->get_where('ci_exam_invitation', array('exam_name' => $id));
        return $result = $query->row_array();
    } 


     public function get_registration_data($id) {
        $query = $this->db->get_where('ci_exam_registration',
                array('id' => $id));
        return $result = $query->row_array();
    } 



     public function add_action_admn($data, $id, $dataUpdate) {
        $this->db->trans_start();
        $this->db->insert('ci_consent_remarks', $data);
        /// Update file_movement status
        $this->db->where('id', $id);
        $this->db->update('ci_exam_registration', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
	// public function get_permanent_by_id($id) {
        // $query = $this->db->get_where('ci_certificate_permanent',
                // array('id' => $id));
        // return $result = $query->row_array();
    // }

    public function get_remarks_by_consent_id($id) {
        $this->db->select('ci_consent_remarks.*, ci_admin.* ');
        $this->db->from('ci_consent_remarks');
        $this->db->join('ci_admin',
                'ci_admin.admin_id =ci_consent_remarks.created_by');
        $this->db->where('ci_consent_remarks.id', $id);
        $this->db->order_by('ci_consent_remarks.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function checkCertificates() {
        $id = $this->session->userdata('admin_id');
        $queryProvisanal = $this->db->select('*')->from('ci_certificate_provisional')->where('admin_id', $id)->get()->row_array();
        if ($queryProvisanal) {
          return '1';
          // echo 'true';
        } else {
            return '0';
            // echo 'false';
        }
    }
    public function edit_permanent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_certificate_permanent', $data);
        return true;
    }

    public function edit_grievance_data($data, $id) {

        $this->db->where('id', $id);
        $this->db->update('ci_gravience', $data);
   
        // echo $this->db->last_query();  die();
        return true;
    }

    public function add_provisional($data) {

        $this->db->insert('ci_certificate_provisional', $data);
        // echo $this->db->last_query();
        return true;
    } 
     public function provisional_log($dataUpdate1) {
        $this->db->insert('provisional_log', $dataUpdate1);
        return true;
    } 
     public function permanent_log($dataUpdate1) {
        $this->db->insert('permanent_log', $dataUpdate1);
        return true;
    }
//     public function add_provisional($json_data) {
//             $this->db->insert('ci_certificate_provisional', $json_data);
//             if ($this->db->affected_rows() > 0) {
//             return true;
//             } else {
//             return false;
//             }
// }
	
	public function add_statistical($data) {

        $this->db->insert('ci_certificate_statistical', $data);
        
        return true;
    }

    // Edit Provisional Record
    public function edit_provisional($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_certificate_provisional', $data);
        // echo $this->db->last_query();
        return true;
    }
    public function edit_provisional_renew($data2, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_certificate_provisional', $data2);
        // echo $this->db->last_query();
        return true;
    }
 public function edit_permanent_renew($data2, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_certificate_permanent', $data2);
        // echo $this->db->last_query();
        return true;
    }

    public function edit_statistical($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ci_certificate_statistical', $data);
        // echo $this->db->last_query();
        return true;
    }
        
    /* get data */

    public function getData($table_name = false, $sel_col = false,
        $con = array(), $id = false) {
        $query = $this->db->select($sel_col)->from($table_name)->where($con)->get();
        // echo $this->db->last_query();
        if ($id) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    function change_status() {
        $this->db->set('is_active', $this->input->post('status'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('ci_certificate_provisional');
        // ECHO $this->db->last_query();
    }


    function get_all_provisional() {

        $this->db->from('ci_certificate_provisional');
  
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_provisional.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_provisional.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_provisional.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
//        }
        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_provisional.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_provisional.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_provisional.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_provisional.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.address1',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.city', $filterData);
            $this->db->or_like('ci_certificate_provisional.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.address2',
                    $filterData);
            $this->db->group_end();
        }
        $this->db->where('status','1');

        $this->db->order_by('ci_certificate_provisional.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }

    /*Permanent  List  */
    function get_all_premanent() {

        $this->db->from('ci_certificate_permanent');
  
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_permanent.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_permanent.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_permanent.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
//        }
        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_permanent.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_permanent.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('0 .file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_permanent.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role

        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_permanent.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address1',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.city', $filterData);
            $this->db->or_like('ci_certificate_permanent.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address2',
                    $filterData);
            $this->db->group_end();
        }
        $this->db->where('status','1');

        $this->db->order_by('ci_certificate_permanent.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }

    /*Permanent  List  */

    function get_all_provisional_renew() {

        $this->db->from('ci_certificate_provisional_renew');
  
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_provisional_renew.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_provisional_renew.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_provisional_renew.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_certificate_provisional_renew.file_movement !=', 1);
//        }
        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_provisional_renew.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_provisional_renew.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_provisional_renew.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_provisional_renew.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_provisional_renew.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_provisional_renew.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional_renew.address1',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional_renew.city', $filterData);
            $this->db->or_like('ci_certificate_provisional_renew.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional_renew.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional_renew.address2',
                    $filterData);
            $this->db->group_end();
        }
        // $this->db->where('status','1');

        $this->db->order_by('ci_certificate_provisional_renew.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }


    function get_all_statistical() {

        $this->db->from('ci_certificate_statistical');


        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_statistical.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_statistical.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_statistical.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');

        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_statistical.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_statistical.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_statistical.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role

        //$this->db->where('ci_admin.is_supper !=', 1);

        $this->db->order_by('ci_certificate_statistical.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();


        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }



     // ---------------------------------Statistical-----------------------------------

    function get_all_permanent_old() {

        $this->db->from('ci_certificate_permanent');

        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_permanent.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_permanent.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_permanent.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');

        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_permanent.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_permanent.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_permanent.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_permanent.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address1', $filterData);
            $this->db->or_like('ci_certificate_permanent.city', $filterData);
            $this->db->or_like('ci_certificate_permanent.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address2', $filterData);
            $this->db->group_end();
        }
        //$this->db->where('ci_admin.is_supper !=', 1);
        
        $this->db->where('status','1');
        $this->db->order_by('ci_certificate_permanent.id', 'desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    public function get_pro_staus($id){
        $this->db->select('*');
        $this->db->from('ci_certificate_permanent');
        $this->db->where('id',$id);
        $q= $this->db->get();
        return $q->row_array();
    }



    //get all provisonal record  
    public function get_provisional_by_id($id) {
        $query = $this->db->get_where('ci_certificate_provisional',
                array('id' => $id));
        return $result = $query->row_array();
    }

     public function get_grav_by_id($id) {
        $query = $this->db->get_where('ci_grav_remarks',
                array('id' => $id));
        return $result = $query->row_array();
    }
    public function get_statistical_by_id($id) {
        $query = $this->db->get_where('ci_certificate_statistical',
                array('id' => $id));
        return $result = $query->row_array();
    }

    public function get_permanent_by_id($id) {
        $query = $this->db->get_where('ci_certificate_permanent',
                array('id' => $id));
        return $result = $query->row_array();
    } 


    public function get_publish_data_by_id($id) {
        $query = $this->db->get_where('ci_certificate_permanent',
                array('id' => $id));
        return $result = $query->row_array();
    }

     public function get_grav_by_id_1($id) {
        $query = $this->db->get_where('ci_gravience',
                array('id' => $id));

        // print_r($query ); die();
        return $result = $query->row_array();
    }

    public function get_grav_by_id_2($id) {
        $query = $this->db->get_where('ci_gravience',
                array('id' => $id));

        return $result = $query->row_array();
    }
// public function get_deaction_data($id) {
//         $query = $this->db->get_where('ci_account_deactivation',
//                 array('id' => $id));

//         return $result = $query->row_array();
//     }
    public function get_deaction_data($id) {

     $q =$this->db->select('*')->from('ci_account_deactivation')->where('id',$id)->get()->result_array();
     return $q;
    }


    //Add DRA Action and Remark  
    public function add_action($data, $dataUpdate, $provisional_id) {
        $this->db->trans_start();
        $this->db->insert('ci_provision_remarks', $data);

        /// Update file_movement status
        $this->db->where('id', $provisional_id);
        $this->db->update('ci_certificate_provisional', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }

    // public function add_action_permanent($data, $dataUpdate, $permanent_id) {
    //     $this->db->trans_start();
    //     $this->db->insert('ci_permanent_remarks', $data);

    //     /// Update file_movement status
    //     $this->db->where('id', $permanent_id);
    //     $this->db->update('ci_permanent_remarks', $dataUpdate);
    //     $this->db->trans_complete();
    //     if ($this->db->trans_status()) {
    //         return true;
    //     }
    // }

     public function add_action_grav($data, $dataUpdate, $grav_id) {
        $this->db->trans_start();
        $this->db->insert('ci_grav_remarks', $data);
        /// Update file_movement status
        $this->db->where('id', $grav_id);
        $this->db->update('ci_gravience', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
     public function deactivation_dra($data, $dataUpdate, $deaction_id) {
        $this->db->trans_start();
        $this->db->insert('ci_deactivation_record', $data);
        /// Update file_movement status
        $this->db->where('id', $deaction_id);
        $this->db->update('ci_account_deactivation', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }

    public function add_action_sadmin($data, $dataUpdate, $grav_id) {
        $this->db->trans_start();
        $this->db->insert('ci_sadmin_remarks', $data);
        /// Update file_movement status
        $this->db->where('id', $grav_id);
        $this->db->update('ci_gravience', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
    public function add_action_sc($data, $dataUpdate, $grav_id) {
        $this->db->trans_start();
        $this->db->insert('ci_sc_remarks', $data);
        /// Update file_movement status
        $this->db->where('id', $grav_id);
        $this->db->update('ci_gravience', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
     public function add_action_nc($data, $dataUpdate, $grav_id) {
        $this->db->trans_start();
        $this->db->insert('ci_nc_remarks', $data);

        /// Update file_movement status
        $this->db->where('id', $grav_id);
        $this->db->update('ci_gravience', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
    public function get_remarks_by_provisional_id($provisional_id) {
        $this->db->select('ci_provision_remarks.*, ci_admin.* ');
        $this->db->from('ci_provision_remarks');
        $this->db->join('ci_admin',
                'ci_admin.admin_id =ci_provision_remarks.created_by');
        $this->db->where('ci_provision_remarks.provisional_id', $provisional_id);
        $this->db->order_by('ci_provision_remarks.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

      public function get_remarks_by_grav_id($grav_id) {
        $this->db->select('ci_grav_remarks.*, ci_admin.* ');
        $this->db->from('ci_grav_remarks');
        $this->db->join('ci_admin',
                'ci_admin.admin_id =ci_grav_remarks.created_by');
        $this->db->where('ci_grav_remarks.grav_id', $grav_id);
        $this->db->order_by('ci_grav_remarks.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function get_pramanent_file_name_by_id($fileName, $id) {
        $this->db->select($fileName);
        $this->db->from('ci_certificate_permanent');
        $this->db->where('id', $id);
        // $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_renw_file_name_by_id($fileName, $id) {
        $this->db->select($fileName);
        $this->db->from('ci_certificate_provisional_renew');
        $this->db->where('id', $id);
        // $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

public function get_provisional_file_name_by_id($fileName, $id) {
        $this->db->select($fileName);
        $this->db->from('ci_certificate_provisional');
        $this->db->where('id', $id);
        // $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

public function get_deactivation_file($fileName, $id) {
        $this->db->select($fileName);
        $this->db->from('ci_account_deactivation');
        $this->db->where('id', $id);
        // $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

	

public function get_deactivation_data($id) {

     $q =$this->db->select('*')->from('ci_account_deactivation')->where('id',$id)->get()->result_array();
     return $q;
    }

    
//     public function getTotalFees($stabId, $bedCount, $current_type ,$provisional_type, $state_id )
//     {
//        // echo $stabId ."==". $bedCount ."==".  $current_type  ."==". $provisional_type ."==". $state_id;
//          if($bedCount > 0 ){
//              $condition =  "establishment_fee = $stabId and  (cm.minbed_fee <= $bedCount and cm.maxbed_fee > $bedCount ) and cm.type_fee = '$provisional_type' and  state_id=$state_id ";
//          }else{
//               $condition =  "establishment_fee = $stabId  and cm.type_fee = '$provisional_type' and  state_id='$state_id' ";
//          }
         
//         $sql = "SELECT cm.id, cm.establishment_fee, cm.state_id, cm.minbed_fee, cm.maxbed_fee, cm.type_fee, cm.provisiona_fee, cm.permanent_fee, cet.name"
//                  . " from ci_fee_master cm"
//                  . " INNER JOIN ci_establishment_type as cet on cet.id = cm.establishment_fee "
//                  . "where $condition";           
                                     
//                     $html = "";
//                     $query = $this->db->query($sql)->result_array();
// //                     echo $this->db->last_query(); 
//                     // die;
//                      $result = array();
//                     if (!empty($query)) {
//                          foreach ($query as $key => $value) {
//                             $html .= $value['name'] . ' => ' . $value['provisiona_fee'];
//                          }
//                     $result['html'] = $html ;
//                     $result['totalFee'] = $value['provisiona_fee'];
//                 } else {
//                     $result['html'] = "" ;
//                     $result['totalFee'] = 0;
//                 }
//                 return $result;
//     }

    public function getTotalFees($stabId, $bedCount, $current_type ,$provisional_type, $state_id )
    {
       // echo $stabId ."==". $bedCount ."==".  $current_type  ."==". $provisional_type ."==". $state_id;
         if($bedCount > 0 ){
             $condition =  "provisiona_fee = $stabId and  (cm.minbed_fee <= $bedCount and cm.maxbed_fee > $bedCount ) and cm.type_fee = '$provisional_type' and  state_id=$state_id ";
         }else{
              $condition =  "provisiona_fee = $stabId  and cm.type_fee = '$provisional_type' and  state_id='$state_id' ";
         }
         
        $sql = "SELECT cm.id, cm.provisiona_fee, cm.state_id, cm.minbed_fee, cm.maxbed_fee, cm.type_fee, cm.provisiona_fee, cm.permanent_fee, cet.name"
                 . " from ci_fee_master cm"
                 . " INNER JOIN ci_establishment_type as cet on cet.id = cm.provisiona_fee "
                 . "where $condition";           
                                     
                    $html = "";
                    $query = $this->db->query($sql)->result_array();
//                     echo $this->db->last_query(); 
                    // die;
                     $result = array();
                    if (!empty($query)) {
                         foreach ($query as $key => $value) {
                            $html .= $value['name'] . ' => ' . $value['provisiona_fee'];
                         }
                    $result['html'] = $html ;
                    $result['totalFee'] = $value['provisiona_fee'];
                } else {
                    // $result['html'] = "" ;
                    // $result['totalFee'] = 0; 

                    $result['html'] = "No Fee Yet " ;
                    $result['totalFee'] = 0;
                }
                return $result;
    }

   public function add_grav($data) {

        $this->db->insert('ci_gravience', $data);
        $inserted_id = $this->db->insert_id();
        $data['ref_self_id'] = $inserted_id;
        $this->db->insert('ci_gravience_log', $data);
        return true;
    }    

     public function add_deactivation_req($data) {

        $this->db->insert('ci_account_deactivation', $data);
        return true;
    }    

    public function get_grav() {
        $this->db->select('*');
        // $this->db->order_by('id', 'desc');
        return $this->db->get('ci_gravience')->result_array();
    }  
    //   public function get_deactivation_data() {
    //     $this->db->select('*');
    //     // $this->db->order_by('id', 'desc');
    //     return $this->db->get('get_grav')->result_array();
    // }
      public function get_data_autofill() {
            $this->db->select('*');
            $this->db->order_by('admin_id', 'desc');
            return $this->db->get('ci_admin')->row_array();
        }
    public function get_data_autofill1($admin_id){
      $this->db->select('*');
      $this->db->from('ci_admin');
      $this->db->where('admin_id',$admin_id);
      $this->db->group_by('admin_id');
      $this->db->order_by('admin_id', 'DESC');
      return $this->db->get()->row_array();
    }

    public function get_data_auto_provisional($admin_id){
      $this->db->select('*');
      $this->db->from('ci_certificate_provisional');
      $this->db->where('admin_id',$admin_id);
      $this->db->group_by('admin_id');
      $this->db->order_by('admin_id', 'DESC');
      return $this->db->get()->row_array();
    }

    
       public function get_ids_admin()
    {
      // $query = $this->db->query("SELECT * from ci_admin_roles where admin_role_id != '6' && admin_role_id !='1' ORDER BY admin_role_title DESC ");
      $query = $this->db->query("SELECT * from ci_admin_roles where admin_role_id ='5'  ORDER BY admin_role_title DESC ");

      return $query->result();
    }

    function get_all_grav() {

        $this->db->from('ci_gravience');
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_gravience.state ',
            $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_gravience.district ',
            $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_gravience.file_movement ',
            $this->session->userdata('filter_status'));
        } 
        $admin_role_id = $this->session->userdata('admin_role_id');

        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_gravience.state',
            $this->session->userdata('state_id'));

        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_gravience.district',
            $this->session->userdata('district_id'));

        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_gravience.created_by',
            $this->session->userdata('admin_id'));
        }
        if ($admin_role_id == 7) {
            $this->db->where('ci_gravience.created_by',
            $this->session->userdata('admin_id'));
        }
       
        $this->db->order_by('ci_gravience.id', 'desc');

        $query = $this->db->get();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }

      function get_all_deactivation() {

        $this->db->from('ci_account_deactivation');
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_account_deactivation.state ',
            $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_gravience.district ',
            $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_account_deactivation.file_movement ',
            $this->session->userdata('filter_status'));
        } 
        $admin_role_id = $this->session->userdata('admin_role_id');

        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_account_deactivation.state',
            $this->session->userdata('state_id'));

        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_account_deactivation.district',
            $this->session->userdata('district_id'));

        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_account_deactivation.created_by',
            $this->session->userdata('admin_id'));
        }
        if ($admin_role_id == 7) {
            $this->db->where('ci_account_deactivation.created_by',
            $this->session->userdata('admin_id'));
        }
       
        $this->db->order_by('ci_account_deactivation.id', 'desc');

        $query = $this->db->get();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }

        public function authority(){

         return   $this->db->select('*')->from('ci_admin_roles')->get()->result_array();
   
	}
    
    public function count_row_data($id){
        $this->db->select('*');
        $this->db->from('ci_account_deactivation');
        $this->db->where('created_by', $id);
        $this->db->order_by('created_by', 'asc');
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function clonedata($id = false){

        $getBaseData = $this->db->select('*')->from('ci_certificate_provisional')->where('id',$id)->get()->row_array();
     
         if (!empty($getBaseData)) {
            unset($getBaseData['id']);
            unset($getBaseData['email']);
            unset($getBaseData['created_at']);
            unset($getBaseData['updated_at']);
        // $clone_data_id = $this->db->insert_id();
        // $getBaseData['ref_self_id'] = $clone_data_id;
        
        $getBaseData['file_movement'] = '2';
        $getBaseData['certificate_number'] = $getBaseData['certificate_number'].'/Clone';
        $this->db->insert('ci_certificate_clone_provi', $getBaseData);
        // $clone_data_id = $this->db->insert_id();

    }
}

 function get_all_provisional_deactivate_data() {

        $this->db->from('ci_certificate_provisional');

  
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_provisional.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_provisional.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_provisional.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
//        }
        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_provisional.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_provisional.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_provisional.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_provisional.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_provisional.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.address1',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.city', $filterData);
            $this->db->or_like('ci_certificate_provisional.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_provisional.address2',
                    $filterData);
            $this->db->group_end();
        }
         if ($admin_role_id == 5) {
           $this->db->where('deactivation_requist','1');
        }
        $this->db->order_by('ci_certificate_provisional.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }


     public function get_prosional_remark_data($id = NULL) {
        $query = $this->db->where('ci_certificate_provisional',
                array('id' => $id));
        // echo $this->db->last_query();
        return $result = $query->row_array();
    }

    /* Code start for permananet surrender from here */


    function get_all_permanent_deactivate_data() {

        $this->db->from('ci_certificate_permanent');

  
        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_certificate_permanent.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_certificate_permanent.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_certificate_permanent.file_movement ',
                    $this->session->userdata('filter_status'));
        }
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
//        }
        if ($admin_role_id == 3 || $admin_role_id == 4) {
            $this->db->where('ci_certificate_permanent.state',
                    $this->session->userdata('state_id'));
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
        }
        if ($admin_role_id == 5) {
            $this->db->where('ci_certificate_permanent.district',
                    $this->session->userdata('district_id'));
//            $this->db->where('ci_certificate_permanent.file_movement !=', 1);
        }
        if ($admin_role_id == 6) {
            $this->db->where('ci_certificate_permanent.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_certificate_permanent.establishment',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address1',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.city', $filterData);
            $this->db->or_like('ci_certificate_permanent.fname_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.mobile_owner',
                    $filterData);
            $this->db->or_like('ci_certificate_permanent.address2',
                    $filterData);
            $this->db->group_end();
        }
         if ($admin_role_id == 5) {
           $this->db->where('deactivation_requist','1');
        }
        $this->db->order_by('ci_certificate_permanent.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }


      /*Fetching data for provisional expiring certificates */

    // public function fetch_exipre_certificate_provsional_data($id){

    //     $this->db->select('*');
    //     $this->db->from('ci_certificate_provisional');
    //     $this->db->where('id', $id);
    //     // $this->db->where('expire_date', date("Y-m-d", strtotime('-7 days')));
    //     echo $this->db->last_query();
    //     $q= $this->db->get();
    //     return $q->result_array();
    // }

//        public function fetch_exipre_certificate_provsional_data(){

//         $que =$this->db->query('SELECT * FROM ci_certificate_provisional WHERE created_at  BETWEEN "'.$start_date.'" and "'.$end_date.'" AND updated_at > "'.$end_date.'" AND action IS NULL')->result_array();
// }
        
    public function get_proviio_log($id) {
        $this->db->select('*');
        $this->db->from('provisional_log');
        $this->db->where('pro_id', $id);
        $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }  
    public function get_permanent_log($id) {
        $this->db->select('*');
        $this->db->from('permanent_log');
        $this->db->where('pro_id', $id);
        $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
     public function get_consent_recved_data($state_name, $city_name, $grade_name,$ref_id) {
   
        $this->db->from('ci_exam_according_to_school');

        if ($city_name != '' && $state_name != '' ) {

            $this->db->where('ci_exam_according_to_school.district', $state_name);
            $this->db->where('ci_exam_according_to_school.city', $city_name);
        }

        if ($state_name != '' || $state_name = '') {
            
            $this->db->where('ci_exam_according_to_school.district', $state_name);
        }
        if ($grade_name != '') {

            $this->db->where('ci_exam_according_to_school.ranking_admin', $grade_name);
        }
        // $admin_role_id = $this->session->userdata('admin_role_id');
        // if ($admin_role_id == 6) {
        //     $this->db->where('ci_exam_according_to_school.created_by',
        //             $this->session->userdata('admin_id'));
        // }

        $filterData = $this->session->userdata('filter_keyword');

        $this->db->where('ref_id', $ref_id);
        $this->db->where('invt_recieved', '1');
        $this->db->order_by('ci_exam_according_to_school.id', 'desc');
        $query = $this->db->get();

        $module = array();
       
        $num_rows_count = $query->num_rows();
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
            
        }
        $module = array($num_rows_count,$module);
  
        return $module;
    }   
   
    
    public function get_consent_not_recved_data_copy($state_name, $city_name, $grade_name,$ref_id) {
        $this->db->from('ci_exam_according_to_school');

        // if ($city_name != '' && $state_name != '' ) {

        //     $this->db->where('ci_exam_according_to_school.district', $state_name);
        //     $this->db->where('ci_exam_according_to_school.city', $city_name);
        // }

        // if ($state_name != '' || $state_name = '') {
            
        //     $this->db->where('ci_exam_according_to_school.district', $state_name);
        // }
        
        
        // if ($grade_name != '') {

        //     $this->db->where('ci_exam_according_to_school.ranking_admin', $grade_name);
        // }
        // $admin_role_id = $this->session->userdata('admin_role_id');
        // if ($admin_role_id == 6) {
        //     $this->db->where('ci_exam_according_to_school.created_by',
        //             $this->session->userdata('admin_id'));
        // }

        // $filterData = $this->session->userdata('filter_keyword');
        $this->db->where('invt_recieved','0');
        $this->db->where('ref_id', $ref_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        // $module = array();
        $module = $query->result_array();
        
        
        // if ($query->num_rows() > 0) {
        //     $module = $query->result_array();
        // }
        
        $num_rows_count = $query->num_rows();
      
        $module = array($num_rows_count,$module);
        
        return $module;
    }
    public function get_consent_not_recved_data($state_name, $city_name, $grade_name,$ref_id) {
        $this->db->from('ci_exam_registration');

        if ($city_name != '' && $state_name != '' ) {

            $this->db->where('ci_exam_registration.district', $state_name);
            $this->db->where('ci_exam_registration.city', $city_name);
        }

        if ($state_name != '' || $state_name = '') {
            
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        
        
        if ($grade_name != '') {

            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }
        $admin_role_id = $this->session->userdata('admin_role_id');
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.created_by',
                    $this->session->userdata('admin_id'));
        }

        // $filterData = $this->session->userdata('filter_keyword');
        // $this->db->where('invt_recieved','0');
        // $this->db->where('ref_id', $ref_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $module = array();
        $module = $query->result_array();
        
        
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        
        $num_rows_count = $query->num_rows();
       
        $module = array($num_rows_count,$module);
        
        return $module;
    }

    public function get_consent_not_recved_datadownrport($state_name, $city_name, $grade_name,$ref_id) {
        
        $sql = "SELECT `school_id` FROM `ci_exam_according_to_school` WHERE `ref_id` = $ref_id and `invt_recieved`='0'";
        $query = $this->db->query($sql);
        $array = $query->result_array();
        $arr = array_column($array,"school_id");
        $arr = count($arr)>0?$arr:0;
        // print_r($arr);
        // die();
        $this->db->from('ci_exam_registration');
        $this->db->where_in('id', $arr);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $module = array();
        $module = $query->result_array();
        
        
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
      
        $num_rows_count = $query->num_rows();

        $module = array($num_rows_count,$module);
         
        return $module;
    }
   

     public function add_pulish_data($data) {

        $this->db->insert('ci_public_complaint', $data);
        return true;
    }

    function get_all_active_consent() {

        $this->db->from('ci_exam_registration');
  
        //-----------------------------------------------------------------------
        // Filter data as per user role
        $admin_role_id = $this->session->userdata('admin_role_id');

        // End Filter data as per user role

        $filterData = $this->session->userdata('filter_keyword');
        if ($filterData != '') {
            $this->db->group_start();
            $this->db->like('ci_exam_registration.district',
                    $filterData);
            $this->db->or_like('ci_exam_registration.address1',
                    $filterData);
            $this->db->or_like('ci_exam_registration.city', $filterData);
           
            $this->db->group_end();
        }
        $this->db->where('status_admin','Active');

        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        // print_r($module); die();
        return $module;
    }

     public function get_objection_id($id) {
        $query = $this->db->get_where('ci_certificate_permanent',
                array('id' => $id));
        return $result = $query->row_array();
    } 

    public function get_objection($id) {
        $this->db->select('*');
        $this->db->from('ci_public_complaint');
        // $this->db->where('id', $id);
        $this->db->where('complaint_agains',$id);
        $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
         // echo $this->db->last_query();
        return $query->result_array();
    }


    function get_all_examsheet() {

        $this->db->from('ci_examination');
  
        $admin_role_id = $this->session->userdata('admin_role_id');
        $this->db->order_by('ci_examination.id', 'asc');

        $query = $this->db->get();
        $module = array();
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
        return $module;
    }

    public function get_all_invites(){
       
        $admin_id = $this->session->userdata('admin_id');  
     
        $array = array('created_by' => $admin_id);

        // $count = $this->db->select('*')->from('ci_exam_invitation')->where($array)->get()->result_array();

        // if(count($count)==0){
        //     return '';
        // }

         // $this->db->select('*')->from('ci_exam_invitation')->where($array)->order_by('id','desc')->group_by('exam_name')->get()->result_array()
        
        return  $this->db->select('*')->from('ci_exam_invitation')->where($array)->order_by('id','desc')->get()->result_array();
    }
    
    public function get_invites_byid($new_id){
        // echo $new_id;exit;
        $admin_id = $this->session->userdata('admin_id');  
        $array = array('id' => $new_id,'created_by' => $admin_id);
        return  $this->db->select('*')->from('ci_exam_invitation')->where($array)->order_by('id','desc')->get()->result_array();
    }

    public function get_all_recived_invites(){

        $admin_id = $this->session->userdata('admin_id');
        $this->db->from('ci_exam_invitation');
        $this->db->where('create_letter_status','1');
        $this->db->where('created_by',$admin_id);
        $this->db->order_by('id','desc');
        $q = $this->db->get()->result_array();
        return $q;
    }

public function get_invitation_data($id) {
        $admin_id = $this->session->userdata('admin_id');
        $array = array('exam_name' => $id);
        return $this->db->select('*')->from('ci_exam_invitation')->where($array)->order_by('id','desc')->get()->result_array();
    }

    public function get_invitation_data_new($id) {
        $admin_id = $this->session->userdata('admin_id');
          $array = array('id' => $id);
        return $this->db->select('*')->from('ci_exam_invitation')->where($array)->order_by('id','desc')->get()->result_array();
    }

    public function get_return_data($id) {
        $query = $this->db->get_where('ci_invite_return',array('ref_id' => $id));
        // echo $this->db->last_query();
        return $result = $query->result_array();

    }
// New Code 22-09-2022 ----JOgi
public function get_subject_new_by_id($id) {
 
    $query = $this->db->get_where('ci_subject', array('exam_id' => $id));
   
    return $result = $query->result_array();
}

}
