<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	// public function login($data){

	// 	$this->db->from('ci_admin');
	// 	$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id = ci_admin.admin_role_id');
	// 	$this->db->where('ci_admin.username', $data['username']);
	// 	$this->db->where('ci_admin.school_registration_number', $data['school_registration_number']);

	// 	$query = $this->db->get();
	// 	if ($query->num_rows() == 0){
	// 		return false;
	// 	}
	// 	else{
	// 		//Compare the password attempt with the password we have stored.
	// 		$result = $query->row_array();
	// 	    $validPassword = password_verify($data['password'], $result['password']);
	// 	    if($validPassword){
 //                        $loginData = array('last_ip' => $this->input->ip_address(),'last_login'=>date('Y-m-d h:m:s'));
 //                        //print_r($loginData); die;
 //                        update_last_login($loginData, $data['username']);
	// 	        return $result = $query->row_array();
	// 	    }
	// 	}
	// }

	// public function login($data){
		// $type = '';
		// $this->db->from('ci_admin');
		// $this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id = ci_admin.admin_role_id');

		// if($type == 'username'){
		// $this->db->where('ci_admin.username', $data['username']);
		// }else{
			// $this->db->where('ci_admin.school_registration_number', $data['username']);
		// }
		// $query = $this->db->get();
		// if ($query->num_rows() == 0){
			// return false;
		// }
		// else{
			//Compare the password attempt with the password we have stored.
			// $result = $query->row_array();
		    // $validPassword = password_verify($data['password'], $result['password']);
		    // if($validPassword){
                        // $loginData = array('last_ip' => $this->input->ip_address(),'last_login'=>date('Y-m-d h:m:s'));
                        // print_r($loginData); die;
                        // update_last_login($loginData, $data['username']);
		        // return $result = $query->row_array();
		    // }
		// }
	// }
	
		public function login($data, $type){

		// print_r($type); die();

		$this->db->from('ci_admin');
		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id = ci_admin.admin_role_id');
		if($type == 'username'){
		$this->db->where('ci_admin.username', $data['username']);
		}else{
			$this->db->where('ci_admin.school_registration_number', $data['username']);
		}
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
                        $loginData = array('last_ip' => $this->input->ip_address(),'last_login'=>date('Y-m-d h:m:s'));
                        //print_r($loginData); die;
                        update_last_login($loginData, $data['username']);
		        return $result = $query->row_array();
		    }
		}
	}


	//--------------------------------------------------------------------
	public function register($data){
		$this->db->insert('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function generateukpscid($city_id){
		// echo $city_id;exit;
		if($city_id!='')
			$query = $this->db->query("SELECT subcityname from ci_sub_cities where id = $city_id");
		else
			$query = $this->db->query("SELECT subcityname from ci_sub_cities where id = 1");
		
		return $query->result();
	}
	
	public function lastincrementid(){
		// echo $city_id;exit;
		$query = $this->db->query("SELECT max(admin_id) as adminid FROM ci_admin");
		return $query->result();
	}

	//--------------------------------------------------------------------
	public function email_verification($code){

		$this->db->select('admin_id','email, token, is_active');
		$this->db->from('ci_admin');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$row=$query->row('admin_id');
		//echo $this->db->last_query();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('ci_admin', array('is_verify' => 1, 'token'=> ''));
			return $row;
		}
		else{
			return false;
			}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('ci_admin', array('email' => $email));
    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
		
    		return false;
    	}
    }

    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('admin_id', $user_id);
    	$this->db->update('ci_admin', $data);
    }
    public function insert_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('admin_id', $user_id);
    	$this->db->insert('ci_admin', $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){

    	$result = $this->db->get_where('ci_admin',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }

      public function check_password_e($code){

    	$result = $this->db->get_where('ci_admin',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('ci_admin', $data);
		return true;
    }

      public function reset_password1($id, $new_password,$new_password1){
	    $data = array(
			'password_reset_code' => '',
			'token' => '',
			'password_show' =>$new_password1,
			'password' => $new_password
	    );
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
    }
	public function otpUpdate($val, $otptype, $otp_no){
		//$adminId = $this->session->userdata('admin_id');
		$result = $this->db->get_where('ci_otp',  array('user_id' => $this->session->userdata('admin_id'),'otp_type'=>$otptype));
    	
		if($result->num_rows() > 0){
			$data = array(
				'send_to' => $val,
				'otp_type' => $otptype,
				'otp_no' => $otp_no,
			);
			$this->db->where(array('user_id' => $this->session->userdata('admin_id'),'otp_type'=>$otptype));
			$results =$this->db->update('ci_otp', $data);
    	}
    	else{ 
			$data = array(
				'user_id' =>$this->session->userdata('admin_id'),
				'send_to' => $val,
				'otp_type' => $otptype,
				'otp_no' => $otp_no,
			);
			$results =$this->db->insert('ci_otp', $data);
    	}
		return true;
		
	
   }
   public function otp_delete_row($id){
		$this->db->where('user_id', $id);
		$this->db->delete('ci_otp');
   }
     public function reset_ci_admin($email,$mobile_no, $new_password){
     	$adminId = $this->session->userdata('admin_id');
	    $data = array(
	    	'username ' =>$email,
	    	'email' => $email,
			'pri_mobile' => $mobile_no,
			'password' => $new_password
	    );
		// $this->db->where('admin_id', $adminId);
		
		$this->db->where('admin_id', $adminId);
		// $this->db->update('ci_exam_according_to_school', $data_examSchoolTable);
		$this->db->update('ci_admin', $data);
		// $this->db->update('ci_exam_registration', $data_examSchoolTable);

		return true;
    }
    
     public function reset_ci_exam_according_to_school($email,$mobile_no, $new_password){
     	$adminId = $this->session->userdata('admin_id');

		$data = array(
	    	'email' => $email,
			'pri_mobile' => $mobile_no,
	    );
		$this->db->where('admin_id', $adminId);
		$this->db->update('ci_exam_according_to_school', $data);
		return true;
    }
      public function reset_ci_exam_registration($email,$mobile_no, $new_password){
     	$adminId = $this->session->userdata('admin_id');
		$data_examSchoolTable = array(
	    	'email' => $email,
			'pri_mobile' => $mobile_no,
	    );
		$this->db->where('admin_id', $adminId);
		$this->db->update('ci_exam_registration', $data_examSchoolTable);

		return true;
    }


    public function super_user_change_password($new_password){
     	$adminId = $this->session->userdata('admin_id');
		$data = array(
	    	'password' => $new_password,
	    );
		$this->db->where('admin_id', $adminId);
		$this->db->update('ci_admin', $data);

		return true;
    }

    //--------------------------------------------------------------------
	public function get_admin_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function get_admin_detail_by_token($code){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('token' => $code));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_admin($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	public function get_auth_dd(){

		return $this->db->select('*')->from('ci_admin_roles')->where('admin_role_id',6)->or_where('admin_role_id',7)->get()->result_array();
	}


	public function emailcheck($email){

		$this->db->where('email', $email);

    	$query = $this->db->get('ci_admin');

    	$count_row = $query->num_rows();

		if ($count_row > 0) {
		//if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
				return true; // here I change TRUE to false.
			} else {
				// doesn't return any row means database doesn't have this email
				return false; // And here false to TRUE
			}
	}
	public function mobileCheck($email){

		$this->db->where('pri_mobile', $email);
    	$query = $this->db->get('ci_admin');
    	$count_row = $query->row()->school_name;
		//print_r($count_row);die;
		if (!empty($count_row)) {
		//if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
				return $count_row; // here I change TRUE to false.
			} else {
				// doesn't return any row means database doesn't have this email
				return false; // And here false to TRUE
			}
	}
	public function schoolregistrationcheck($school_registration_no){

		$this->db->where('school_registration_number', $school_registration_no);

    	$query = $this->db->get('ci_admin');

    	$count_row = $query->num_rows();

		if ($count_row > 0) {
		//if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
				return true; // here I change TRUE to false.
			} else {
				// doesn't return any row means database doesn't have this email
				return false; // And here false to TRUE
			}
	}

	// new check token 

	public function checkTokenexpire($code){

		$this->db->select('admin_id','email, token, is_active');
		$this->db->from('ci_admin');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$row=$query->row('admin_id');
		$match = count($result);

		if($match > 0){
			return true;
		}
		else{
			return false;
			}
	}

}

?>