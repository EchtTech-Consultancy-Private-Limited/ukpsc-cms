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
  

    public function login1(){

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
				if($this->input->post('school_registration_number') ){
					$type = 'school_registration_number';
				}else{
					$type = 'username';
				}
				$result = $this->auth_model->login($data,$type);
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
						redirect(base_url('admin/dashboard'), 'refresh');
//						if($result['is_supper'])
//						redirect(base_url('admin/dashboard/index_1'), 'refresh');
//						else
//						redirect(base_url('admin/dashboard/index_2'), 'refresh');

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
		public function login(){
			$error_type = false;
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', $data['errors']);
					redirect(base_url('admin/auth/login'), 'refresh');
				} else {
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
					if (is_numeric($this->input->post('username'))) {
						$type = 'school_registration_number';
					} else {
						$type = 'username';
					}
		
					$result = $this->auth_model->login($data, $type);					
					if ($result) {						
		
						if ($result['is_verify'] == 0) {
							$this->session->set_flashdata('error', 'Please verify your email address!');
							redirect(base_url('admin/auth/login'));
							exit();
						}
						if ($result['is_active'] == 0) {
							$this->session->set_flashdata('error', 'Account is disabled as per your request!');
							redirect(base_url('admin/auth/login'));
							exit();
						}
		
						if ($result['is_admin'] == 1) {
							$admin_data = array(
								'admin_id' => $result['admin_id'],
								'username' => $result['username'],
								'fullname' => $result['firstname'] . " " . $result['middlename'] . " " . $result['lastname'],
								'admin_role_id' => $result['admin_role_id'],
								'email' => $result['email'],
								'mobile_no' => $result['pri_mobile'],
								'admin_role' => $result['admin_role_title'],
								'state_id' => $result['state_id'],
								'district_id' => $result['district_id'],
								'is_supper' => $result['is_supper'],
								'last_login' => $result['last_login'],
								'last_ip' => $result['last_ip'],
								'is_admin_login' => TRUE
							);
		
							$this->session->set_userdata($admin_data);
							$this->rbac->set_access_in_session(); // Set access in session
		
							$admin_role_id = $this->session->userdata['admin_role_id'];
							$admin_id = $this->session->userdata['admin_id'];
							// Check if any important fields are empty or null							
							$required_fields = [
								'username',
								'school_registration_number',
								'school_name',
								'address',
								'principal_name',
								'whats_num',
								'pri_mobile',
								'email_id',
								'firstname',
								'middlename',
								'lastname',
								// 'state_id',
								// 'district_id',
							];
							foreach ($required_fields as $field) {
								if (!isset($result[$field]) || empty($result[$field])) {
									if ($admin_role_id == 6) {
										redirect(base_url('admin/step1'), 'refresh');
									}
									$this->session->set_flashdata('error', 'Please complete your profile before proceeding.');
									redirect(base_url('admin/profile/'), 'refresh');
									exit();
								}
							}
							if ($admin_role_id == 6) {
								$data = $this->db->select('*')->from('ci_exam_registration')->where('admin_id', $admin_id)->get()->result_array();
								$match = count($data);
								if ($match != 0) {
									redirect(base_url('admin/dashboard'), 'refresh');
								} else {
									redirect(base_url('admin/step1'), 'refresh');
								}
							} else if ($admin_role_id == 5) {
								redirect(base_url('admin/dashboard'), 'refresh');
							} else {
								redirect(base_url('admin/dashboard'), 'refresh');
							}
						}
					} else {
						$error_type = true;
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						redirect(base_url('admin/auth/login'));
					}
				}
			} else {
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
		
		
		// public function register(){

		// 	if($this->input->post('submit')){

		// 		// for google recaptcha
		// 		if ($this->recaptcha_status == true) {
		//             if (!$this->recaptcha_verify_request()) {
		//                 $this->session->set_flashdata('form_data', $this->input->post());
		//                 $this->session->set_flashdata('error', 'reCaptcha Error');
		//                 redirect(base_url('admin/auth/register'));
		//                 exit();
		//             }
		//         }
	        
			
		// 		// $this->form_validation->set_rules('school_registration_number', 'School Registration Number', 'trim|is_unique[ci_admin.school_registration_number]|required');
		// 		// $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		// 		$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[ci_admin.email]|required');
			
		// 		if ($this->form_validation->run() == FALSE) {
		// 			$data = array(
		// 				'errors' => validation_errors()
		// 			);
		// 			$this->session->set_flashdata('form_data', $this->input->post());
		// 			$this->session->set_flashdata('errors', $data['errors']);
		// 			redirect(base_url('admin/auth/register'),'refresh');
		// 		}
		// 		else{

		// 			$data = array(
		// 					'school_name' => $this->input->post('school_name'),
		// 					'username' => $this->input->post('email'),
		// 					'school_registration_number' => $this->input->post('school_registration_number'),
		// 					'address' => $this->input->post('address'),
		// 					'landmark' => $this->input->post('landmark'),
		// 					'district' => $this->input->post('district'),
		// 					'admin_role_id' => 6, // By default i putt role is 2 for registraiton
		// 					'city' => $this->input->post('city'),
		// 					'principal_name' => $this->input->post('principal_name'),
		// 					'pri_mobile' => $this->input->post('pri_mobile'),
		// 					'email' => $this->input->post('email'),
		// 					'whats_num' => $this->input->post('whats_num'),
		// 					'password' =>  password_hash($this->input->post('pri_mobile'), PASSWORD_BCRYPT),
		// 					'is_active' => 1,
		// 					'is_verify' => 0,
		// 					'token' => md5(rand(0,1000)),    
		// 					'last_ip' => $this->input->ip_address(),
		// 					'created_at' => date('Y-m-d h:m:s'),
		// 					'updated_at' => date('Y-m-d h:m:s'),
		// 			);
		// 			$data = $this->security->xss_clean($data);
		// 			$result = $this->auth_model->register($data);
		// 			if($result){
		// 				//sending welcome email to user
		// 				$this->load->helper('email_helper');

		// 				$mail_data = array(
		// 					'fullname' => $data['principal_name'].' '.'-'.$data['school_name'],
		// 					'email' => $data['email'],
		// 					'verification_link' => base_url('admin/auth/verify').'/'.$data['token']
		// 				);

		// 				$to = $data['email'];

		// 				$email = $this->mailer->mail_template($to,'email-verification',$mail_data);

		// 				if($email){
		// 					$this->session->set_flashdata('success', 'Your account has been successfully created, please verify it by clicking the activation link that has been send to your email address and generate your new password to log in to UKPSC.');	
		// 					redirect(base_url('admin/auth/login'));
		// 				}	
		// 				else{
		// 					echo 'Email Error';
		// 				}
		// 			}
		// 		}
		// 	}
		// 	else{
		// 		$data['title'] = 'Create an Account';
		// 		$data['navbar'] = false;
		// 		$data['sidebar'] = false;
		// 		$data['footer'] = false;
		// 		$data['bg_cover'] = true;
  //               $data['states'] = $this->location_model->get_states();
		// 		// $data['school_num'] = $this->location_model->get_last_reg_number();
		// 		// print_r($data['school_num']); die();
  //               $data['role'] = $this->auth_model->get_auth_dd();
		// 		$this->load->view('admin/includes/_header', $data);
		// 		$this->load->view('admin/auth/register');
		// 		$this->load->view('admin/includes/_footer', $data);
		// 	}
		// }


		public function register(){
       
			// die('hello');
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
			
				// $this->form_validation->set_rules('school_registration_number', 'school_registration_number', 'trim|required');
				// $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

				// $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[ci_admin.email]|required');
				
				// $this->form_validation->set_rules('email', 'Email', 'required|callback_email_unique');
				// $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[ci_admin.email]');
				// $this->form_validation->set_rules('school_registration_number', "Registration Number already registered<br/>पंजीकरण संख्या पहले से पंजीकृत<br/>", 'required|is_unique|[ci_admin.school_registration_number]');
				
				// if ($this->form_validation->run() == FALSE){
				// 	echo '<pre>';
				// 	echo 'email duplicate';
				// 	exit;
				// }else{
				// 	echo '<pre>';
				// 	echo 'email not duplicate';
				// 	exit;
				// }	

				$school_registration_result = $this->auth_model->schoolregistrationcheck($this->input->post('school_registration'));
				$result = $this->auth_model->emailcheck($this->input->post('email'));
				$mobileDuplicate = $this->auth_model->mobileCheck($this->input->post('pri_mobile'));
				//print_r($school_registration_result);die;
				if ($school_registration_result =='exit') {
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('allerrorshow', "Registration Number already registered<br/>पंजीकरण संख्या पहले से पंजीकृत<br/>");
					redirect(base_url('admin/auth/register'));
				}elseif($result){

					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('allerrorshow', "Email already registered<br/>ईमेल पहले से ही पंजीकृत है");
					redirect(base_url('admin/auth/register'));
				}elseif($mobileDuplicate){

					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('allerrorshow', "Mobile already registered on this school (".$mobileDuplicate.")<br/>मोबाइल नंबर पहले से ही पंजीकृत है");
					redirect(base_url('admin/auth/register'));
				}
				else{
					// echo 'email not duplicate';exit;
					$city_id = $this->input->post('city');
					$generateukpscid = $this->auth_model->generateukpscid($city_id);
					// echo '<pre>';print_r($generateukpscid[0]->subcityname);exit;
					$generateukpscidstring = $generateukpscid[0]->subcityname;
					$generateukpscidchar = strtolower(substr($generateukpscidstring, 0, 3));
					// echo $generateukpscidchar;
					$lastincrementid = $this->auth_model->lastincrementid();
					$lastincrementid = $lastincrementid[0]->adminid;
					$insertincrementid = $lastincrementid + 1; 		
					$lastincrementid = $this->lastidlength($insertincrementid);
					$ukpscid = $generateukpscidchar.$lastincrementid;
			
					$a=  $this->input->post('state').''.$this->input->post('city').''.time();
					$completeAddress = $this->input->post('address1')." ".$this->input->post('address2')." ".$this->input->post('address3');
				
					$uni_sch_reg =  substr($a,1,6);
					// print_r($uni_sch_reg); die();

						$data = array(
							'school_name' => $this->input->post('school_name'),
							'username' => $this->input->post('email'),
							// 'uni_sch_reg' =>$school_registration ,
							'uni_sch_reg' =>$this->input->post('school_registration'),
							'school_registration_number' => $uni_sch_reg,
							// 'address' => $this->input->post('address'),
							'address' => $completeAddress,
							'landmark' => $this->input->post('landmark'),
							// 'state' => $this->input->post('district'),
							'district' => $this->input->post('district'),
							// 'district' => $this->input->post('state'),
							// 'admin_role_id' => 6, // By default i putt role is 2 for registraiton
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
							'ukpscid' => $ukpscid,
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
						// Message for Mobile 
						$messageP1='Dear Sir/Madam ,';
						$messageP1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.';
						$messageP1.='Regards,';
						$messageP1.='UKPSC, Haridwar';
						// Message For Email Address 
						$messageE1='Dear Sir/Madam ,<br>';
						$messageE1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.<br>';
						$messageE1.='Regards,<br>';
						$messageE1.='UKPSC, Haridwar';
						
						$email = $data['email'];
						$phone = $this->input->post('pri_mobile');
						$template_id = "1007239655187710009";
						// EMAIL AND MESSAGE SEND UDING TEMPLETE
						sendSMS($phone,$messageP1,$template_id);
						//sendEmail($email,$messageE1,$template_id);


						if($email){
							$this->session->set_flashdata('registersuccess', 'Your account has been successfully created, please verify it by clicking the activation link that has been sent to your email address and generate your new password to log in to UKPSC.');	
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
					'username' => $data['username'].'-'.'    Registration ID -  '.$data['school_registration_number'],
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
				$verification_id= $this->uri->segment(4);
                $checkTokenExpire = $this->auth_model->checkTokenexpire($verification_id);
              
                $this->load->view('admin/includes/_header2');
                if($checkTokenExpire)
                {
                	$this->load->view('admin/auth/create_password');
                }
                else{
                	$this->load->view('admin/auth/tokenExpire');
                }
			
			   
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

				$this->load->view('admin/includes/_header2');
			$this->load->view('admin/auth/create_password');
			// $this->load->view('admin/includes/_footer');
			}


		
		}

		public function update_user_info(){
			$adminId = $this->session->userdata('admin_id');
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('mobile_otp', 'Mobile OTP', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('mail_otp', 'Mail OTP', 'trim|required|min_length[6]');   

				//if($this->input->post('mobile_otp')){
					$checkMObileOTP = $this->db->select('*')->where(
								array('user_id' => $adminId,'otp_type'=>'mobile','otp_no'=>$this->input->post('mobile_otp')))
								->get('ci_otp');
				
				//}
				//if($this->input->post('mail_otp')){
					$checkMailOTP = $this->db->select('*')->where(
									array('user_id' => $adminId,'otp_type'=>'mail','otp_no'=>$this->input->post('mail_otp'))
									)->get('ci_otp');
				//}
				
				if($checkMObileOTP->num_rows() == 0)
				{
					$this->session->set_flashdata('error','Failed to send mobile OTP.');
					redirect(base_url('admin/auth/update_user_info','refresh'));

				}elseif($checkMailOTP->num_rows() == 0) {
					$this->session->set_flashdata('error','Failed to send mail OTP.');
					redirect(base_url('admin/auth/update_user_info','refresh'));
				}else{
		
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$mobile_no = $this->input->post('pri_mobile');
					$email = $this->input->post('email');
					$this->auth_model->reset_ci_exam_according_to_school($email,$mobile_no, $new_password);
					$this->auth_model->reset_ci_exam_registration($email,$mobile_no, $new_password);
					$this->auth_model->reset_ci_admin($email,$mobile_no, $new_password);
					$updateRequest = $this->auth_model->reset_ci_admin($email,$mobile_no, $new_password);
					//print_r($updateRequest);die;
					if($updateRequest){
						$this->auth_model->otp_delete_row($adminId);
						$this->session->set_flashdata('success','New password has been Updated successfully.Please login below with latest Login id and password');
						redirect(base_url('admin/auth/login'));
					}
					else{
						echo "Unable to update info";
					}
				}

				}else{

				$data['title'] = 'Update info';
				$this->load->view('admin/includes/_header', $data);
		        // $this->load->view('admin/exam/exam_list_super_user', $data);
		        $this->load->view('admin/auth/updateUserInfoPage');
		        $this->load->view('admin/includes/_footer', $data);
				// $this->load->view('admin/includes/_footer');
			}
		}


		public function lastidlength($lastincrementid){

			if(strlen($lastincrementid) == 4){
				return $newincrementid;
			}elseif((strlen($lastincrementid) == 3)){
				$newincrementid = '0'. $lastincrementid;
				return $newincrementid;
			}elseif((strlen($lastincrementid) == 2)){
				$newincrementid = '0'.'0'.$lastincrementid;
				return $newincrementid;
			}elseif((strlen($lastincrementid) == 1)){
				$newincrementid = '0'.'0'.'0'.$lastincrementid;
				return $newincrementid;
			}
		}

		

		//--------------------------------------------------		
		public function forgot_password(){
              
				if($this->input->post('submit')){
					
				//checking server side validation
				// $this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				// if ($this->form_validation->run() == FALSE) {
				// 	echo 'Hii ';
				// 	die();
				// 	$data = array(
				// 		'errors' => validation_errors()
				// 	);
				// 	$this->session->set_flashdata('errors', $data['errors']);
				// 	redirect(base_url('admin/auth/forget_password'),'refresh');
				// }

				$email = $this->input->post('email');
				
			
				$response = $this->auth_model->check_user_mail($email);
				if($response){
                   
					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['admin_id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
					
					
					// $messageP1='Dear Applicant ,%0a';
					// $messageP1.='Kindly reset your password using the following link.'.$mail_data['reset_link'].'.%0a';
					// $messageP1.='Regards,%0a';
					// $messageP1.='UKPSC';

					// // Message For Email Address 
					// $messageE1='Dear Applicant ,<br>';
					// $messageE1.='Kindly reset your password using the following link.'. $mail_data['reset_link'].'<br>';
					// $messageE1.='Regards,<br>';
					// $messageE1.='UKPSC';
					
					
					// $phone = $response['pri_mobile'];
					// $template_id = "1007491885374897823";

					// --- sending email
					$to = $response['email'];
					$mail_data= array(
						'fullname' => $response['firstname'].' '.$response['lastname'],
						'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
					);
					$this->mailer->mail_template($to,'forget-password',$mail_data);



					// EMAIL AND MESSAGE SEND UDING TEMPLETE
					 sendSMS($phone,$messageP1,$template_id);
					// sendEmail($email,$messageE1,$template_id);
					if($email){
						
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('admin/auth/login'));
					}
					else{
						echo 'Bye';
						die();
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

				$this->load->view('admin/includes/_header3', $data);
				$this->load->view('admin/auth/forget_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

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

					$this->load->view('admin/includes/_header3', $data);
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


		public function remove_flassession(){

			$this->session->set_flashdata('errors', false);
			echo "1";
			exit;
		}



		public function sendSMSEMAIL(){
			
			$messageP1='Dear Sir/Madam ,';
			$messageP1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.';
			$messageP1.='Regards,';
			$messageP1.='UKPSC, Haridwar';
			
			$messageE1='Dear Sir/Madam ,<br>';
			$messageE1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.<br>';
			$messageE1.='Regards,<br>';
			$messageE1.='UKPSC, Haridwar';

            $email = 'demo@yopmail.com';
			$phone = '8700488718';

			$email = $data['email'];
			$phone = $this->input->post('pri_mobile');
			$template_id = "1007239655187710009";
			// EMAIL AND MESSAGE SEND UDING TEMPLETE
			sendSMS($phone,$messageP1,$template_id);
			sendEmail($email,$messageE1,$template_id);
		}
		public function mailUpdate(){
			$adminId = $this->session->userdata('admin_id');
			$mail = $this->input->post('mail');

				$checkMailOTP = $this->db->select('*')->where(
								array('user_id' => $adminId,'otp_type'=>'mail','otp_no'=>$this->input->post('mail_otp'))
								)->get('ci_otp');
				
				if($checkMailOTP->num_rows() == 0) {
					$response = array(
						'status' => 'error',
						'message' => "<h3>Mail OTP wrong.</h3>"
					);
				}else{
				$data = array(
					'email' => $mail,
					//'username ' =>$mail,
				);
				$this->db->where('admin_id', $adminId)
						->update('ci_exam_according_to_school', $data);
				$this->db->where('admin_id', $adminId)
						->update('ci_exam_registration', $data);
				$status = $this->db->where('admin_id', $adminId)
						->update('ci_admin', $data);
				//print_r($this->db->last_query());die;
				if($status ==true){
					$response = array(
						'status' => 'success',
						'message' => "<h3>Mail change successfully.</h3>"
					);
				}else{
				
					$response = array(
						'status' => 'error',
						'message' => "<h3>Mail not change.</h3>"
					);
				}
			}
			$this->output
					->set_content_type('application/json')
					->set_output(json_encode($response));
		}
		public function mobileUpdate(){
			$adminId = $this->session->userdata('admin_id');
			$mobile_no = $this->input->post('mail');
			$checkMObileOTP = $this->db->select('*')->where(
				array('user_id' => $adminId,'otp_type'=>'mobile','otp_no'=>$this->input->post('mobile_otp')))
				->get('ci_otp');
			if($checkMObileOTP->num_rows() == 0)
			{
				$response = array(
					'status' => 'error',
					'message' => "<h3>Mobile OTP wrong.</h3>"
				);

			}else{
				$data = array(
					'pri_mobile' => $mobile_no,
				);
				$this->db->where('admin_id', $adminId)
						->update('ci_exam_according_to_school', $data);
				$this->db->where('admin_id', $adminId)
						->update('ci_exam_registration', $data);
				$status = $this->db->where('admin_id', $adminId)
						->update('ci_admin', $data);
				//print_r($status);die;
				if($status ==true){
					$response = array(
						'status' => 'success',
						'message' => "<h3>Mobile change successfully.</h3>"
					);
				}else{
				
					$response = array(
						'status' => 'error',
						'message' => "<h3>Mobile not change.</h3>"
					);
				}
			}
			$this->output
					->set_content_type('application/json')
					->set_output(json_encode($response));
		}
		public function passwordUpdate(){
			$adminId = $this->session->userdata('admin_id');
			$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$data = array(
				'password' => $new_password
			);
			// $this->db->where('admin_id', $adminId)
			// 		   ->update('ci_exam_according_to_school', $data);
			// $this->db->where('admin_id', $adminId)
			// 		   ->update('ci_exam_registration', $data);
			$status = $this->db->where('admin_id', $adminId)
					   ->update('ci_admin', $data);
			//print_r($status);die;
			if($status ==true){
				$response = array(
					'status' => 'success',
					'message' => "<h3>Password changed successfully.</h3>"
				);
			}else{
			
				$response = array(
					'status' => 'error',
					'message' => "<h3>Password not change.</h3>"
				);
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
			//echo $status;
			//return  $status;
			//die();
		}
		public function sendOTP()
		{
			$val = $this->input->post('data');
			$otptype = $this->input->post('otptype');
			$admin_id = $this->session->userdata['admin_id'];
			
			// Validate the email2
			if($otptype == 'mail'){
				
				if (($val)) {
					//print_r($val);die;
					// Generate OTP
					$otp = rand(100000, 999999);
					// Save the OTP in session or database (based on your use case)
					$this->session->set_userdata('otp', $otp);
					// Send OTP via email (you can send via SMS if you have an SMS gateway)
					// Message For Email Address 
					$template_id = "1007187824778437199";
					$messageE1='Dear Applicant ,<br><br>';
					$messageE1.='Your One Time Password (OTP) for resetting your password is '. $otp.'<br><br><br>';
					$messageE1.='Regards,<br>';
					$messageE1.='UKPSC';
					
					$results = $this->auth_model->otpUpdate($val,$otptype,$otp);
					
				// EMAIL AND MESSAGE SEND UDING TEMPLETE
					sendEmail($val,$messageE1,$template_id);
					//print_r($result == "Message Sent Successfully !");die;
					// if ("Message Sent Successfully !") {
					// 	echo json_encode(['success' => true, 'message' => 'OTP sent successfully.']);
					// } else {
					// 	echo json_encode(['success' => false, 'message' => 'Failed to send OTP.']);
					// }
				} 
				else {
					echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
				}
			}else{

				$otp = rand(100000, 999999);
				$template_id = "1007187824778437199";
				$messageP1='Dear User, ';
				$messageP1.='Your One Time Password (OTP) for resetting your password is '.$otp.'. ';
				$messageP1.='Regards, ';
				$messageP1.='UKPSC';
				$this->auth_model->otpUpdate($val,$otptype,$otp);
				//print_r($messageP1);die;
				sendSMS($val,$messageP1,$template_id);
				
				//print_r($result);die;
				// if ($result == "Message Sent Successfully  11!") {
				// 	echo json_encode(['success' => true, 'message' => 'OTP sent successfully.']);
				// } else {
				// 	echo json_encode(['success' => false, 'message' => 'Failed to send OTP.']);
				// }
			}
			
		}



}  // end class

?>