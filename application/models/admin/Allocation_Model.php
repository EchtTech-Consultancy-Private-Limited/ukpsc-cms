<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_Model extends CI_Model {

   
      public function add_date_sheet($data) {

        $this->db->insert('ci_examination', $data);
         return true;
    }    

    public function get_data_for_allocation1() {

        $this->db->select('*');
        $this->db->where('invt_recieved', '1');
        $this->db->from('ci_exam_registration');
          
        $this->db->order_by(' id', 'asc');
         $query = $this->db->get();
        return $query->result_array();

    }    
     public function get_data_for_allocation($ref_id) {
       
      // New Code 30-09-2022
        $this->db->select('*');
        $this->db->from('ci_exam_according_to_school');
        $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_according_to_school.ref_id');
        $this->db->where('ci_exam_according_to_school.invt_recieved', 1);
        $this->db->where('ci_exam_according_to_school.superuserStatus', 1);
        $this->db->where('ci_exam_according_to_school.ref_id', $ref_id);
        $this->db->order_by('ci_exam_according_to_school.admin_id', 'asc');
        //End the queryProvisanal
        $query = $this->db->get();
        return $query->result_array();

    }
     public function get_data_for_allocationforFilters($ref_id,$district,$city_name,$grade_name) {
          $this->db->select('*');
          $this->db->from('ci_exam_according_to_school');
          $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_according_to_school.ref_id');
          $this->db->where('ci_exam_according_to_school.consents_signstamp_status', 1);
          $this->db->where('ci_exam_according_to_school.ref_id', $ref_id);
          if(!empty($district)){

            $this->db->where('ci_exam_according_to_school.district', $district);
          }
          if(!empty($city_name)){

            $this->db->where('ci_exam_according_to_school.city', $city_name);
          }
          if(!empty($grade_name)){

            $this->db->where('ci_exam_according_to_school.ranking_admin', $grade_name);
          }
        $this->db->order_by('ci_exam_according_to_school.admin_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();

    }

      public function get_data_for_allocation_user($exam_id) {
        $admin_id = $this->session->userdata('admin_id');
      
        $exam_id = getExamIdStatusActive($admin_id,$exam_id);
        $this->db->select('*');
        $this->db->from('ci_exam_according_to_school');
        $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_according_to_school.ref_id');
        $this->db->where('ci_exam_according_to_school.consents_signstamp_status', 1);
        $this->db->where('ci_exam_according_to_school.admin_id', $admin_id);
        $this->db->where('ci_exam_according_to_school.ref_id', $exam_id);
        $this->db->order_by('ci_exam_according_to_school.id', 'asc');
        $query = $this->db->get();
        return $query->result_array();

    }
      public function allocationConsentRecievedByUser($admin_id) {
         $ref_ids = $this->db->select('exam_id');
         $this->db->from('ci_allocation_table');
         $this->db->where('ci_allocation_table.admin_id', $admin_id);
         $this->db->where('ci_allocation_table.status', 1);
         $this->db->order_by('ci_allocation_table.id', 'asc');
         $ref_idsData = $this->db->get();
  
         $ref_idsData = $ref_idsData->result_array();
        
         $exam_ids = [];
         foreach ($ref_idsData as $exam_id) {    
         $exam_ids[] = $exam_id['exam_id'];
         }
         $exam_ids = count($exam_ids)>0?$exam_ids:[];
        if(count($exam_ids)>0)
        {
          $this->db->select('*');
          $this->db->from('ci_exam_invitation');
          $this->db->where_in('ci_exam_invitation.id',$exam_ids);
          $this->db->order_by('ci_exam_invitation.id', 'asc');
          $query = $this->db->get();
          $data = $query->result_array();
        }
        else{
          $data =[];
        }
        return $data;

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

  public function insertForAllocation($data){
    $this->db->where('school_id ', $data['school_id']);
    $this->db->where('exam_id ', $data['exam_id']);
    $query = $this->db->get('ci_allocation_table');
   
    $count = $query->num_rows();
    if($count == 0)
    {
      $this->db->insert(' ci_allocation_table', $data); 
      return '200';
    }
    else{
      $dataUpdate =[
        'exam_center_code'=>$data['exam_center_code'],
        'admin_id'=>$data['admin_id'],
        'candidate_array'=>$data['candidate_array'],
        'status'=>0
    ];
    $this->db->where('school_id ', $data['school_id']);
    $this->db->where('exam_id ', $data['exam_id']);
    $this->db->update('ci_allocation_table', $dataUpdate);
    return '201';
    }
 
  }
  public function markAttendanceAllocationInsert($data){
    $this->db->where('school_id ', $data['school_id']);
    $this->db->where('exam_id ', $data['exam_id']);
    $this->db->where('admin_id ', $data['admin_id']);
    $this->db->insert(' ci_mark_attendance_allocation', $data);
  }
  public function markAttendanceAllocationUpdate($data){
    $this->db->where('school_id ', $data['school_id']);
    $this->db->where('exam_id ', $data['exam_id']);
    $this->db->where('admin_id ', $data['admin_id']);
    $this->db->where('exam_date ', $data['exam_date']);
    $this->db->where('exam_shift ', $data['exam_shift']);
    $this->db->update('ci_mark_attendance_allocation', $data);
  }

  function get_city_by_state_id() {

    $district_id = $this->input->post('district_id');
    $query = $this->db->query("SELECT * from ci_cities c INNER JOIN ci_sub_cities cs ON c.id = cs.cities_id where cs.cities_id = $district_id and cs.status = 1");
    $query->result();
    $options = '<option value="">' .'Select City'. '</option>';
    foreach ($query->result() as $r) {
        $options .= '<option value="' . $r->id . '">' . $r->subcityname . '</option>';
    }
    echo $options;
}


function get_all_registration_data() {
    
  $this->db->from('ci_exam_according_to_school');

  $admin_role_id = $this->session->userdata('admin_role_id');
  
  if ($admin_role_id == 6) {
      
      $this->db->where('ci_exam_according_to_school.created_by',$this->session->userdata('admin_id'));
  }

  $filterData = $this->session->userdata('filter_keyword');
  $this->db->order_by('ci_exam_according_to_school.id', 'desc');
  $query = $this->db->get();
  $module = array();

  if ($query->num_rows() > 0) {
      $module = $query->result_array();
  }
  return $module;
}


public function get_data_for_allocation_update() {

  $this->db->select('*');
  $this->db->from('ci_exam_registration');
  $this->db->join('ci_invite_return', 'ci_invite_return.ref_id = ci_exam_registration.ref_id');
  $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_registration.ref_id');
  // $this->db->join('ci_invite_return','ci_invite_return.id =ci_exam_invitation.created_by');
  $this->db->where('ci_exam_invitation.created_by',
  $this->session->userdata('admin_id'));
  $this->db->order_by('ci_exam_registration.admin_id', 'asc');
  $query = $this->db->get();
  return $query->result_array();

}

public function sendAllocationForUser($school_ids,$exam_id){  
    $dataUpdate =[
      'status'=>1
  ];
  foreach(array_unique($school_ids) as $school_id){
  $this->db->where('school_id ', $school_id);
  $this->db->where('exam_id ', $exam_id);
  $this->db->update('ci_allocation_table', $dataUpdate);

  
  }
  return '201';
  
}

public function getSchoolListForAllocationExam($exam_id) {
  $this->db->select('*');
  $this->db->from('ci_mark_attendance_allocation');
  $this->db->where('ci_mark_attendance_allocation.exam_id', $exam_id);
  $this->db->order_by('ci_mark_attendance_allocation.exam_date', 'asc');
  $query = $this->db->get();
  return $query->result_array();

}
}
