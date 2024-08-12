<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_user extends MY_Controller {

    public function __construct() {



        parent::__construct();

        auth_check(); // check login auth

        $this->load->model('admin/Super_user_model', 'Super_user_model');
        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/auth_model', 'auth_model');

        $this->load->helper('date');
    }

    // 21-09-2022 New Functoin Add 

    public function exam_list_super_user()
    {
    	$data['title'] = 'Exam List';
    	 $this->db->from('ci_exam_invitation');
        // $this->db->group_by('exam_name');
        $this->db->order_by('id','desc');
        $q = $this->db->get()->result_array();
        $data['data'] = $q;
      
        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/exam_list_super_user', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function consent_recieved_by_super_user($exam_id) {
        $exam_id = base64_decode($exam_id);
     
        $exam_new_id =  get_exam_namewithStatusOne($exam_id);
        $data['exam_name'] = get_exam_name($exam_id);
        $data['title'] = 'Invitation and Schedule List';
        $data['data'] = $this->Super_user_model->get_consent_data_by_super_user($exam_new_id);
   
        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/super_user_consent_data', $data);

        $this->load->view('admin/includes/_footer', $data);
    }
    public function superUserStatus(){
        $examId = $_GET['exam_id'];
        $schoolId = $_GET['school_id'];
        $status = $_GET['status'];
          $data = array(
            'superuserStatus' => $status,

        );
        $status = $this->db->where('ref_id', $examId)
                   ->where('school_id', $schoolId)
                   ->where('ci_exam_according_to_school.invt_recieved', 1)
                   ->update('ci_exam_according_to_school', $data);
        echo $status;
        return  $status;
        die();
    }


    		public function superUserChangePassword(){

				if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$updateRequest = $this->auth_model->super_user_change_password($new_password);
					if($updateRequest){
							$this->session->set_flashdata('success','New password has been Updated successfully.Please login below with latest Login id and password');
					        redirect(base_url('admin/auth/login'));
					}
					else{
						echo "Unable to update info";
					}
				
			
			}else{

				$data['title'] = 'Update info';
				$this->load->view('admin/includes/_header', $data);
		        // $this->load->view('admin/exam/exam_list_super_user', $data);

		        $this->load->view('admin/auth/superUserChangePassword');
		        $this->load->view('admin/includes/_footer', $data);
						// $this->load->view('admin/includes/_footer');
			}


		
		}

}