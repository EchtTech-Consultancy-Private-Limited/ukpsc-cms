<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        auth_check(); // check login auth

        $this->rbac->check_module_access();

        $this->load->model('admin/Master_model', 'Master_model');
        $this->load->model('admin/Master_model', 'master_model');

        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Exam_model', 'Exam_model');
        $this->load->model('admin/auth_model', 'auth_model');
    }
    public function quetion_paper_add()
    {
    
        $this->rbac->check_operation_access();

        if ($this->input->post()) {
            $data = [
                'sub_name' => ucfirst($this->input->post('sub_name')),

                'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),

                'sub_code' => ucfirst($this->input->post('sub_code')),

                'created_at' => date('Y-m-d h:m:s'),

                'status' => 1,

                'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->master_model->add_subject($data);

            $this->session->set_flashdata('success', 'Subject has been updated successfully<br/विषय को सफलतापूर्वक अपडेट कर दिया गया है>');

            redirect(base_url('admin/master/que_list'));
        } else {

            $data['title'] = 'Add Subject';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/master/quetion_paper_add', $data);
            $this->load->view('admin/includes/_footer', $data);
        }
    }


    public function exam_add()
    {
        // $this->rbac->check_operation_access();
        if ($this->input->post()) {

            $data = [
                'exam_name' => ucfirst($this->input->post('exam_name')),
                'exam_hindi_name' => ucfirst($this->input->post('exam_hindi_name')),
                'advertise_name' => ucfirst($this->input->post('advertise_name')),
                'no_of_cand' => ucfirst($this->input->post('no_of_cand')),
                'start_date_exam' => ucfirst($this->input->post('start_date_exam')),
                'end_date_exam' => ucfirst($this->input->post('end_date_exam')),
                'created_at' => date('d-m-Y '),
                'status' => 1,
                'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);
            // echo '<pre>'; print_r($data); die();
            $result = $this->master_model->add_exam($data);
            $this->session->set_flashdata('success', 'Exam has been added successfully<br/>(परीक्षा सफलतापूर्वक जोड़ दी गई है)');
            redirect(base_url('admin/master/exam_list'));
        } else {
            $data['title'] = 'Add Exam';

            $this->load->view('admin/includes/_header', $data);

            $this->load->view('admin/master/exam_add', $data);

            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function datatable_json()
    {

        $admin_id = $this->session->userdata('admin_id');
        $array = array('ci_subject.created_by' => $admin_id);
        // $records['data'] = $this->db->select('*')
        //                        ->from('ci_subject')
        //                        ->join('ci_exam_master', 'ci_exam_master.id = ci_subject.exam_id')
        //                        ->where($array)
        //                        ->order_by("ci_subject.id", "desc")->get()->result_array();
        $records['data'] = $this->db->select('*')
            ->from('ci_exam_master')
            ->join('ci_subject', 'ci_subject.exam_id = ci_exam_master.id')
            ->where($array)
            ->order_by("ci_subject.id", "desc")->get()->result_array();


        $data = [];
        $i = 0;

        foreach ($records['data'] as $row) {
            $data[] = [
                ++$i,

                $row['exam_name'] ? $row['exam_name'] : '',

                $row['sub_name'] ? $row['sub_name'] : '',

                $row['sub_name_hindi'] ? $row['sub_name_hindi'] : '',

                $row['sub_code'] ? $row['sub_code'] : '',
                '<a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                    base_url('admin/master/quetion_paper_del/' . urlencrypt($row['id'])) .
                    '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records['data'] = $data;
        echo json_encode($records);
    }

    public function datatable_json_exam()
    {

        $array = array('created_by' => $this->session->userdata('admin_id'));

        $records['data'] = $this->db
            ->select('*')
            ->from('ci_exam_master')
            ->where($array)
            ->order_by('id', 'desc')
            ->get()
            ->result_array();
        $data = [];

        $i = 0;

        foreach ($records['data'] as $row) {
            $data[] = [
                ++$i,

                $row['exam_name'] ? $row['exam_name'] : '',
                $row['exam_hindi_name'] ? $row['exam_hindi_name'] : '',
                $row['advertise_name'] ? $row['advertise_name'] : '',
                $row['no_of_cand'] ? $row['no_of_cand'] : '',
                $row['start_date_exam'] ? date("d-m-Y", strtotime($row['start_date_exam'])) : '',
                $row['end_date_exam'] ?   date("d-m-Y", strtotime($row['end_date_exam'])) : '',
                '<a title="Add"  class="update btn btn-sm btn-success" href="' . base_url('admin/master/addSubjectNew/' . urlencrypt($row['id'])) . '"> <i class="fa fa-plus"></i></a>
                <a title="View"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/view_all_subjectNew/' . urlencrypt($row['id'])) . '"> <i class="fa fa-eye"></i></a>',
                '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
                <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                    base_url('admin/master/exam_del/' . urlencrypt($row['id'])) .
                    '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',

            ];
        }

        $records['data'] = $data;

        echo json_encode($records);
    }



    public function que_list()
    {

        $this->rbac->check_operation_access();
        $data['title'] = '';
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/master/quetion_paper_list', $data);
        $this->load->view('admin/includes/_footer');
    }
    public function exam_list()
    {

        $data['title'] = 'User Activity Log';
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/master/exam_list', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function quetion_paper_edit($id)
    {
        $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $data = [
                'sub_name' => ucfirst($this->input->post('sub_name')),

                'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),

                'sub_code' => ucfirst($this->input->post('sub_code')),

                'created_at' => date('Y-m-d h:m:s'),

                'status' => 1,

                'updated_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);
            $result = $this->db->update('ci_subject', $data)->where('id', $id);
            $this->session->set_flashdata('success', 'Subject has been updated successfully<br/विषय को सफलतापूर्वक अपडेट कर दिया गया है>');

            redirect(base_url('admin/master/quetion_paper_list'));
        } else {
            $data['subject'] = $this->master_model->get_subject_by_id(urldecrypt($id));

            $data['title'] = 'Edit Subject';

            $this->load->view('admin/includes/_header', $data);

            $this->load->view('admin/master/quetion_paper_edit', $data);

            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function exam_edit($id)
    {
        // $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $data = [
                'exam_name' => ucfirst($this->input->post('exam_name')),
                'exam_hindi_name' => ucfirst($this->input->post('exam_hindi_name')),
                'advertise_name' => ucfirst($this->input->post('advertise_name')),
                'no_of_cand' => ucfirst($this->input->post('no_of_cand')),
                'start_date_exam' => ucfirst($this->input->post('start_date_exam')),
                'end_date_exam' => ucfirst($this->input->post('end_date_exam')),
                'updated_at' => date('d-m-Y'),
                'status' => 1,
                'updated_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->master_model->edit_exam($data, urldecrypt($id));

            $this->session->set_flashdata('success', 'Exam has been added successfully<br/>परीक्षा सफलतापूर्वक जोड़ दी गई है');

            redirect(base_url('admin/master/exam_list'));
        } else {

            $data['admin'] = $this->master_model->get_exam_by_id(urldecrypt($id));
            $data['title'] = 'Edit Exam';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/master/exam_edit', $data);
            $this->load->view('admin/includes/_footer', $data);
        }
    }
    public function quetion_paper_del($id)
    {
        
        $id =  urldecrypt($id);

        // $examId = getExamIdFromSubjectList($id); 
        // echo $examId; 
        // die();
        // ci_subject
        // ci_exam_invitation
        // ci_candidate_app

        $this->rbac->check_operation_access();

        $this->db->delete('ci_subject', ['id' => $id]);

        // $this->db->delete('ci_exam_invitation', ['id' => $id]);
        // $this->db->delete('ci_candidate_app', ['id' => $id]);

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/>सफलतापूर्वक हटा दिया गया!');

        redirect(base_url('admin/master/que_list'));
    }

    public function exam_del($id)
    {
     
        $id =  urldecrypt($id);
        $ref_id = get_exam_namewithStatusOne($id);
        $this->db->delete('ci_exam_master', ['id' => $id]);
        $this->db->delete('ci_exam_invitation', ['exam_name' => $id]);
        $this->db->delete('ci_subject', ['exam_id' => $id]);
        $this->db->delete('ci_candidate_app', ['exam_name' => $id]);

        $this->db->delete('ci_registration_invitation', ['ref_id' => $ref_id]);
        $this->db->delete('examshiftchoice', ['examId' => $ref_id]);
        $this->db->delete('ci_exam_according_to_school', ['ref_id' => $ref_id]);
        $this->db->delete('ci_allocation_table', ['exam_id' => $ref_id]);
        $this->db->delete('ci_mark_attendance_allocation', ['exam_id' => $ref_id]);
       
        $this->session->set_flashdata('success', 'Deleted Successfully!<br/>सफलतापूर्वक हटा दिया गया!');
        redirect(base_url('admin/master/exam_list'));
    }


 
    public function app_of_candidate()
    {
        // $this->rbac->check_operation_access();

        $data['title'] = 'Applications of Candidate';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/candidate_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function candidate_list_data()
    {

        $query = $this->db->query('SELECT sum(number_of_can) FROM (ci_candidate_app )');
        $data['total'] = ($query->result_array());
        $a = ($data['total'][0]);
        $data['total'] = ($a['sum(number_of_can)']);

        $data['info'] = $this->Exam_model->get_all_candidate_data();
    //print_r($data);die; 
        $this->load->view('admin/exam/candidate_app_list', $data);
    }

    public function candidate_add()
    {

      //  print_r('H');die;
        if ($this->input->post()) {

            $state = $this->input->post('state');
            $state_array = implode(",", $state);

            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",", $district_code);

            $city = $this->input->post('city');
            $city_array = implode(",", $city);

            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",", $city_code);

            $sub_name = $this->input->post('sub_name');
            $sub_name_array = implode(",", $sub_name);

            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",", $number_of_can);

            $editData = $this->Exam_model->getCadidateDataUsingExamId($this->input->post('exam_name'));
            if(isset($editData)){
                $data = array(
                    'exam_name' => $this->input->post('exam_name'),
                    'state' => $state_array.','.$editData['state'],
                    'city' => $city_array.','.$editData['city'],
                    'district_code' => $district_code_array.','.$editData['district_code'],
                    'city_code' => $city_code_array.','.$editData['city_code'],
                    'sub_name' => $sub_name_array.','.$editData['sub_name'],
                    'number_of_can' => $number_of_can_array.','.$editData['number_of_can'],
                    'created_by' => $this->session->userdata('admin_id'),
                    'created_at' => date('d-m-Y : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
               $this->Exam_model->edit_candi($data, $editData['id']);
               
    
            }else{
              $data = array(
                'exam_name' => $this->input->post('exam_name'),
                'state' => $state_array,
                'city' => $city_array,
                'district_code' => $district_code_array,
                'city_code' => $city_code_array,
                'sub_name' => $sub_name_array,
                'number_of_can' => $number_of_can_array,
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
            );
            
            $data = $this->security->xss_clean($data);
            $this->Exam_model->add_application_cand($data);
            }
           

            $this->session->set_flashdata('success', 'Candidate Application added successfully(उम्मीदवार का आवेदन सफलतापूर्वक जोड़ा गया)');

            redirect(base_url('admin/master/app_of_candidate'), 'refresh');
        } else {

            $data['subject'] = $this->Master_model->get_subject();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/candidate_add', $data);
            $this->load->view('admin/includes/_footer');
        }
    }
    //Dev Brijesh candidate_add
    public function candidateAdd(){

       
        if ($this->input->post()) {

            $state = $this->input->post('state');
            $state_array = implode(",", $state);

            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",", $district_code);

            $city = $this->input->post('city');
            $city_array = implode(",", $city);

            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",", $city_code);

            $sub_name = $this->input->post('sub_name');
            $sub_name_array = implode(",", $sub_name);

            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",", $number_of_can);

            $query = $this->db->query("SELECT * from ci_exam_master where status=1 and id=" . $this->input->post('exam_name'));
            $condidateCount = $query->row_array()['no_of_cand'];
            $findDuplicatesubject = array_diff_assoc($sub_name, array_unique($sub_name)); 

            foreach($number_of_can as $no_candidates){
                if($no_candidates <= $condidateCount){
                    $rs = 1;
                }else{
                    $rs = 0;
                }
                $frs[] = $rs;
            }
        $finres = in_array(0,$frs);
        $checkExamName = $this->db->query("SELECT * from ci_candidate_app where exam_name=".$this->input->post('exam_name'));
        $checkExamNameexit = $checkExamName->num_rows();
        if(!empty($checkExamNameexit >0)){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! Exam Already Exit.</h3>"
                );
        }elseif(!empty($findDuplicatesubject)){
            $response = array(
                'status' => 'error',
                'message' => "<h3>oh! Subject name are same.</h3>"
            );
        }elseif(!empty($findDuplicatetime_exam)){
            $response = array(
                'status' => 'error',
                'message' => "<h3>oh! time are same.</h3>"
            );
        }elseif(!empty($findDuplicateshft_exam)){
            $response = array(
                'status' => 'error',
                'message' => "<h3>oh! Shift are same.</h3>"
            );
        }elseif($finres == 1){
            $response = array(
                'status' => 'error',
                'message' => "<h3>oh! not more then ".$condidateCount.".</h3>"
            );
        }
        else{
            $data = array(
                    'exam_name' => $this->input->post('exam_name'),
                    'state' => $state_array,
                    'city' => $city_array,
                    'district_code' => $district_code_array,
                    'city_code' => $city_code_array,
                    'sub_name' => $sub_name_array,
                    'number_of_can' => $number_of_can_array,
                    'created_by' => $this->session->userdata('admin_id'),
                    'created_at' => date('d-m-Y : h:m:s'),
                );
            $data = $this->security->xss_clean($data);
            $result =$this->Exam_model->add_application_cand($data);
            if($result ==true){
                $response = array(
                    'status' => 'success',
                    'message' => "<h3>Candidate Applications Add successfully.</h3>"
                );
            }else{
            
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>Candidate Applications Error.</h3>"
                );
            }
        }
    }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        
    } 
    // Dev Brijesh Condidate Edit OR Update
    public function candidateUpdate($id){
        //print_r($id);die;
        if ($this->input->post()) {

            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",", $district_code);

            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",", $city_code);

            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",", $number_of_can);
            $subjects = $this->input->post('sub_name');
            $subjectsArray = implode(",", $subjects);

            $query = $this->db->query("SELECT * from ci_exam_master where status=1 and id=" . $this->input->post('exam_name_id'));
            $condidateCount = $query->row_array()['no_of_cand'];
            $findDuplicatesubject = array_diff_assoc($subjects, array_unique($subjects)); 

            foreach($number_of_can as $no_candidates){
                if($no_candidates <= $condidateCount){
                    $rs = 1;
                }else{
                    $rs = 0;
                }
                $frs[] = $rs;
            }
            $finres = in_array(0,$frs);
           // print_r($subjectsArray);die;
           if(!empty($findDuplicatesubject)){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! Subject name are same.</h3>"
                );
            }elseif($finres == 1){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! not more then ".$condidateCount.".</h3>"
                );
            }
            else{
                $data = array(
                    'number_of_can' => $number_of_can_array,
                    'sub_name' => $subjectsArray,
                    'district_code' => $district_code_array,
                    'city_code' => $city_code_array,
                    'updated_by' => $this->session->userdata('admin_id'),
                    'updated_at' => date('d-m-Y : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
                // print_r($data); die();
                $result = $this->Exam_model->edit_candi($data, urldecrypt($id));
                if($result ==true){
                    $response = array(
                        'status' => 'success',
                        'message' => "<h3>Candidate Applications Update successfully.</h3>"
                    );
                }else{
                
                    $response = array(
                        'status' => 'error',
                        'message' => "<h3>Candidate Applications Error.</h3>"
                    );
                }
            } 
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function candidate_edit($id)
    {

        if ($this->input->post()) {

            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",", $district_code);

            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",", $city_code);

            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",", $number_of_can);
            $subjects = $this->input->post('sub_name');
            $subjectsArray = implode(",", $subjects);

            $data = array(
                'number_of_can' => $number_of_can_array,
                'sub_name' => $subjectsArray,
                'district_code' => $district_code_array,
                'city_code' => $city_code_array,
                'updated_by' => $this->session->userdata('admin_id'),
                'updated_at' => date('d-m-Y : h:m:s'),
            );


            $data = $this->security->xss_clean($data);
            // print_r($data); die();
            $result = $this->Exam_model->edit_candi($data, urldecrypt($id));

            $this->session->set_flashdata('success', 'Updated successfully!<br/>सफलतापूर्वक अपडेट किया गया!');

            redirect(base_url('admin/master/app_of_candidate'), 'refresh');
        } else {
            // echo urldecrypt($id)."kjhfkrk";
            $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));

            $data['subjects'] = $this->Exam_model->get_subject_new_by_id($data['admin']['exam_name']);


            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $number_of_can = $data['admin']['number_of_can'];
            $number_of_can_array = explode(",", $number_of_can);

            $state = $data['admin']['state'];
            $state_array = explode(",", $state);

            $city = $data['admin']['city'];
            $city_array = explode(",", $city);

            $district_code = $data['admin']['district_code'];
            $district_code_array = explode(",", $district_code);

            $city_code = $data['admin']['city_code'];
            $city_code_array = explode(",", $city_code);

            $sub_name = $data['admin']['sub_name'];
            $sub_name_array = explode(",", $sub_name);

            foreach ($number_of_can_array as $k => $value1) {
                $subjectId = $number_of_can_array[$k];
                $sub_info[$k]['number_of_can_array'] = $number_of_can_array[$k];
                $sub_info[$k]['state_array'] = $state_array[$k];
                $sub_info[$k]['city_array'] = $city_array[$k];
                $sub_info[$k]['district_code_array'] = $district_code_array[$k];
                $sub_info[$k]['city_code_array'] = $city_code_array[$k];
                $sub_info[$k]['sub_name_array'] = $sub_name_array[$k];
            }


           // print_r($data);die;
            $sub_info['sub_info'] = $sub_info;
            $this->load->view('admin/includes/_header', $sub_info);
            $this->load->view('admin/exam/candidate_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }


    public function candidate_view($id)
    {
       
        $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));
        $data['states'] = $this->location_model->get_states();
        $data['role'] = $this->auth_model->get_auth_dd();
        $data['exam'] = $this->Master_model->get_exam();

        $number_of_can = $data['admin']['number_of_can'];
        $number_of_can_array = explode(",", $number_of_can);

        $state = $data['admin']['state'];
        $state_array = explode(",", $state);

        $city = $data['admin']['city'];
        $city_array = explode(",", $city);

        $district_code = $data['admin']['district_code'];
        $district_code_array = explode(",", $district_code);

        $city_code = $data['admin']['city_code'];
        $city_code_array = explode(",", $city_code);
        $subjects = $data['admin']['sub_name'];
        $subjects_array = explode(",", $subjects);


        foreach ($number_of_can_array as $k => $value1) {
            $subjectId = $number_of_can_array[$k];
            $sub_info[$k]['number_of_can_array'] = $number_of_can_array[$k];
            $sub_info[$k]['state_array'] = $state_array[$k];
            $sub_info[$k]['city_array'] = $city_array[$k];
            $sub_info[$k]['district_code_array'] = $district_code_array[$k];
            $sub_info[$k]['city_code_array'] = $city_code_array[$k];
            $sub_info[$k]['subjectname'] = $subjects_array[$k];
        }

        $sub_info['sub_info'] = $sub_info;
        $this->load->view('admin/includes/_header', $sub_info);
        $this->load->view('admin/exam/candidate_view', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function candiate_del($id)
    {

       $id =  urldecrypt($id);
       $ref_id = get_exam_namewithStatusOne(getExamIdFromCandidateTable($id)); //
    
       $this->db->delete('ci_candidate_app', array('id' => $id)); 

       $this->db->delete('ci_registration_invitation', ['ref_id' => $ref_id]);
       $this->db->delete('examshiftchoice', ['examId' => $ref_id]);
       $this->db->delete('ci_exam_according_to_school', ['ref_id' => $ref_id]);
       $this->db->delete('ci_allocation_table', ['exam_id' => $ref_id]);
       $this->db->delete('ci_exam_invitation', array('id' => $ref_id));
       $this->db->delete('ci_mark_attendance_allocation', ['exam_id' => $ref_id]);

       

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/सफलतापूर्वक हटा दिया गया!>');

        redirect(base_url('admin/master/app_of_candidate'));
    }

    public function invt_list()
    {
        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invitation_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_list_data()
    {

        $data['info'] = $this->Exam_model->get_all_invites();
         

        $this->load->view('admin/exam/invitation_list', $data);
    }

    public function invitation_preview($id)
    {

        $data['id'] = ($id);
        $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id));
        $data['states'] = $this->location_model->get_states();

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/invitation_preview', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function date_sheet_del($id)
    {
        $id =  urldecrypt($id);

        $ref_id = get_exam_name_downloadreport($id);
      
        $this->db->delete('ci_candidate_app', ['exam_name' => $ref_id]);

        $this->db->delete('ci_registration_invitation', ['ref_id' => $id]);
        $this->db->delete('examshiftchoice', ['examId' => $id]);
        $this->db->delete('ci_exam_according_to_school', ['ref_id' => $id]);
        $this->db->delete('ci_allocation_table', ['exam_id' => $id]);
        $this->db->delete('ci_exam_invitation', array('id' => $id));
        $this->db->delete('ci_mark_attendance_allocation', ['exam_id' => $id]);
        $this->session->set_flashdata('success', 'Deleted Successfully!<br/सफलतापूर्वक हटा दिया गया!>');

        redirect(base_url('admin/master/invt_list'));
    }

    public function invitation_add()
    {
        if ($this->input->post()) {
            $arr = [];
            $sub_name1 = $this->input->post('sub_name') ;          
            $no_candidate1 = $this->input->post('no_candidate');
            $shft_exam1 = $this->input->post('shft_exam') ;
            $date_exam1 = $this->input->post('date_exam') ;
            $time_exam1 = $this->input->post('time_exam') ;
            $sub_name=[];
            $no_candidate = [];
            $shft_exam = [] ;
            $date_exam = [] ;
            $time_exam = [] ;
            foreach($this->input->post('sub_name') as $key=>$value){
                $senData = $value.'_'.$no_candidate1[$key].'_'.$shft_exam1[$key].'_'.$date_exam1[$key].'_'.$time_exam1[$key];
                if(!in_array($senData,$arr)){
                    array_push($sub_name,$value);          
                    array_push($no_candidate,$no_candidate1[$key]);          
                    array_push($shft_exam,$shft_exam1[$key]);          
                    array_push($date_exam,$date_exam1[$key]);          
                    array_push($time_exam,$time_exam1[$key]);          
                    array_push($arr,$senData);
                }
            }
            $sub_name =  implode(',',$sub_name);
            $no_candidate =  implode(',',$no_candidate);
            $shft_exam = implode(',',$shft_exam);
            $date_exam = implode(',',$date_exam);
            $time_exam =  implode(',',$time_exam);
           
            if ($this->input->post('subjectline') == '') {
                $subjectline = $this->input->post('exam_name');
                $subjectline_name_array = $this->Exam_model->subjectline_name($subjectline);
                $subjectline = $subjectline_name_array[0]->exam_name . '(' . $subjectline_name_array[0]->exam_hindi_name . ')';
            } else {
                $subjectline = $this->input->post('subjectline');
            }

            $editData = $this->Exam_model->getInvitationUsingExamId($this->input->post('exam_name'));
            if(isset($editData)){
                $arr = [];
                $sub_name1 =  explode(",",$sub_name.','.$editData['sub_name']);
                $no_candidate1 =  explode(",",$no_candidate.','.$editData['no_candidate']);
                $shft_exam1 = explode(",",$shft_exam.','.$editData['shft_exam']);
                $date_exam1 =   explode(",",$date_exam.','.$editData['date_exam']);
                $time_exam1 = explode(",",$time_exam.','.$editData['time_exam']);
                $sub_name=[];
                $no_candidate = [];
                $shft_exam = [] ;
                $date_exam = [] ;
                $time_exam = [] ;

            foreach($sub_name1 as $key=>$value){
                $senData = $value.'_'.$no_candidate1[$key].'_'.$shft_exam1[$key].'_'.$date_exam1[$key].'_'.$time_exam1[$key];
                if(!in_array($senData,$arr)){
                    array_push($sub_name,$value);          
                    array_push($no_candidate,$no_candidate1[$key]);          
                    array_push($shft_exam,$shft_exam1[$key]);          
                    array_push($date_exam,$date_exam1[$key]);          
                    array_push($time_exam,$time_exam1[$key]);          
                    array_push($arr,$senData);
                }
            }
            $sub_name =  implode(',',$sub_name);
            $no_candidate =  implode(',',$no_candidate);
            $shft_exam = implode(',',$shft_exam);
            $date_exam = implode(',',$date_exam);
            $time_exam =  implode(',',$time_exam);

            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $subjectline,
                'startdate' => $this->input->post('startdate'),
                'enddate' => $this->input->post('enddate'),
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $sub_name,
                'no_candidate' => $no_candidate,
                'shft_exam' => $shft_exam,
                'date_exam' => $date_exam,
                'time_exam' => $time_exam,
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->edit_invitation($data);
        }else{

            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $subjectline,
                'startdate' => $this->input->post('startdate'),
                'enddate' => $this->input->post('enddate'),
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $sub_name,
                'no_candidate' => $no_candidate,
                'shft_exam' => $shft_exam,
                'date_exam' => $date_exam,
                'time_exam' => $time_exam,
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_invitation($data);
        }

            $this->session->set_flashdata('success', 'Create exam schedule  has been added successfully(परीक्षा कार्यक्रम बनाएं सफलतापूर्वक जोड़ दिया गया है)');

            redirect(base_url('admin/master/invt_list'), 'refresh');
        } else {

            $data['subject'] = $this->Master_model->get_subject();

            $data['exam'] = $this->Master_model->get_exam();
            // echo '<pre>'; print_r($data['subject']); die();
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/invitation_add', $data);
            $this->load->view('admin/includes/_footer');
        }
    }
    function sumArray($array) {
        $total = 0;
        foreach ($array as $value) {
            $total += $value;
        }
        return $total;
    }
    //Dev by Brijesh Create Exam Schedule 
     public function saveExamSchedule(){
        if ($this->input->post()) {
            $arr = [];
            $sub_name1 = $this->input->post('sub_name') ;          
            $no_candidate1 = $this->input->post('no_candidate');
            $shft_exam1 = $this->input->post('shft_exam') ;
            $date_exam1 = $this->input->post('date_exam') ;
            $time_exam1 = $this->input->post('time_exam') ;
            $sub_name=[];
            $no_candidate = [];
            $shft_exam = [] ;
            $date_exam = [] ;
            $time_exam = [] ;
            $query = $this->db->query("SELECT * from ci_exam_master where status=1 and id=" . $this->input->post('exam_name'));
            $condidateCount = $query->row_array()['no_of_cand'];
            foreach($this->input->post('sub_name') as $key=>$value){
                $senData = $value.'_'.$no_candidate1[$key].'_'.$shft_exam1[$key].'_'.$date_exam1[$key].'_'.$time_exam1[$key];
                
                if(!in_array($senData,$arr)){
                    array_push($sub_name,$value); 
                    array_push($no_candidate,$no_candidate1[$key]);    
                    array_push($shft_exam,$shft_exam1[$key]);          
                    array_push($date_exam,$date_exam1[$key]);          
                    array_push($time_exam,$time_exam1[$key]);          
                    array_push($arr,$senData);
                }
            }
           
            $findDuplicatesubject = array_diff_assoc($sub_name, array_unique($sub_name)); 
            $findDuplicatetime_exam = array_diff_assoc($time_exam, array_unique($time_exam)); 
            $findDuplicateshft_exam = array_diff_assoc($shft_exam, array_unique($shft_exam)); 
            $totalCondidate = 0;
            foreach ($no_candidate as $value) {
                $totalCondidate += $value;
                $condidateCounts +=$condidateCount;
            }
            foreach($no_candidate as $no_candidates){
                    if($no_candidates <= $condidateCount){
                        $rs = 1;
                    }else{
                        $rs = 0;
                    }
                    $frs[] = $rs;
            }
            $finres = in_array(0,$frs);
            // $checkExamName = $this->db->query("SELECT * from ci_exam_invitation where exam_name=".$this->input->post('exam_name'));
            // $checkExamNameexit = $checkExamName->num_rows();
            // if(!empty($checkExamNameexit >0)){
            //     $response = array(
            //         'status' => 'error',
            //         'message' => "<h3>oh! Exam Already Exit.</h3>"
            //     );
            // }else
            if(!empty($findDuplicatesubject)){
                
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! Subject name are same.</h3>"
                );
            }elseif(!empty($findDuplicatetime_exam)){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! time are same.</h3>"
                );
            }elseif(!empty($findDuplicateshft_exam)){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! Shift are same.</h3>"
                );
            }elseif($finres == 1){
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>oh! not more then ".$condidateCount.".</h3>"
                );
            }
            else{
            $sub_name =  implode(',',$sub_name);
            $no_candidate =  implode(',',$no_candidate);
            $shft_exam = implode(',',$shft_exam);
            $date_exam = implode(',',$date_exam);
            $time_exam =  implode(',',$time_exam);
           
            if ($this->input->post('subjectline') == '') {
                $subjectline = $this->input->post('exam_name');
                $subjectline_name_array = $this->Exam_model->subjectline_name($subjectline);
                $subjectline = $subjectline_name_array[0]->exam_name . '(' . $subjectline_name_array[0]->exam_hindi_name . ')';
            } else {
                $subjectline = $this->input->post('subjectline');
            }


            $editData = $this->Exam_model->getInvitationUsingExamId($this->input->post('exam_name'));
          //  print_r($editData);die;
            if(isset($editData)){
                $arr = [];
                $sub_name1 =  explode(",",$sub_name.','.$editData['sub_name']);
                $no_candidate1 =  explode(",",$no_candidate.','.$editData['no_candidate']);
                $shft_exam1 = explode(",",$shft_exam.','.$editData['shft_exam']);
                $date_exam1 =   explode(",",$date_exam.','.$editData['date_exam']);
                $time_exam1 = explode(",",$time_exam.','.$editData['time_exam']);
                $sub_name=[];
                $no_candidate = [];
                $shft_exam = [] ;
                $date_exam = [] ;
                $time_exam = [] ;

            foreach($sub_name1 as $key=>$value){
                    $senData = $value.'_'.$no_candidate1[$key].'_'.$shft_exam1[$key].'_'.$date_exam1[$key].'_'.$time_exam1[$key];
                    if(!in_array($senData,$arr)){
                        array_push($sub_name,$value);          
                        array_push($no_candidate,$no_candidate1[$key]);          
                        array_push($shft_exam,$shft_exam1[$key]);          
                        array_push($date_exam,$date_exam1[$key]);          
                        array_push($time_exam,$time_exam1[$key]);          
                        array_push($arr,$senData);
                    }
                }
                $sub_name =  implode(',',$sub_name);
                $no_candidate =  implode(',',$no_candidate);
                $shft_exam = implode(',',$shft_exam);
                $date_exam = implode(',',$date_exam);
                $time_exam =  implode(',',$time_exam);

                $data = array(
                    'speedpost' => $this->input->post('speedpost'),
                    'subjectline' => $subjectline,
                    'startdate' => $this->input->post('startdate'),
                    'enddate' => $this->input->post('enddate'),
                    'exam_name' => $this->input->post('exam_name'),
                    'sub_name' => $sub_name,
                    'no_candidate' => $no_candidate,
                    'shft_exam' => $shft_exam,
                    'date_exam' => $date_exam,
                    'time_exam' => $time_exam,
                    'created_at' => date('d-m-Y : h:m:s'),
                    'created_by' => $this->session->userdata('admin_id'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->Exam_model->edit_invitation($data);
           }else{
                $data = array(
                    'speedpost' => $this->input->post('speedpost'),
                    'subjectline' => $subjectline,
                    'startdate' => $this->input->post('startdate'),
                    'enddate' => $this->input->post('enddate'),
                    'exam_name' => $this->input->post('exam_name'),
                    'sub_name' => $sub_name,
                    'no_candidate' => $no_candidate,
                    'shft_exam' => $shft_exam,
                    'date_exam' => $date_exam,
                    'time_exam' => $time_exam,
                    'created_at' => date('d-m-Y : h:m:s'),
                    'created_by' => $this->session->userdata('admin_id'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->Exam_model->add_invitation($data);

            }
            if($result ==true){
                $response = array(
                    'status' => 'success',
                    'message' => "<h3>Exam Schedule Add successfully.</h3>"
                );
            }else{
            
                $response = array(
                    'status' => 'error',
                    'message' => "<h3>Exam Schedule Error.</h3>"
                );
            }
        }}
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
           // print_r($this->input->post());die;
     }                       
    // 22-09-2022 add new Code
    public function addSubjectNew($id)
    {
        $exam_name = $this->master_model->get_exam_by_id(urldecrypt($id));
        $data['id'] = urldecrypt($id);
        $exam_name = $exam_name['exam_name'];
        $data['exam_name'] = $exam_name;

        $data['title'] = 'Add Subject For ' . $exam_name;

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/master/add_subject_for_examname', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
    public function view_all_subjectNew($id)
    {
        $exam_name = $this->master_model->get_exam_by_id(urldecrypt($id));
        $data['id'] = urldecrypt($id);

        $exam_name = $exam_name['exam_name'];
        $data['exam_name'] = $exam_name;
        $data['title'] = 'Subject List In ' . $exam_name;
        $subjectList = $this->master_model->get_subject_new_by_id(urldecrypt($id));
        $data['subjectList'] = $subjectList;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/master/all_subject_for_exam_list', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function addsubjectforexam()
    {
        // $this->rbac->check_operation_access();
                if ($this->input->post()) {

                    $duplicatecheckName = $this->master_model->checkExamName($this->input->post('sub_name'),$this->input->post('exam_id'));
                    $duplicatecheckCode = $this->master_model->checkExamCode($this->input->post('sub_code'),$this->input->post('exam_id'));
                   // print_r($duplicatecheck);die;
				    if($duplicatecheckName) {
                        $this->session->set_flashdata('form_data', $this->input->post());
                        $this->session->set_flashdata('allerrorshow', "Subject name already exit!");
                        redirect(base_url('admin/master/addSubjectNew/' . urlencrypt($this->input->post('exam_id'))));
				    }elseif($duplicatecheckCode) {
                        $this->session->set_flashdata('form_data', $this->input->post());
                        $this->session->set_flashdata('allerrorshow', "Subject Code already exit!");
                        redirect(base_url('admin/master/addSubjectNew/' . urlencrypt($this->input->post('exam_id'))));
				    }
                    else{
                        $data = [
                            'exam_id' => ucfirst($this->input->post('exam_id')),
                            'sub_name' => ucfirst($this->input->post('sub_name')),
                            'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),
                            'sub_code' => ucfirst($this->input->post('sub_code')),
                            'created_at' => date('Y-m-d h:m:s'),
                            'status' => 1,
                            'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
                        ];
                        $data = $this->security->xss_clean($data);
                        $subject_id = $this->input->post('subject_id');
                        if ($subject_id) {
                            $result = $this->master_model->edit_subjectNew($data, $subject_id);
                        } else {
                            $result = $this->master_model->add_subjectNew($data);
                        }

                        $this->session->set_flashdata('success', 'Subject has been added successfully (विषय सफलतापूर्वक जोड़ दिया गया है)');
                        redirect(base_url('admin/master/view_all_subjectNew/' . urlencrypt($this->input->post('exam_id'))));
                    }
                }
        }
    public function edit_subject_new($sub_id, $exam_id)
    {
        $subject_id = urldecrypt($sub_id);
        $exam_id = urldecrypt($exam_id);

        $exam_name = $this->master_model->get_exam_by_id($exam_id);
        $data['id'] = $exam_id;
        $exam_name = $exam_name['exam_name'];
        $data['exam_name'] = $exam_name;
        $data['title'] = 'Edit Subject For ' . $exam_name;
        $data['sub_id'] = $subject_id;

        $subject = $this->master_model->edit_subject_new_by_id($subject_id);
        $data['subject'] = $subject;
        //   print_r($data);
        //   exit;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/master/add_subject_for_examname', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function getSubjectNameNew()
    {

        if (isset($_GET['exam_id'])) {
            $id = $_GET['exam_id'];
            $subjectList = $this->master_model->get_subject_new_by_id(urldecrypt($id));
            print_r($subjectList);
        }
    }
}
