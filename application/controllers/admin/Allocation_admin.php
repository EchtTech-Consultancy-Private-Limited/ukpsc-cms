<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_admin extends MY_Controller {

    public function __construct() {

        parent::__construct();
        auth_check(); // check login auth
        $this->load->library('mailer');
        $this->load->model('admin/admin_model', 'admin_model');
        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/Allocation_Model', 'Allocation_Model');
        $this->load->model('admin/Exam_model', 'Exam_model');
        $this->load->helper('date');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    /*Permanent Code Starts Here*/
    public function allocation_list($id,$exam_id) {
        // $this->rbac->check_operation_access();
        $data['id'] = urldecrypt($id);
        $data['exam_name'] = get_exam_name(urldecrypt($exam_id));
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data($id) {
    $admin_id = $this->session->userdata('admin_id'); 
 
    $data['info'] = $this->Allocation_Model->get_data_for_allocation($id);
   
    $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
    $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
    $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
    $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0]['candidates']) : [];
    $data['exam_id_new'] = $id;
    $data['exmin_ceterOption'] = isset($data['info'][0]['exmin_ceter_option']) ? explode(",",$data['info'][0]['exmin_ceter_option']) : [];
    // $arrData=[];
    // print_r($data['info'][0]['date_exam']);
    // foreach($data['exmin_ceterOption'] as $vl){
    //     if($vl == 'Yes'){
    //         array_push($arrData,isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : []);
    //     }
    // }
     //print_r($data);die;

    $this->load->view('admin/allocation/allocation_list', $data);
    }  
    public function allocation_list_datacopy($id) {
        $state_name = '';
        $city_name = '';
        $grade_name = '';
    
        // $records['data'] = $this->Allocation_Model->get_all_registration_data($state_name, $city_name, $grade_name);
        $records1['info'] = $this->Allocation_Model->get_data_for_allocation($id);
        $date_exam = isset($records1['info'][0]['date_exam']) ? explode(",",$records1['info'][0]['date_exam']) : [];
        $shft_exam = isset($records1['info'][0]['shft_exam']) ? explode(",",$records1['info'][0]['shft_exam']) : [];
        $no_candidate = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
        $data = [];
        $i = 1;
        foreach ($records1['info'] as $row) {
               $getCenterCode = getCenterCode( $row['school_id'],$row['id']);
               $getCenterCode =isset($getCenterCode)?$getCenterCode:'';
               $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']);

                $row['school_name'] = ''.$row['school_name'].'<input  type="text" id="school_id_new'.$i.'" name="school_id_new'.$i.'" value="'.$row['school_id'].'">';
                $row['exam_center_code'] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="exam_center_code'.$i.'" name="exam_center_code" value="'.$getCenterCode.'">';
                $row['button']='<button class="btn btn-success" onclick="formdataSubmit('.$i.')"> Submit</button>';
                $row['candidateassign']   = [];
               foreach ($no_candidate as $key => $value) { 
                $candiValue = isset($candidateNo[$key])?$candidateNo[$key]:'';
                    $row['candidateassign'][] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="candidate_value_school_id_new'.$i.$key.'" value="'.$candiValue.'">';
                  }
                $data[] = [
                    ++$i,
              
                    '<input   type="text" id="candidate_value_count'.$i.'" value="'.count($no_candidate).'"><input  type="text" id="admin_id'.$i.'" name="admin_id" value="'.$row['admin_id'].'"><input type="text" id="exam_id" name="exam_id" value="'.$row['id'].'">',
                    $row['school_name']? $row['school_name'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $row['exam_center_code']? $row['exam_center_code'] : '',
                    $row['candidateassign']? $row['candidateassign'] : '',
                    $row['button']? $row['button'] : '',
                   
                 
                    
                   
                ];
            
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }  
    public function allocation_list_datacopy1() {
       
        $district = isset($_GET['state_id'])? $_GET['state_id']:0;
        $exam_id = isset($_GET['exam_id'])? $_GET['exam_id']:0;
        $city_name = isset($_GET['city_name'])? $_GET['city_name']:0;
        $grade_name = isset($_GET['grade_name'])? $_GET['grade_name']:0;
        // $records['data'] = $this->Allocation_Model->get_all_registration_data($state_name, $city_name, $grade_name,$id);
        $records1['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,5236);
        // print_r($records1['info']);
        // die();
        $date_exam = isset($records1['info'][0]['date_exam']) ? explode(",",$records1['info'][0]['date_exam']) : [];
        $shft_exam = isset($records1['info'][0]['shft_exam']) ? explode(",",$records1['info'][0]['shft_exam']) : [];
        $no_candidate = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
        $data = [];
        $i = 1;
        foreach ($records1['info'] as $row) {
               $getCenterCode = getCenterCode( $row['school_id'],$row['id']);
               $getCenterCode =isset($getCenterCode)?$getCenterCode:'';
               $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']);

                $row['school_name'] = ''.$row['school_name'].'<input  type="text" id="school_id_new'.$i.'" name="school_id_new'.$i.'" value="'.$row['school_id'].'">';
                $row['exam_center_code'] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="exam_center_code'.$i.'" name="exam_center_code" value="'.$getCenterCode.'">';
                $row['button']='<button class="btn btn-success" onclick="formdataSubmit('.$i.')"> Submit</button>';
                $row['candidateassign']   = [];
               foreach ($no_candidate as $key => $value) { 
                $candiValue = isset($candidateNo[$key])?$candidateNo[$key]:'';
                    $row['candidateassign'][] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="candidate_value_school_id_new'.$i.$key.'" value="'.$candiValue.'">';
                  }
                $data[] = [
                    ++$i,
              
                    '<input   type="text" id="candidate_value_count'.$i.'" value="'.count($no_candidate).'"><input  type="text" id="admin_id'.$i.'" name="admin_id" value="'.$row['admin_id'].'"><input type="text" id="exam_id" name="exam_id" value="'.$row['id'].'">',
                    $row['school_name']? $row['school_name'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $row['exam_center_code']? $row['exam_center_code'] : '',
                    $row['candidateassign']? $row['candidateassign'] : '',
                    $row['button']? $row['button'] : '',
                   
                 
                    
                   
                ];
            
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }  


    // / End Login Jogi.. i will work later...
    public function newChanges() {
        $exam_id = $_GET['exam_id'];
        $id = empty($_GET['state_id'])?'':$_GET['state_id'];
        $state_name = $id!==''?get_district_name($id):''; 
        $district_id = empty($_GET['district_id'])?'':$_GET['district_id'];
        $city_name = $district_id!==''?get_subcity_name($district_id):'';
        $grade_name = empty($_GET['grade_id'])?'':$_GET['grade_id'];
        $data['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,$state_name, $city_name, $grade_name);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
        $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0]['candidates']) : [];
        $data['exam_id_new'] = $exam_id;
      
        $this->load->view('admin/allocation/allocation_list_new', $data);
    }


    public function allocation_send_list_data() {

      $admin_id = $this->session->userdata('admin_id'); 

    $data['info'] = $this->Allocation_Model->get_data_for_allocation_update();
    //   print_r($data['info']); die();
        $this->load->view('admin/allocation/allocation_send_list', $data);
    }
     public function save() {
        
        $data =[
            'school_id'=>isset($_GET['school_id'])?$_GET['school_id']:0,
            'exam_id'=> isset($_GET['exam_id'])?$_GET['exam_id']:0,
            'exam_center_code'=>isset($_GET['exam_center_code'])?$_GET['exam_center_code']:0,
            'admin_id'=>isset($_GET['admin_id'])?$_GET['admin_id']:0,
            'candidate_array'=>isset($_GET['candidate_array'])?implode(",",$_GET['candidate_array']): "",
            'status'=>0
        ];
        $check = $this->Allocation_Model->insertForAllocation($data);
        echo $check;
        die();

    }
	public function examList() {

        $data['title'] = 'Exam List for Allocation';
        $data['data'] = $this->Allocation_Model->get_all_recived_invites();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/examListForAllocation', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
    
    public function get_all_recived_invites(){
    
        $admin_id = $this->session->userdata('admin_id');
        $this->db->from('ci_exam_invitation');
        $this->db->where('invt_recieved','1');
        $this->db->where('created_by',$admin_id);
        $this->db->order_by('id','desc');
        $q = $this->db->get()->result_array();
        return $q;
    }


    public function allocationTest() {
        
        $examid = $this->uri->segment(4);
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Invitation and Schedule List';
        $data['exam_id'] = urldecrypt($examid);
        $this->db->from('ci_exam_invitation');
        $this->db->where('ci_exam_invitation.id',$data['exam_id']);
        $query = $this->db->get();
        $examName = $query->row_array();
        $data['examName'] = $examName['subjectline'];
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/exam/invt_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

      // Some changes in methods
      public function allocation_send() {
        $data['title'] = 'Exam Allocation List';
        $data['data'] = $this->Allocation_Model->get_all_recived_invites();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/examListForAllocationForSend', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
    public function allocation_send_to_user($id,$exam_id)
    {
        $data['id'] = urldecrypt($id);
        $data['exam_name'] = get_exam_name(urldecrypt($exam_id));
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_send_to_user_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data_send_to_user_list($id) {
        $admin_id = $this->session->userdata('admin_id'); 
        $data['info'] = $this->Allocation_Model->get_data_for_allocation($id);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
        $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
        $data['hideselectbutton'] = 'ok';
        $this->load->view('admin/allocation/allocation_list_send_to_user', $data);
        }  


        public function send_allocation_to_user() {

            if(isset($_GET['exam_id']) && isset($_GET['school_ids'])){
                    $school_ids = $_GET['school_ids'];
                     $exam_id = $_GET['exam_id'];
                     $examName = get_exam_name($exam_id);
                    $mail_data = array(
                        'examname' => $examName
                      
                    );
                 
                foreach(array_unique($school_ids) as $id){
                    $email = getEmail($id);
                    $phone = getMobile($id);
                    $messageP1='Dear Sir/Madam ,';
                    $messageP1.='Candidates has been allotted as per your consent for '.$examName.'. Kindly login';
                    $messageP1.='into your portal to check the details.';
                    $messageP1.='Regards,';
                    $messageP1.='UKPSC, Haridwar';
                    $template_id = "1007102212957051003";
                    // EMAIL AND MESSAGE SEND UDING TEMPLETE
                    sendSMS($phone,$messageP1,$template_id);
                    $this->load->helper('email_helper');
                    $this->mailer->mail_template($email,'allocation-sent',$mail_data);
                   
                }
                $check = $this->Allocation_Model->sendAllocationForUser($school_ids,$exam_id);

                die();


               

            }
        }

        public function allocationDatatoUserOnChange() {
            $exam_id = $_GET['exam_id'];
         
            $id = empty($_GET['state_id'])?'':$_GET['state_id'];
            $state_name = $id!==''?get_district_name($id):''; 
            $district_id = empty($_GET['district_id'])?'':$_GET['district_id'];
            $city_name = $district_id!==''?get_subcity_name($district_id):'';
            $grade_name = empty($_GET['grade_id'])?'':$_GET['grade_id'];
            $data['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,$state_name, $city_name, $grade_name);
            $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
            $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
            $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
            $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0]['candidates']) : [];
            $data['exam_id_new'] = $exam_id;
            $data['hideselectbutton'] = 'notok';
        
            $this->load->view('admin/allocation/allocation_list_send_to_user_new', $data);
        }

        public function attendance_master() {
            // echo 'here';
            $data['title'] = 'Attendance Master List';
            $data['data'] = $this->Allocation_Model->get_all_recived_invites();
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/allocation/allocationMasterForExamList', $data);
            $this->load->view('admin/includes/_footer', $data);
        }

        public function school_list_exam_for_allocation($exam_id ,$newExamid){
            $exam_id = urldecrypt($exam_id);
            $data['exam_name'] = get_exam_name(urldecrypt($newExamid));
            $data['info'] = $this->Allocation_Model->getSchoolListForAllocationExam($exam_id);
             foreach ($data['info'] as $key => $d) {
                 $data['info'][$key]['centerCode'] = getCenterCode( $d['school_id'],$exam_id); 
                 $data['info'][$key]['examination_center_name'] = getSchoolName( $d['school_id']); 
             }
            // $data['exam_name'] = get_exam_name_new( $exam_id);
            $data['title'] = 'Attendance Master List';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/allocation/markAttendanceListForExamination', $data);
            $this->load->view('admin/includes/_footer', $data);

        }
        public function reports_list(){
            $data['title'] = 'Download Reports';
            $state_name = $city_name = $grade_name = '';
            $data['data'] = $this->Exam_model->get_all_recived_invites($state_name,$city_name,$grade_name);
           
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/report/index', $data);
            $this->load->view('admin/includes/_footer', $data);
        }

        public function downreportbutton($id){
            $id = urldecrypt($id);
           
            $data['exam_name'] = get_exam_name(get_exam_name_downloadreport( $id));
         
            $data['id'] = $id;
            $data['title'] = 'Download Report buttons for';

            // Consent recieved Table
            $state_name = $city_name = $grade_name = '';
            $data['temp'][1] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$id);
           

            $data['data']=$data['temp'][1][1];
           
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]['centerCode'] = getCenterCode( $value['school_id'],$id)?getCenterCode( $value['school_id'],$id):'';
                $data['data'][$key]['consent_allocation'] = getConsentAllocate_max($value['school_id'])?getConsentAllocate_max($value['school_id']):'';
                $data['data'][$key]['candidateNo'] = getCandidateNumbers($value['school_id'],$id);
                $data['data'][$key]['uniqueSnoschool'] = uniqueSnoschool($value['email']);

            }
            
          
            $records1['info'] = $this->Allocation_Model->get_data_for_allocation($id);
            $date_exam_consent_recieve = isset($records1['info'][0]['date_exam']) ? explode(",",$records1['info'][0]['date_exam']) : [];
            $shft_exam_consent_recieve = isset($records1['info'][0]['shft_exam']) ? explode(",",$records1['info'][0]['shft_exam']) : [];
            $data['date_exam_consent_recieve'] = $date_exam_consent_recieve;
            $data['shft_exam_consent_recieve'] = $shft_exam_consent_recieve;
            $data['no_candidate'] = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
            $data['candidates'] = isset($records1['info'][0]['candidates']) ? explode(",",$records1['info'][0]['candidates']) : [];
             
           
            // cosent_not_recved_data
            $state_name = $city_name = $grade_name = '';

     
            
            $data['notrecievetempdata'][1] = $this->Exam_model->get_consent_not_recved_datadownrport($state_name, $city_name, $grade_name,$id);
         

            $data['notrecieveddata']=$data['notrecievetempdata'][1][1];
        
            foreach ($data['notrecieveddata'] as $key => $value) {
                $data['notrecieveddata'][$key]['centerCode'] = getCenterCode( $value['id'],$id)?getCenterCode( $value['id'],$id):'';
                $data['notrecieveddata'][$key]['consent_allocation'] = getConsentAllocate_max($value['id'])?getConsentAllocate_max($value['id']):'';
                $data['notrecieveddata'][$key]['candidateNo'] = getCandidateNumbers($value['id'],$id);
                $data['notrecieveddata'][$key]['uniqueSnoschool'] = uniqueSnoschool($value['email']);

            }

          

            $records2['info'] = $this->Allocation_Model->get_data_for_allocation($id);
            $date_exam_consent_not_recieve = isset($records2['info'][0]['date_exam']) ? explode(",",$records2['info'][0]['date_exam']) : [];
            $shft_exam_consent_not_recieve = isset($records2['info'][0]['shft_exam']) ? explode(",",$records2['info'][0]['shft_exam']) : [];
            $data['date_exam_consent_not_recieve'] = $date_exam_consent_not_recieve;
            $data['shft_exam_consent_not_recieve'] = $shft_exam_consent_not_recieve;
            $data['no_candidate'] = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
            $data['candidates'] = isset($records1['info'][0]['candidates']) ? explode(",",$records1['info'][0]['candidates']) : [];
           


            // attendence_master_report
            $data['info'] = $this->Allocation_Model->getSchoolListForAllocationExam($id);
            foreach ($data['info'] as $key => $d) {
                $data['info'][$key]['centerCode'] = getCenterCode( $d['school_id'],$id); 
                $data['info'][$key]['examination_center_name'] = getSchoolName( $d['school_id']); 
            }
         
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/report/downloadreportbutton', $data);
            $this->load->view('admin/includes/_footer', $data);
        }
        public function generate_pdf($id){

            $admin_id = $this->session->userdata('admin_id'); 
            $id = urldecrypt($id);
            $data['exam_name'] = get_exam_name(get_exam_name_downloadreport($id));
            $data['info'] = $this->Allocation_Model->get_data_for_allocation($id);
            $sub_info =[];
            $this->load->view('admin/includes/_header2', $sub_info);
            $this->load->view('admin/report/pdfreport', $data);
         
        }
    
}