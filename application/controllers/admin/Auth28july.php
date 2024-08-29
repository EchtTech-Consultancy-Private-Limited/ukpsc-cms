<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends MY_Controller {
	
		public function __construct(){
			parent::__construct();
			$this->load->library('mailer');
			$this->load->model('admin/auth_model', 'auth_model');
			$this->load->model('admin/location_model', 'location_model');
		}

                //--------------------------------------------------------------
    public function Login_old_file(){
    	$this->load->view('admin/auth/login_old',array('error' => ' ' ));

	// $this->load->view('upload_form', array('error' => ' ' ));
	}


  public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;


                // if (!empty($_FILES['userfile']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName5']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('userfile')) {

                        $uploadData = $this->upload->data();
                        $fileName5 = $uploadData['file_name'];
                    } 

                    echo 'kk';
                    die();
                //     else {

                //         $error = array('error' => $this->upload->display_errors());
                //         $this->session->set_flashdata('error', $error['error']);
                //         $fileName5 = '';
                //     }
                // } else {

                //     $fileName5 = '';
                // }



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
				if(is_numeric($this->input->post('username'))  ){
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
						$admin_id = $this->session->userdata['admin_id'];
						$admin_role_id = $this->session->userdata['admin_role_id'];
						 $this->session->userdata['last_login'];
						 $this->session->userdata['last_ip'];
						if($admin_role_id == 6){
                        $data = $this->db->select('*')->from('ci_exam_registration')->where('admin_id',$admin_id)->get()->result_array();
                        $match = count($data);
                        if($match != 0 ){
						
			             redirect(base_url('admin/dashboard'), 'refresh');
                        }else{
                        	redirect(base_url('admin/step1'), 'refresh');
                        }
                    }else if($admin_role_id == 5){
                    	redirect(base_url('admin/dashboard'), 'refresh');
                    	//  redirect(base_url('admin/consent_letter/consent_list'), 'refresh');
                    	 
                    }else{
					
                    	redirect(base_url('admin/dashboard'), 'refresh');
                    } 
						}
						
					}
					else{
						$error_type = true;
						// echo $error_type; die();
						// $this->session->set_flashdata('errors', 'Invalid Username or Password!');
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						//$this->session->set_flashdata('errors_type', $error_type);
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
			

				$school_registration_result = $this->auth_model->schoolregistrationcheck($this->input->post('school_registration'));
				$result = $this->auth_model->emailcheck($this->input->post('email'));
				
				if ($school_registration_result) {

					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('allerrorshow', "Registration Number already registered<br/>पंजीकरण संख्या पहले से पंजीकृत<br/>");
					redirect(base_url('admin/auth/register'));
				}elseif($result){

					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('allerrorshow', "Email already registered<br/>ईमेल पहले से ही पंजीकृत है");
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
				
					$uni_sch_reg =  substr($a,1,4);
						$data = array(
							'school_name' => $this->input->post('school_name'),
							'username' => $this->input->post('email'),
							'uni_sch_reg' =>$this->input->post('school_registration'),
							'school_registration_number' => $uni_sch_reg.$lastincrementid,
							'address' => $completeAddress,
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

						
						// Message for Mobile 
					
						$messageP1='Dear Sir/Madam ,';
						$messageP1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.';
						$messageP1.='Regards,';
						$messageP1.='UKPSC, Haridwar';
						
						$email = $data['email'];
						$phone = $this->input->post('pri_mobile');
						$template_id = "1007239655187710009";
						// EMAIL AND MESSAGE SEND UDING TEMPLETE
						sendSMS($phone,$messageP1,$template_id);
						
						$emailll = $this->mailer->mail_template($email,'primary-registration');
						$email = $this->mailer->mail_template($to,'email-verification',$mail_data);

						// sendEmail($email,$messageE1,$template_id);


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
     
                    
                   
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$mobile_no = $this->input->post('pri_mobile');
					$email = $this->input->post('email');
					$this->auth_model->reset_ci_exam_according_to_school($email,$mobile_no, $new_password);
					$this->auth_model->reset_ci_exam_registration($email,$mobile_no, $new_password);
					$this->auth_model->reset_ci_admin($email,$mobile_no, $new_password);
					$updateRequest = $this->auth_model->reset_ci_admin($email,$mobile_no, $new_password);
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
					// $to = $response['email'];
					// $mail_data= array(
					// 	'fullname' => $response['firstname'].' '.$response['lastname'],
					// 	'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
					// );
					// $this->mailer->mail_template($to,'forget-password',$mail_data);
					$messageP1='Dear Applicant ,%0a';
					$messageP1.='Kindly reset your password using the following link.'.$mail_data['reset_link'].'.%0a';
					$messageP1.='Regards,%0a';
					$messageP1.='UKPSC';
					// Message For Email Address 
					$messageE1='Dear Applicant ,<br>';
					$messageE1.='Kindly reset your password using the following link.'. $mail_data['reset_link'].'<br>';
					$messageE1.='Regards,<br>';
					$messageE1.='UKPSC';
					
					$email = $to;
					$phone = $response['pri_mobile'];
					$template_id = "1007491885374897823";
					// EMAIL AND MESSAGE SEND UDING TEMPLETE
					sendSMS($phone,$messageP1,$template_id);
					sendEmail($email,$messageE1,$template_id);
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



		public function mailTesting (){
			$template_id = "1007261310462557602";
			// $template_id = "1007239655187710009";
			$messageP1='Dear Sir/Madam,';
			$messageP1.='Consent for the exam Name of UKPSC has been applied and submitted for your kind perusal.';
			$messageP1.='Regards';
			$messageP1.='Centre';
	
			$messageE1='Dear Sir/Madam,<br>';
			$messageE1.='Consent for the exam Name of UKPSC has been applied and submitted for your kind perusal.';
			$messageE1.='Regards <br>';
			$messageE1.='Centre';

			// $messageP1='Dear Sir/Madam ,';
			// $messageP1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.';
			// $messageP1.='Regards,';
			// $messageP1.='UKPSC, Haridwar';
			
			// $messageE1='Dear Sir/Madam ,<br>';
			// $messageE1.='Your primary registration is completed. Kindly complete your registration using your email id and password after clicking on password generation link on registered email id.<br>';
			// $messageE1.='Regards,<br>';
			// $messageE1.='UKPSC, Haridwar';

			// sendSMS(8700488718,$messageP1,$template_id);
			sendEmail('jugendra.singh@netprophetsglobal.com',$messageE1,$template_id);
		}


			}  // end class
