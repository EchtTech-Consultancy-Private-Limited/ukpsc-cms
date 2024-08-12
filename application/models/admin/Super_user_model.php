<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_user_model extends CI_Model {

 
    
     public function get_consent_data_by_super_user($exam_id) {
      
         $district_id = $this->session->userdata('state_id');
         $districtName = get_district_name($district_id);

        $this->db->from('ci_exam_according_to_school');
        // $this->db->like('ci_exam_according_to_school.district', $districtName);
         $this->db->where('ci_exam_according_to_school.ref_id', $exam_id);
        $this->db->where('ci_exam_according_to_school.district', $districtName);
        $this->db->where('ci_exam_according_to_school.invt_recieved', 1);

        // $this->db->where('ci_exam_according_to_school.ref_id IS NOT NULL', null);
       
        $this->db->order_by('ci_exam_according_to_school.id', 'desc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }   

   
}