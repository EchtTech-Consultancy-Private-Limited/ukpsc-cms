<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

                public function __construct(){

		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
        $this->load->model('admin/location_model', 'location_model');

	}

                //--------------------------------------------------------------
    public function index(){

		if($this->session->has_userdata('is_admin_login')){
			redirect('admin/dashboard');
		}
		else{
			redirect('admin/auth/login');
		}
	}
   
        public function checkmail() {
     
        $this->load->helper('email_helper');
        $mail_data = array(
            // 'fullname' => "Ashutosh" . ' ' . "Misra",
            'verification_link' => base_url('admin/auth/verify/') . '/' . md5(rand(0, 1000)),
        );
        // $to = "ashuvnsmgkvp@gmail.com";
        // $to = "shubham.sharma@echttech.com";
        $email = $this->mailer->mail_template($to, 'email-verification', $mail_data);
        if ($email) {
            $this->session->set_flashdata('Success', 'Your account has been successfully created, please verify it by clicking the activation link that has been sent to your email address');
            //redirect(base_url('admin/auth/login'));
            echo 'Email Send';
        } else {
            echo 'Email Error';
        }
    }
    //https://localhost/cerrs/admin/auth/run_query
//    public function run_query(){
//        $this->db->query('ALTER TABLE `ci_admin` ADD `idproof_no` VARCHAR(32) NULL AFTER `idproof`;');
//    }
    
    //--------------------------------------------------------------
    public function login(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('error', $data['errors']);
				redirect(base_url('admin/auth/login'),'refresh');
			}
			else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);
				if($result){
					if($result['is_verify'] == 0){
						$this->session->set_flashdata('error', 'Please verify your email address!');
						redirect(base_url('admin/auth/login'));
						exit();
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', 'Account is disabled as per as your request !');
						redirect(base_url('admin/auth/login'));
						exit();
					}
					if($result['is_admin'] == 1){
                                            
						$admin_data = array(
							'admin_id' => $result['admin_id'],
							'username' => $result['username'],
							'fullname' => $result['firstname']." ".$result['middlename']." ".$result['lastname'],
							'admin_role_id' => $result['admin_role_id'],
							'admin_role' => $result['admin_role_title'],
							'state_id' => $result['state_id'],
							'district_id' => $result['district_id'],
							'is_supper' => $result['is_supper'],
							'last_login' => $result['last_login'],
							'last_ip' => $result['last_ip'],
							'is_admin_login' => TRUE
						);
						$this->session->set_userdata($admin_data);
						$this->rbac->set_access_in_session(); // set access in session
						$admin_id = $this->session->userdata['admin_id'];
						$admin_role_id = $this->session->userdata['admin_role_id'];
						if($admin_role_id == 6){
                        $data = $this->db->select('*')->from('ci_exam_registration')->where('admin_id',$admin_id)->get()->result_array();
                        $match = count($data);
                        if($match != 0 ){
			             redirect(base_url('admin/dashboard'), 'refresh');
                        }else{
                        	redirect(base_url('admin/consent_letter/consent_add'), 'refresh');
                        }
                    }else if($admin_role_id == 5){
                    	// redirect(base_url('admin/dashboard'), 'refresh');
                    	 redirect(base_url('admin/consent_letter/consent_list'), 'refresh');
                    }else{

                    	redirect(base_url('admin/dashboard'), 'refresh');
                    } 
						}
					}
					else{
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						redirect(base_url('admin/auth/login'));
					}
				}
			}
			else{
				$data['title'] = 'Login';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/login');
				$this->load->view('admin/includes/_footer', $data);
			}
		}	

		//-------------------------------------------------------------------------
		public function register(){

			if($this->input->post('submit')){

				// for google recaptcha
				if ($this->recaptcha_status == true) {
		            if (!$this->recaptcha_verify_request()) {
		                $this->session->set_flashdata('form_data', $this->input->post());
		                $this->session->set_flashdata('error', 'reCaptcha Error');
		                redirect(base_url('admin/auth/register'));
		                exit();
		            }
		        }
	        
			
				$this->form_validation->set_rules('school_registration_number', 'school_registration_number', 'trim|required');
				// $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[ci_admin.email]|required');
			
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/register'),'refresh');
				}
				else{

					$data = array(
							'school_name' => $this->input->post('school_name'),
							'username' => $this->input->post('email'),
							'school_registration_number' => $this->input->post('school_registration_number'),
							'address' => $this->input->post('address'),
							'landmark' => $this->input->post('landmark'),
							'district' => $this->input->post('district'),
							'admin_role_id' => 6, // By default i putt role is 2 for registraiton
							'city' => $this->input->post('city'),
							'principal_name' => $this->input->post('principal_name'),
							'pri_mobile' => $this->input->post('pri_mobile'),
							'email' => $this->input->post('email'),
							'whats_num' => $this->input->post('whats_num'),
							'password' =>  password_hash($this->input->post('pri_mobile'), PASSWORD_BCRYPT),
							'is_active' => 1,
							'is_verify' => 0,
							'token' => md5(rand(0,1000)),    
							'last_ip' => $this->input->ip_address(),
							'created_at' => date('Y-m-d h:m:s'),
							'updated_at' => date('Y-m-d h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->auth_model->register($data);
					if($result){
						//sending welcome email to user
						$this->load->helper('email_helper');

						$mail_data = array(
							'fullname' => $data['principal_name'].' '.'-'.$data['school_name'],
							'email' => $data['email'],
							'verification_link' => base_url('admin/auth/verify').'/'.$data['token']
						);

						$to = $data['email'];

						$email = $this->mailer->mail_template($to,'email-verification',$mail_data);

						if($email){
							$this->session->set_flashdata('success', 'Your account has been successfully created, please verify it by clicking the activation link that has been send to your email address and generate your new password to log in to UKPSC.');	
							redirect(base_url('admin/auth/login'));
						}	
						else{
							echo 'Email Error';
						}
					}
				}
			}
			else{
				$data['title'] = 'Create an Account';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;
                $data['states'] = $this->location_model->get_states();
                $data['role'] = $this->auth_model->get_auth_dd();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/register');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

		//----------------------------------------------------------	
		public function verify(){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
               
				$verification_id= $this->uri->segment(4);
				
	            $verified= $this->auth_model->email_verification($verification_id);
	          
  				if($verified){

  					$new_password1 = $this->input->post('password');
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					
					$this->auth_model->reset_password1($verified, $new_password ,$new_password1);

					$this->load->helper('email_helper');
					$data = $this->db->select('*')->from('ci_admin')->where('admin_id',$verified)->get()->row_array();
					$mail_data = array(
					'fullname' => $data['principal_name'],
					'username' => $data['username'],
					'password' => $data['password_show'],
					
					);
					$to = $data['email'];
					$email = $this->mailer->mail_template($to,'welcome-email',$mail_data);


					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below with latest Login id and password');
					redirect(base_url('admin/auth/login'));



			}
			else{
				$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('admin/auth/login'));
			}
			}else{

				$this->load->view('admin/includes/_header');
			$this->load->view('admin/auth/create_password');
			// $this->load->view('admin/includes/_footer');
			}


		
		}




		public function create_password(){

				if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
               
				$verification_id= $this->uri->segment(4);
				
	            $verified= $this->auth_model->email_verification($verification_id);
	          
  				if($verified){

					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password1($verified, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below with latest Login id and password');
					redirect(base_url('admin/auth/login'));
			}
			else{
				echo 'token not valid';die;
			}
			}else{

				$this->load->view('admin/includes/_header');
			$this->load->view('admin/auth/create_password');
			// $this->load->view('admin/includes/_footer');
			}


		
		}

		

		//--------------------------------------------------		
		public function forgot_password(){

				if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/forget_password'),'refresh');
				}

				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);

				if($response){

					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['admin_id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
					
					// --- sending email
					$to = $response['email'];
					$mail_data= array(
						'fullname' => $response['firstname'].' '.$response['lastname'],
						'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
					);
					$this->mailer->mail_template($to,'forget-password',$mail_data);

					if($email){
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('admin/auth/login'));
					}
					else{
						$this->session->set_flashdata('error', 'There is the problem on your email');
						redirect(base_url('admin/auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'Invalid Email');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
			else{

				$data['title'] = 'Forget Password';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/forget_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

		//----------------------------------------------------------------		
		// public function reset_password($id=0){

		// 	// print_r("hi");

		// 	// check the activation code in database
		// 	if($this->input->post('submit')){
		// 		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		// 		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

		// 		if ($this->form_validation->run() == FALSE) {
		// 			$data = array(
		// 				'errors' => validation_errors()
		// 			);

		// 			$this->session->set_flashdata('reset_code', $id);
		// 			$this->session->set_flashdata('errors', $data['errors']);
		// 			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		// 		}
  
		// 		else{
		// 			$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		// 			$this->auth_model->reset_password($id, $new_password);
		// 			$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
		// 			redirect(base_url('admin/auth/login'));
		// 		}
		// 	}
		// 	else{
		// 		$result = $this->auth_model->check_password_reset_code($id);

		// 		if($result){

		// 			$data['title'] = 'Reseat Password';
		// 			$data['reset_code'] = $id;
		// 			$data['navbar'] = false;
		// 			$data['sidebar'] = false;
		// 			$data['footer'] = false;
		// 			$data['bg_cover'] = true;

		// 			$this->load->view('admin/includes/_header', $data);
		// 			$this->load->view('admin/auth/reset_password');
		// 			$this->load->view('admin/includes/_footer', $data);

		// 		}
		// 		else{
		// 			$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
		// 			redirect(base_url('admin/auth/forgot_password'));
		// 		}
		// 	}
		// }


			public function reset_password($id=0){

			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);

					$this->session->set_flashdata('reset_code', $id);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
  
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('admin/auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);

				if($result){

					$data['title'] = 'Reset Password';
					$data['reset_code'] = $id;
					$data['navbar'] = false;
					$data['sidebar'] = false;
					$data['footer'] = false;
					$data['bg_cover'] = true;

					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/auth/reset_password');
					$this->load->view('admin/includes/_footer', $data);

				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
		}


		

		//-----------------------------------------------------------------------
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/auth/login'), 'refresh');
		}
		
		// Get Country. State and City
		//----------------------------------------
		public function get_country_states()
		{
			$states = $this->db->select('*')->where('country_id',$this->input->post('country'))->get('ci_states')->result_array();
		    $options = array('' => 'Select Option') + array_column($states,'name','id');
		    $html = form_dropdown('state',$options,'','class="form-control select2" required');
			$error =  array('msg' => $html);
			echo json_encode($error);
		}

		//----------------------------------------
		public function get_state_cities()
		{
			$cities = $this->db->select('*')->where('state_id',$this->input->post('state'))->get('ci_cities')->result_array();
		    $options = array('' => 'Select Option') + array_column($cities,'name','id');
		    $html = form_dropdown('city',$options,'','class="form-control select2" required');
			$error =  array('msg' => $html);
			echo json_encode($error);
		}

	}  // end class


?>   