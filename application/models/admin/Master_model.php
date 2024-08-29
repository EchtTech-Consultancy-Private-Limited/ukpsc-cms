<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Master_model extends CI_Model {



    public function get_establishment_type() {

        

        $sql = "SELECT c1.id as 'parent_id', c1.bedapplicable, c1.name as parent_name, c2.name , c2.id , "

                . "if(c2.status=1,'Active','In-Active') as 'status' FROM ci_establishment_type c1 "

                . "Right JOIN ci_establishment_type c2 ON c1.id = c2.parent_id order by c2.id";



        return $query = $this->db->query($sql)->result_array();



        $this->db->select('*');

        $this->db->order_by('id', 'desc');

        return $this->db->get('ci_establishment_type')->result_array();

    }



   public function get_subject_by_id($id) {

        $query = $this->db->get_where('ci_subject', array('id' => $id));

        return $result = $query->row_array();

    }

   public function get_exam_by_id($id) {

        $admin_id = $this->session->userdata('admin_id'); 

        $query = $this->db->get_where('ci_exam_master', array('id' => $id, 'created_by' => $admin_id));

        return $result = $query->row_array();

    }



    public function get_subject()

    {

        $admin_id = $this->session->userdata('admin_id');   

        // echo $admin_id;exit;

        $query = $this->db->query("SELECT * from ci_subject where created_by = $admin_id");

        return $query->result();

    }



    public function get_exam(){

    

        $admin_id = $this->session->userdata('admin_id');

        $query = $this->db->query("SELECT * from ci_exam_master where created_by = $admin_id and status = 1 ORDER BY `ci_exam_master`.`id` DESC");

        return $query->result();



    }

    

    public function edit_exam($data, $id) {
        $ciInvitaionData = [
            'startdate'=>$data['start_date_exam'],
            'enddate'=>$data['end_date_exam']
        ];
    
        $this->db->where('id', $id);

        $this->db->update('ci_exam_master', $data);

        $this->db->where('exam_name', $id);

        $this->db->update('ci_exam_invitation', $ciInvitaionData);

        return true;

    }

        

    //--------------------------------------------------------------------

    public function add_establishment_type($data) {



        $this->db->insert('ci_establishment_type', $data);

//        echo $this->db->last_query();

        return true;

    }



   public function add_subject($data) {



        $this->db->insert('ci_subject', $data);

//        echo $this->db->last_query();

        return true;

    }





    public function add_exam($data) {



        $this->db->insert('ci_exam_master', $data);

//        echo $this->db->last_query();

        return true;

    }



    //-----------------------------------------------------

    public function edit_establishment_type($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_establishment_type', $data);

        return true;

    }



    public function get_establishment_by_id($id) {

        $query = $this->db->get_where('ci_establishment_type', array('id' => $id));

        return $result = $query->row_array();

    }



    //---------------------------------------------------------------

    public function get_service_type() {

//        $sql = "SELECT c1.id as 'parent_id', c1.name, c2.id, c2.name as 'parent_name' , c1.created_at, if(c1.status=1,'Active','In-Active') as 'status'  FROM ci_service_type c1

//                LEFT JOIN ci_service_type c2 ON c2.parent_id = c1.id or c2.parent_id = 0

//                WHERE c1.parent_id = 0 order by id asc";



        $sql = "SELECT c1.id as 'parent_id', c1.name as parent_name, c2.name , c2.id , "

                . "if(c2.status=1,'Active','In-Active') as 'status' FROM ci_service_type c1 "

                . "Right JOIN ci_service_type c2 ON c1.id = c2.parent_id order by c2.id";



        return $query = $this->db->query($sql)->result_array();



        $this->db->select('*');

        $this->db->order_by('id', 'desc');

        return $this->db->get('ci_service_type')->result_array();

    }



    //--------------------------------------------------------------------

    public function add_service_type($data) {



        $this->db->insert('ci_service_type', $data);

        //echo $this->db->last_query(); die;  

        return true;

    }



    //-----------------------------------------------------

    public function edit_service_type($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_service_type', $data);

        return true;

    }



    public function get_service_by_id($id) {

        $query = $this->db->get_where('ci_service_type', array('id' => $id));

        return $result = $query->row_array();

    }



    //----------------------------------------------

    public function get_all_staff_category() {



        $wh = array();



        $query = $this->db->get('ci_staff_category');

        $SQL = $this->db->last_query();



        if (count($wh) > 0) {

            $WHERE = implode(' and ', $wh);

            return $this->datatable->LoadJson($SQL, $WHERE);

        } else {

            return $this->datatable->LoadJson($SQL);

        }

    }



    //-----------------------------------------------------

    public function add_staff_category($data) {



        $result = $this->db->insert('ci_staff_category', $data);

        return $this->db->insert_id();

    }



    //-----------------------------------------------------

    public function edit_staff_category($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_staff_category', $data);

        return true;

    }



    //-----------------------------------------------------

    public function get_staff_category_by_id($id) {



        $query = $this->db->get_where('ci_staff_category', array('id' => $id));

        return $result = $query->row_array();

    }



    //----------------------------------------------

    public function get_all_bank() {



        $wh = array();



        $query = $this->db->get('ci_bank');

        $SQL = $this->db->last_query();



        if (count($wh) > 0) {

            $WHERE = implode(' and ', $wh);

            return $this->datatable->LoadJson($SQL, $WHERE);

        } else {

            return $this->datatable->LoadJson($SQL);

        }

    }



    //-----------------------------------------------------

    public function add_bank($data) {



        $result = $this->db->insert('ci_bank', $data);

        return $this->db->insert_id();

    }



    //-----------------------------------------------------

    public function get_bank_by_id($id) {



        $query = $this->db->get_where('ci_bank', array('id' => $id));

        return $result = $query->row_array();

    }



    public function edit_bank($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_bank', $data);

        return true;

    }



    public function add_fee_master($data) {



        $result = $this->db->insert('ci_fee_master', $data);

        return $this->db->insert_id();

    }



    //----------------------------------------------

    public function get_single($table, $field, $id, $idvalue, $extratext = '') {

        $text = "select $field from $table where $id='$idvalue' $extratext";

        $query = $this

                ->db

                ->query($text);

        if ($query->row()) {

            return $query->row()->$field;

        } else

            return '';

    }



    public function get_all_fee() {

        $state_id = $_SESSION['state_id'];

        if (!empty($state_id)) {

            $wh = array('state_id' => $state_id);

        } else {

            $wh = array();

        }





        $query = $this->db->get('ci_fee_master');



        $SQL = $this->db->last_query();



        if (count($wh) > 0) {



            return $this->datatable->LoadJson($SQL, 'state_id=' . $state_id);

        } else {

            return $this->datatable->LoadJson($SQL);

        }

    }



    //-----------------------------------------------------

    public function get_fee_by_id($id) {



        $query = $this->db->get_where('ci_fee_master', array('id' => $id));

        return $result = $query->row_array();

    }



    public function edit_fee($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_fee_master', $data);

        return true;

    }



    public function get_establishment_type_fee() {

//        $sql = "SELECT c1.id as 'parent_id', c1.name, c2.id, c2.name as 'parent_name' , c1.created_at, if(c1.status=1,'Active','In-Active') as 'status'  FROM ci_establishment_type c1

//                LEFT JOIN ci_establishment_type c2 ON c2.parent_id = c1.id or c2.parent_id = 0

//                WHERE c1.parent_id = 0 order by id asc";



        $sql = "SELECT c1.id as 'establishment_id', c1.name as establishment_fee_name,"

                . " FROM ci_establishment_type c1 "

                . "Right JOIN ci_establishment_type c1 ON c1.id = c1 establishment_id order by c1.id";



        return $query = $this->db->query($sql)->result_array();



        $this->db->select('*');

        $this->db->order_by('id', 'desc');

        return $this->db->get('ci_establishment_type')->result_array();

    }









 public function get_diseases($getId = false) {

        $state_id = $getId;

        if (!empty($state_id)) {

            $wh = array('diseases_type' => $state_id);

        } else {

            $wh = array();

        }





        $query = $this->db->get('ci_diseases');



        

        $SQL = $this->db->last_query();

       

        if (count($wh) > 0) {



            $data = $this->datatable->LoadJson($SQL, 'diseases_type=' . $state_id);

            return $data;

        } else {

            return $this->datatable->LoadJson($SQL);

        }

    }





   public function add_diseases($data) {



        $result = $this->db->insert('ci_diseases', $data);

        return $this->db->insert_id();

    }





public function get_diseases_by_id($id) {



        $query = $this->db->get_where('ci_diseases', array('id' => $id));

        return $result = $query->row_array();

    }



      public function diseases_edit($data, $id) {



        $this->db->where('id', $id);

        $this->db->update('ci_diseases', $data);

        return true;

    }





// New Code 22-09-2022 ----JOgi

    public function get_subject_new_by_id($id) {

        $query = $this->db->get_where('ci_subject', array('exam_id' => $id));

        // $this->db->get('ci_establishment_type')

        return $result = $query->result_array();

    }

    public function edit_subject_new_by_id($id) {

        $query = $this->db->get_where('ci_subject', array('id' => $id));

        // $this->db->get('ci_establishment_type')

        return $result = $query->row_array();

    }



    // New Code 22-09-2022

   public function edit_subjectNew($data,$id) {



        $this->db->where('id', $id);

        $this->db->update('ci_subject', $data);

        return true;

    }

    // New Code 22-09-2022

   public function add_subjectNew($data) {



        $this->db->insert('ci_subject', $data);

        return true;

    }

}



?>

