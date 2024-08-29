<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Admin_model extends CI_Model{



	public function get_user_detail(){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));

		return $result = $query->row_array();

	}

	public function get_user_detail_reg(){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_exam_registration', array('admin_id' => $id));

		return $result = $query->row_array();

	}



	public function get_user_detail_form($admin_id){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));

		return $result = $query->row_array();

	}



	public function get_old_data(){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_exam_registration', array('admin_id' => $id));

		return $result = $query->row_array();

	}

	public function get_center_data($admin_id,$ref_id){

		$id = $this->session->userdata('admin_id');

		// echo $ref_id;exit;

		$query = $this->db->get_where('ci_exam_registration', array('admin_id' => $id, 'ref_id'=>$ref_id));

		// echo $this->db->last_query();

		return $result = $query->row_array();

	}
	public function get_center_data_update($schol_id){

		$id = $this->session->userdata('admin_id');

		// echo $ref_id;exit;

		$query = $this->db->get_where('ci_exam_registration', array('id' => $schol_id));

		// echo $this->db->last_query();

		return $result = $query->row_array();

	}
	public function get_center_data_updatenew($exam_id,$schol_id){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_exam_according_to_school', array('ref_id'=>$exam_id,'school_id' => $schol_id));

		// echo $this->db->last_query();

		return $result = $query->row_array();

	}

	//--------------------------------------------------------------------

	public function update_user($data){

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

	//-----------------------------------------------------

	function get_admin_roles()

	{

           $admin_role_id = $this->session->userdata['admin_role_id']; 

            $allowed_role_id = ALLOWED_ROLE_ID ;
        

//            print_r( $allowed_role_id);

//            array(

//                1=>array(2,3,4,5),

//                2=>array(3,4,5),

//                3=>array(4,5),

//                4=>array(5),

//                5=>array()

//                );

         ($allowed_role_id[$admin_role_id]);

		$this->db->from('ci_admin_roles');

		$this->db->where('admin_role_status',1);

                $this->db->where_in('admin_role_id',$allowed_role_id[$admin_role_id]);

		$query=$this->db->get();

		return $query->result_array();

	}

        

        function get_admin_roles_by_id($role_id)

	{

            $admin_role_id = $this->session->userdata['admin_role_id'];

            $allowed_role_id = ALLOWED_ROLE_ID ;



		$this->db->from('ci_admin_roles');

		$this->db->where('admin_role_status',1);

                $this->db->where_in('admin_role_id',$role_id);

		$query=$this->db->get();

		return $query->result_array();

	}



	//-----------------------------------------------------

	function get_admin_by_id($id)

	{

		$this->db->from('ci_admin');

		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');

		$this->db->where('admin_id',$id);

		$query=$this->db->get();

		return $query->row_array();

	}



	public function get_sub_name($sub_name) {



        $admin_id = $this->session->userdata('admin_id');

        $this->db->where('id',$sub_name);

        $this->db->from('ci_subject');

        $this->db->order_by('ci_subject.id', 'desc');

        $query = $this->db->get();

		// echo '<pre>';print_r($query->result_array());die;

        return $query->result_array();        

    }



	//-----------------------------------------------------

	function get_all()

	{

        $this->db->select('ci_admin.*, ci_admin_roles.*, ci_cities.name as city_name, ci_states.name as state_name ');

		$this->db->from('ci_admin');

		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');

        $this->db->join('ci_cities','ci_cities.id=ci_admin.district_id', 'left');

        $this->db->join('ci_states','ci_states.id=ci_admin.state_id', 'left');
   
		

		if($this->session->userdata('filter_type')!='')
            
			$this->db->where('ci_admin.admin_role_id',$this->session->userdata('filter_type'));

		if($this->session->userdata('filter_status')!='')

			$this->db->where('ci_admin.is_active',$this->session->userdata('filter_status'));

                //-----------------------------------------------------------------------

                // Filter data as per user role

                $admin_role_id = $this->session->userdata('admin_role_id');
				// echo $admin_role_id;

                if($admin_role_id == 5|| $admin_role_id == 3 || $admin_role_id == 4 || $admin_role_id == 6){

			$this->db->where('ci_admin.state_id',$this->session->userdata('state_id'));

                }

                if($admin_role_id == 5|| $admin_role_id == 3 || $admin_role_id == 4 || $admin_role_id == 6 )

			$this->db->where('ci_admin.district_id',$this->session->userdata('district_id'));

                if($admin_role_id == 6 )

			$this->db->where('ci_admin.admin_id',$this->session->userdata('admin_id'));

                // End Filter data as per user role   

		$filterData = $this->session->userdata('filter_keyword');
	

                if($filterData!=''){

                $this->db->group_start();

		$this->db->like('ci_admin_roles.admin_role_title',$filterData);

		$this->db->or_like('ci_admin.firstname',$filterData);

		$this->db->or_like('ci_admin.lastname',$filterData);

		$this->db->or_like('ci_admin.email',$filterData);

		$this->db->or_like('ci_admin.mobile_no',$filterData);

		$this->db->or_like('ci_admin.username',$filterData);

                $this->db->group_end();

                }

		
		$this->db->where('ci_admin.is_supper !=', 1);
		$this->db->order_by('ci_admin.admin_id','desc');
		$query = $this->db->get();
		$module = array();

		// print_r($this->db->last_query()); 

		if ($query->num_rows() > 0) 

		{

			$module = $query->result_array();

		}



		return $module;

	}



	//-----------------------------------------------------

public function add_admin($data){

	$this->db->insert('ci_admin', $data);

        echo $this->db->last_query();

	return true;

}



	//---------------------------------------------------

	// Edit Admin Record

public function edit_admin($data, $id){



	$this->db->where('admin_id', $id);

	$this->db->update('ci_admin', $data);

	return true;

}



	//-----------------------------------------------------

function change_status()

{		

	$this->db->set('is_active',$this->input->post('status'));

	$this->db->where('admin_id',$this->input->post('id'));

	$this->db->update('ci_admin');

} 



	//-----------------------------------------------------

function delete($id)

{		

   

	$this->db->where('admin_id',$id);

	$this->db->delete('ci_admin');

} 



}



?>