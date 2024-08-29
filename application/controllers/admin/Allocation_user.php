<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_user extends MY_Controller {

    public function __construct() {

        parent::__construct();
        auth_check(); // check login auth
        $this->load->model('admin/admin_model', 'admin_model');
        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/Allocation_Model', 'Allocation_Model');
        $this->load->helper('date');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
 
    
    // New allocation userdata for allocation user Date 10-10-2022
    public function allocation_user_list() {
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_index_user', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data_user() {
    $admin_id = $this->session->userdata('admin_id'); 
   
    $data['info'] = $this->Allocation_Model->allocationConsentRecievedByUser($admin_id);
    
    $this->load->view('admin/allocation/allocation_list_exam_recieved_by_user', $data);
    }  
    public function allocation_data_recieve_by_user($exam_id) {
    $exam_id = urldecrypt($exam_id);
     
    $data['info'] = $this->Allocation_Model->get_data_for_allocation_user($exam_id);
   
    $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
    $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
    $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
    $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/allocation/allocation_list_user', $data);
    $this->load->view('admin/includes/_footer', $data);
    }  
    public function mark_attendance(){
        $admin_id = $this->session->userdata('admin_id'); 
        $data['info'] = $this->Allocation_Model->allocationConsentRecievedByUser($admin_id);
     
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/exam_recieved_for_mark_attendance', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
    public function mark_attendance_allocation($exam_id){
        $exam_id = urldecrypt($exam_id);
        $data['info'] = $this->Allocation_Model->get_data_for_allocation_user($exam_id);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
        $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_list_user_for_mark_attendance', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
  
    public function allocate_user_attendance($exam_id,$key,$newCandidateNo) {
        $exam_id = urldecrypt($exam_id);
        $key = urldecrypt($key);
        $newCandidateNo = urldecrypt($newCandidateNo);
        $admin_id = $this->session->userdata('admin_id');
        $data['info'] = $this->Allocation_Model->get_data_for_allocation_user($exam_id);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['key'] = $key;
        $data['candidateCount'] = $newCandidateNo;
        $data['exam_id'] = $exam_id;
        $data['admin_id'] = $admin_id;
        $data['school_id'] = $data['info'][0]['school_id'];
        $data['Exam_subject_line'] = $data['info'][0]['subjectline'];
        $convertExamShiftDate = date("d-m-Y",strtotime( $data['date_exam'][$key]));
        $this->db->where('school_id ', $data['info'][0]['school_id']);
        $this->db->where('exam_id ',  $exam_id);
        $this->db->where('admin_id ', $admin_id);
        $this->db->where('exam_date ', $convertExamShiftDate);
        $this->db->where('exam_shift ', $data['shft_exam'][$key]);
        $this->db->where('total_candidates ', $newCandidateNo);
        $query1 = $this->db->get('ci_mark_attendance_allocation');
        $tempData = $query1->result_array();

        $data['present_candidate']=isset($tempData[0]['present_candidate'])?$tempData[0]['present_candidate'] :'00';
        $data['absent_candidate']=isset($tempData[0]['absent_candidate'])?$tempData[0]['absent_candidate'] :'00';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/attendanceFormForUser', $data);
        $this->load->view('admin/includes/_footer', $data);
    }


    public function markattedanceData(){
        $data =[
            'exam_date_old'=>isset($_POST['exam_date_old'])?$_POST['exam_date_old']:'',
            'exam_shift_old'=>isset($_POST['exam_shift_old'])?$_POST['exam_shift_old']:'',
            'exam_date'=>isset($_POST['exam_date'])?$_POST['exam_date']:'',
            'exam_shift'=>isset($_POST['exam_shift'])?$_POST['exam_shift']:'',
            'present_candidate'=>isset($_POST['present_candidate'])?$_POST['present_candidate']:'',
            'absent_candidate'=>isset($_POST['absent_candidate'])?$_POST['absent_candidate']:'',
            'total_candidates'=>$_POST['present_candidate']+$_POST['absent_candidate'],
            'school_id'=>isset($_POST['school_id'])?$_POST['school_id']:'',
            'exam_id'=>isset($_POST['exam_id'])?$_POST['exam_id']:'',
            'admin_id'=>isset($_POST['admin_id'])?$_POST['admin_id']:'', 
        ];
        $this->db->where('school_id ', $data['school_id']);
        $this->db->where('exam_id ', $data['exam_id']);
        $this->db->where('admin_id ', $data['admin_id']);
        $this->db->where('exam_date ', $data['exam_date']);
        $this->db->where('exam_shift ', $data['exam_shift']);
        $query = $this->db->get('ci_mark_attendance_allocation');
        $count = $query->num_rows();
        if($count == 0)
        {
        $this->Allocation_Model->markAttendanceAllocationInsert($data); 
        $this->session->set_flashdata('success', 'Mark Attendance Allocation Successfully Added');
        }
        else{
            $this->Allocation_Model->markAttendanceAllocationUpdate($data);
            $this->session->set_flashdata('success', 'Mark Attendance Allocation Successfully Updated');
        }
        redirect(base_url('admin/allocation_user/mark_attendance_allocation/'. urlencrypt($_POST['exam_id'])));

    }


    //  some useful code for attendanceFormForUser
    //     public function markattedanceData(){
    //     $data =[
    //         'exam_date_old'=>isset($_POST['exam_date_old'])?$_POST['exam_date_old']:'',
    //         'exam_shift_old'=>isset($_POST['exam_shift_old'])?$_POST['exam_shift_old']:'',
    //         'exam_date'=>isset($_POST['exam_date'])?$_POST['exam_date']:'',
    //         'exam_shift'=>isset($_POST['exam_shift'])?$_POST['exam_shift']:'',
    //         'present_candidate'=>isset($_POST['present_candidate'])?$_POST['present_candidate']:'',
    //         'absent_candidate'=>isset($_POST['absent_candidate'])?$_POST['absent_candidate']:'',
    //         'school_id'=>isset($_POST['school_id'])?$_POST['school_id']:'',
    //         'exam_id'=>isset($_POST['exam_id'])?$_POST['exam_id']:'',
    //         'admin_id'=>isset($_POST['admin_id'])?$_POST['admin_id']:'', 
    //     ];
    
    //     $this->db->where('school_id ', $data['school_id']);
    //     $this->db->where('exam_id ', $data['exam_id']);
    //     $this->db->where('admin_id ', $data['admin_id']);
    //     $query = $this->db->get('ci_mark_attendance_allocation');
    //     $count = $query->num_rows();
    //     if($count == 0)
    //     {
    //     $this->Allocation_Model->markAttendanceAllocationInsert($data); 
    //     $this->session->set_flashdata('success', 'Mark Attendance Allocation Successfully Added');
    //     }
    //     else{
    //         $this->db->where('school_id ', $data['school_id']);
    //         $this->db->where('exam_id ', $data['exam_id']);
    //         $this->db->where('admin_id ', $data['admin_id']);
    //         $query1 = $this->db->get('ci_mark_attendance_allocation');
    //         $data = $query1->result_array();

    //         // Some Important Condition

    //         $exam_shift = array($data[0]['exam_shift']);
    //         $exam_date = array($data[0]['exam_date']);
    //         $present_candidate = array($data[0]['present_candidate']);
    //         $absent_candidate = array($data[0]['absent_candidate']);
    //         $exam_shifts = explode(',',$data[0]['exam_shift']);
    //         $exam_dates = explode(',',$data[0]['exam_date']);
    //         $present_candidates = explode(',',$data[0]['present_candidate']);
    //         $absent_candidates = explode(',',$data[0]['absent_candidate']);
    //         $index=-1;

    //         foreach ($exam_dates as $key=>$date){
    //             if($date==$_POST['exam_date']){
    //                 if($exam_shifts[$key]==$_POST['exam_shift']){
    //                     $index=$key;
    //                     break;
    //                 }
    //             }
    //         }
            
    //         if($index!=-1){
    //             $present_candidates[$index]=$_POST['present_candidate'];
    //             $absent_candidates[$index]=$_POST['absent_candidate'];
    //             $present_candidate = implode(',',$present_candidates);
    //             $absent_candidate = implode(',',$absent_candidates);
    //             $exam_shift = implode(',',$exam_shift);
    //             $exam_date = implode(',',$exam_date);
    //         }
    //         else{
    //             array_push($exam_shift,$_POST['exam_shift']);
    //             $exam_shift = implode(',',$exam_shift);

    //             array_push($exam_date,$_POST['exam_date']);
    //             $exam_date = implode(',',$exam_date);

    //             array_push($present_candidate,$_POST['present_candidate']);
    //             $present_candidate = implode(',',$present_candidate);

    //             array_push($absent_candidate,$_POST['absent_candidate']);
    //             $absent_candidate = implode(',',$absent_candidate);

    //         }

            
    //         $data =[
    //             'exam_date_old'=>isset($_POST['exam_date_old'])?$_POST['exam_date_old']:'',
    //             'exam_shift_old'=>isset($_POST['exam_shift_old'])?$_POST['exam_shift_old']:'',
    //             'exam_date'=>$exam_date,
    //             'exam_shift'=>$exam_shift,
    //             'present_candidate'=>$present_candidate,
    //             'absent_candidate'=>$absent_candidate,
    //             'school_id'=>isset($_POST['school_id'])?$_POST['school_id']:'',
    //             'exam_id'=>isset($_POST['exam_id'])?$_POST['exam_id']:'',
    //             'admin_id'=>isset($_POST['admin_id'])?$_POST['admin_id']:'', 
    //         ];
    //         // Some Important Conditions End

    //         $this->Allocation_Model->markAttendanceAllocationUpdate($data);
    //         $this->session->set_flashdata('success', 'Mark Attendance Allocation Successfully Updated');
    //     }
    //     redirect(base_url('admin/allocation_user/mark_attendance_allocation/'. urlencrypt($_POST['exam_id'])));

    // }

    // public function allocate_user_attendance($exam_id,$key) {
    
    //     $exam_id = urldecrypt($exam_id);
    //     $admin_id = $this->session->userdata('admin_id');
    //     $data['info'] = $this->Allocation_Model->get_data_for_allocation_user($exam_id);
    //     $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
    //     $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
    //     $data['key'] = $key;
    //     $data['exam_id'] = $exam_id;
    //     $data['admin_id'] = $admin_id;
    //     $data['school_id'] = $data['info'][0]['school_id'];
    //     $data['Exam_subject_line'] = $data['info'][0]['subjectline'];

    //     $this->db->where('school_id ', $data['info'][0]['school_id']);
    //     $this->db->where('exam_id ',  $exam_id);
    //     $this->db->where('admin_id ', $admin_id);
    //     $query1 = $this->db->get('ci_mark_attendance_allocation');
    //     $tempData = $query1->result_array();

    //     $exam_shifts = explode(',',$tempData[0]['exam_shift']);
    //     $exam_dates = explode(',',$tempData[0]['exam_date']);
    //     $present_candidates = explode(',',$tempData[0]['present_candidate']);
    //     $absent_candidates = explode(',',$tempData[0]['absent_candidate']);
    //     $index=-1;

    //     foreach ($exam_dates as $key=>$date){
    //         if($date==$data['date_exam'][$data['key']]){
    //             if($exam_shifts[$key]==$data['shft_exam'][$data['key']]){
    //                 $index=$key;
    //                 break;
    //             }
    //         }
    //     }

    //     if($index!=-1){
    //         $data['present_candidate']=$present_candidates[$index];
    //         $data['absent_candidate']=$absent_candidates[$index];
    //     }
    //     else{
    //         $data['present_candidate']=0;
    //         $data['absent_candidate']=0;
    //     }


    //     $this->load->view('admin/includes/_header', $data);
    //     $this->load->view('admin/allocation/attendanceFormForUser', $data);
    //     $this->load->view('admin/includes/_footer', $data);
    // }


}
