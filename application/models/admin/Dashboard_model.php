<?php



class Dashboard_model extends CI_Model {



    public function get_all_users() {

        return $this->db->count_all('ci_exam_registration');

    }



    public function get_active_users() {

        
		$admin_id = $this->session->userdata('admin_id');  
        $array = array('ci_subject.created_by' => $admin_id);
        $count = $this->db->select('*')
                               ->from('ci_subject')
                               ->join('ci_exam_master', 'ci_exam_master.id = ci_subject.exam_id')
                               ->where($array)
                               ->order_by("ci_subject.id", "desc")->get()->result_array();
                               return count($count);
        // print_r(count($count));  die();
        // $this->db->where('is_active', 1);

        // return $this->db->count_all_results('ci_users');

    }



    function get_all_concent_both($state_name, $city_name, $grade_name) {
        $this->db->from('ci_exam_registration');
        if ($city_name != '' && $state_name != '' ) {
            $this->db->where('ci_exam_registration.district', $state_name);
            $this->db->where('ci_exam_registration.city', $city_name);
        }

        if ($state_name != '' || $state_name = '') {
            
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        
        if ($grade_name != '') {
           
            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }

        $admin_role_id = $this->session->userdata('admin_role_id');
       
        if ($admin_role_id == 5) {
         
            $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
        }
        if ($admin_role_id == 6) {
       
            $this->db->where('ci_exam_registration.fileName6 is  NOT NULL');
            $this->db->where('ci_exam_registration.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');
        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        $module = array();
     
        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }
     
        return $query->num_rows();
    }


    public function get_deactive_users() {

        // $this->db->where('is_active', 0);

        // return $this->db->count_all_results('ci_users');
        $array = array('created_by' => $this->session->userdata('admin_id'));
        
        $count = $this->db
            ->select('*')
            ->from('ci_exam_master')
            ->where($array)
            ->order_by('id','desc')
            ->get()
            ->result_array();
            return count($count);

    }



    public function get_role_wise_users($role_id) {
        $query = $this->db->query("SELECT admin_role_id, count(admin_role_id) as count_Users FROM ci_admin where admin_role_id =$role_id and is_active= 1  group by admin_role_id;");

        $row = $query->row();
        if (isset($row)) {

            return $row;

        } else {

            return false;

        }

    }



    public function get_provisional_chart() {

        if ($_SESSION['admin_role_id'] == 6) {

            $str_where = " WHERE created_by = " . $_SESSION['admin_id'];

        } elseif ($_SESSION['admin_role_id'] == 5) {

            $str_where = " WHERE district = " . $_SESSION['district_id'];

        } elseif ($_SESSION['admin_role_id'] == 4 || $_SESSION['admin_role_id'] == 3) {

            $str_where = "  WHERE state = " . $_SESSION['state_id'];

        } else {

            $str_where = "";

        }

        $sql = "SELECT YEAR(`created_at`) AS year, concat('Q', QUARTER(`created_at`)) AS quarter, COUNT(id) AS records_count 

                       FROM ci_certificate_provisional $str_where

                       GROUP BY YEAR(`created_at`), QUARTER(`created_at`) 

                       ORDER BY YEAR(`created_at`), QUARTER(`created_at`)";

        $query = $this->db->query($sql);

        $row = $query->row();

        $arr = array();

        foreach ($query->result() as $user) {

            $arr[] = array('y' => $user->year . " " . $user->quarter, 'item1' => $user->records_count);

        }



        return json_encode($arr);

    }



    public function get_permanent_chart() {

        if ($_SESSION['admin_role_id'] == 6) {

            $str_where = " WHERE created_by = " . $_SESSION['admin_id'];

        } elseif ($_SESSION['admin_role_id'] == 5) {

            $str_where = " WHERE district = " . $_SESSION['district_id'];

        } elseif ($_SESSION['admin_role_id'] == 4 || $_SESSION['admin_role_id'] == 3) {

            $str_where = " WHERE state = " . $_SESSION['state_id'];

        } else {

            $str_where = "";

        }

        $sql = "SELECT YEAR(`created_at`) AS year, concat('Q', QUARTER(`created_at`)) AS quarter, COUNT(id) AS records_count 

                       FROM ci_certificate_permanent $str_where

                       GROUP BY YEAR(`created_at`), QUARTER(`created_at`) 

                       ORDER BY YEAR(`created_at`), QUARTER(`created_at`)";

        $query = $this->db->query($sql);

        $row = $query->row();



        $arr = array();

        foreach ($query->result() as $user) {

            $arr[] = array('y' => $user->year . " " . $user->quarter, 'item1' => $user->records_count);

        }

        return json_encode($arr);

    }



    public function get_permanent_status() {

        $str_where = " Where file_movement!=1 ";

        if ($_SESSION['admin_role_id'] == 6) {

            $str_where .= " and created_by = " . $_SESSION['admin_id'];

        } elseif ($_SESSION['admin_role_id'] == 5) {

            $str_where .= " and district = " . $_SESSION['district_id'];

        } elseif ($_SESSION['admin_role_id'] == 4 || $_SESSION['admin_role_id'] == 3) {

            $str_where .= " and state = " . $_SESSION['state_id'];

        }



        $sql = "SELECT 

                            case 

                            when file_movement=2 then 'Applied'

                            when file_movement=3 then 'Reject'

                            when file_movement=4 then 'Hold'

                            when file_movement=5 then 'Approved'

                            end as Status,

                            count(id) tot_count 

                        FROM `ci_certificate_permanent` 

                        $str_where  group by `file_movement`";

        $query = $this->db->query($sql);

        $tot = 0;

        foreach ($query->result() as $user) {

            $tot += $user->tot_count;

            $arr[$user->Status] = $user->tot_count;

        }

        $arr = array();

        foreach ($query->result() as $user) {

            $arr[$user->Status] = round(($user->tot_count * 100) / $tot);

        }

        return $arr;

    }



    public function get_provisional_status() {

        $str_where = " Where file_movement!=1 ";

        if ($_SESSION['admin_role_id'] == 6) {

            $str_where .= " and created_by = " . $_SESSION['admin_id'];

        } elseif ($_SESSION['admin_role_id'] == 5) {

            $str_where .= " and district = " . $_SESSION['district_id'];

        } elseif ($_SESSION['admin_role_id'] == 4 || $_SESSION['admin_role_id'] == 3) {

            $str_where .= " and state = " . $_SESSION['state_id'];

        }

        $sql = "SELECT 

                            case 

                            when file_movement=2 then 'Applied'

                            when file_movement=3 then 'Reject'

                            when file_movement=4 then 'Hold'

                            when file_movement=5 then 'Approved'

                            end as Status,

                            count(id) tot_count 

                        FROM `ci_certificate_provisional` 

                        $str_where group by `file_movement`";

        $query = $this->db->query($sql);

        $tot = 0;

        foreach ($query->result() as $user) {

            $tot += $user->tot_count;

            $arr[$user->Status] = $user->tot_count;

        }

        $arr = array();

        foreach ($query->result() as $user) {

            $arr[$user->Status] = round(($user->tot_count * 100) / $tot);

        }

        return $arr;

    }

    public function get_register_school(){
          // echo $state_name;
          $this->db->from('ci_exam_registration');
          $this->db->order_by('ci_exam_registration.id', 'desc');
  
          $query = $this->db->get();
          $module = array();
       
          if ($query->num_rows() > 0) {
              $module = $query->result_array();   
          }
       
          return count($module);
    }
    public function get_total_sections(){
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
                if($admin_role_id == 3 || $admin_role_id == 4){
			$this->db->where('ci_admin.state_id',$this->session->userdata('state_id'));
                }
                if($admin_role_id == 5 )
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
                // $this->db->where('ci_admin.admin_role_id !=', 6);
                // $this->db->where('ci_admin.admin_role_id !=', 7);
		$this->db->order_by('ci_admin.admin_role_id','desc');



		$query = $this->db->get();
                //echo $this->db->last_query();
		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		return count($module);
    }



}



?>

