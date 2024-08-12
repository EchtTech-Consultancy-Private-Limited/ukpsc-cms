<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Examshedule_schedule extends MY_Controller {

    public function __construct() {



        parent::__construct();

        auth_check(); // check login auth
        $this->load->library('mailer');

        $this->load->model('admin/admin_model', 'admin_model');

        $this->load->model('admin/location_model', 'location_model');

        $this->load->model('admin/Exam_model', 'Exam_model');

        $this->load->model('admin/Master_model', 'Master_model');

        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/auth_model', 'auth_model');

        $this->load->helper('date');
    }

    function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    public function date_sheetlist() {

        $this->rbac->check_operation_access();

        $data['title'] = 'DateSheet List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/date_sheet_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invt_list() {


        $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invitation_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/exam/invitation_list', $data);
    }

    public function datesheet_list_data() {

        $data['info'] = $this->Exam_model->get_all_examsheet();

        $this->load->view('admin/exam/date_sheet_list', $data);
    }

    public function date_sheet_list_add() {

        // $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $exam_name = $this->input->post('exam_name');

            for ($i = 0; $i < count($exam_name); $i++) {

                $data = array(
                    'exam_name' => ucfirst($exam_name[$i]),
                    'sub_name' => $this->input->post('sub_name')[$i],
                    'no_candidate' => $this->input->post('no_candidate')[$i],
                    'shft_exam' => $this->input->post('shft_exam')[$i],
                    'date_exam' => $this->input->post('date_exam')[$i],
                    'time_exam' => $this->input->post('time_exam')[$i],
                    'created_by' => $this->session->userdata('admin_id')[$i],
                    // 'ip_address' => $this->input->ip_address(),
                    'created_at' => date('d-m-Y : h:m:s'),
                    'created_by' => $this->session->userdata('admin_id'),
                );

                $data = $this->security->xss_clean($data);

                $result = $this->Exam_model->add_date_sheet($data);
            }



            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/date_sheetlist'), 'refresh');
        } else {



            $data['subject'] = $this->Master_model->get_subject();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/date_sheet_list_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }



    public function invitation_add() {

        // $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";

            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                'startdate' => $this->input->post('startdate'),
                'enddate' => $this->input->post('enddate'),
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $sub_name,
                // 'exam_name' => $exam_name,
                'no_candidate' => $no_candidate,
                'shft_exam' => $shft_exam,
                'date_exam' => $date_exam,
                'time_exam' => $time_exam,
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );

            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_invitation($data);

            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/invt_list'), 'refresh');
        } else {

            $data['subject'] = $this->Master_model->get_subject();

            $data['exam'] = $this->Master_model->get_exam();
            // print_r($data['exam']); die();
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/invitation_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function invitation_preview($id) {

        $data['id'] = ($id);
        // echo urldecrypt($id);
        // die();
        $data['admin'] = $this->Exam_model->get_invitation_data_new(urldecrypt($id));
        // print_r( $data['admin'] ); die;
        $data['states'] = $this->location_model->get_states();

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/invitation_preview', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function consent_letter_preview($id) {

        $data['id'] = ($id);
        $data['admin'] = $this->Exam_model->get_invitation_data_new(urldecrypt($id));
        $data['states'] = $this->location_model->get_states();
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/consent_letter_preview', $data);
        $this->load->view('admin/includes/_footer');
    }


    public function send_invitation() {
        
        $examid = $this->uri->segment(4);
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Invitation and Schedule List';
        $data['exam_id'] = urldecrypt($examid);
        $this->db->from('ci_exam_invitation');
        $this->db->where('ci_exam_invitation.id',$data['exam_id']);
        $query = $this->db->get();
        $examName = $query->row_array();
        $data['examName'] = $examName['subjectline'];
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/exam/invt_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }


    // 21-09-2022 New Functoin Add 
    public function districtWiseCountOfStudents()
    {
        if(isset($_GET['state_id']) && isset($_GET['district_id']))
        {
            $id = $_GET['state_id'];
            $state_name = get_district_name($id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            // $districtWiseCountOfStudents = $this->Exam_model->getTotalCountinDistrictConsentNotRecieved($state_name);
            $districtWiseCountOfStudents = $this->Exam_model->getTotalCountinDistrict($state_name,$city_name);
            echo $districtWiseCountOfStudents;
            exit;

        }
    }

    public function districtWiseCountOfStudentsRecieved(){
        $state_name = isset($_GET['state_id'])?get_district_name($_GET['state_id']):'';
        $city_name = isset($_GET['district_id'])?get_subcity_name($_GET['district_id']):'';
        $grade_name = isset($_GET['grade'])?$_GET['grade']:'';
        $exam_id = isset($_GET['exam_Id'])?$_GET['exam_Id']:'';
        $data['exam_id'] = isset($_GET['exam_Id'])?$_GET['exam_Id']:'';
        $districtWiseCountOfStudents = $this->Exam_model->get_all_search_registration_data_recieved($state_name, $city_name, $grade_name,$exam_id);
        echo $districtWiseCountOfStudents;
        exit;
   
    }
    public function districtWiseCountOfStudentsNotRecieved(){
        $state_name = isset($_GET['state_id'])?get_district_name($_GET['state_id']):'';
        $city_name = isset($_GET['district_id'])?get_subcity_name($_GET['district_id']):'';
        $grade_name = isset($_GET['grade'])?$_GET['grade']:'';
        $exam_id = isset($_GET['exam_id'])?$_GET['exam_id']:'';
        $data['exam_id'] = isset($_GET['exam_id'])?$_GET['exam_id']:'';
     
        $districtWiseCountOfStudents = $this->Exam_model->get_all_search_registration_data_not_recieved($state_name, $city_name, $grade_name,$exam_id);
        echo $districtWiseCountOfStudents;
        exit;
   
    }
    public function getGradeWiseCount()
    {
     
            $id = $_GET['state_id'];
            $state_name = get_district_name($id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            $gradeOfStudents = $this->Exam_model->getGradeCount($state_name,$city_name, $grade_name);
            echo $gradeOfStudents;
            exit;

        
    }
    public function totalCountSchoolWise()
    {
        if(isset($_GET['school_ids']))
        {
            $ids = $_GET['school_ids'];
            $SchoolWiseCounts = $this->Exam_model->getTotalCountinSchoolWise($ids);
            echo $SchoolWiseCounts;
            exit;

        }else{
    
            $data = 0;
            echo $data;
            exit;
        }
    }
    // End Login Jogi..
    public function inv_list_data_for_mail() {
        $state_name = isset($_GET['state_id'])?get_district_name($_GET['state_id']):'';
        $city_name = isset($_GET['district_id'])?get_subcity_name($_GET['district_id']):'';
        $grade_name = isset($_GET['grade'])?$_GET['grade']:'';
        $exam_id = isset($_GET['exam_Id'])?$_GET['exam_Id']:'';
        $data['exam_id'] = isset($_GET['exam_Id'])?$_GET['exam_Id']:'';
        $data['data'] = $this->Exam_model->get_all_search_registration_data($state_name, $city_name, $grade_name,$exam_id);
     
        $array = array('created_by' => $this->session->userdata('admin_id'));
        $this->load->view('admin/exam/sending_invitations', $data);
    }
  


    public function inv_all_data_for_mail($exam_id) {
        
        // ,$state_id,$district_id,$grade
        // echo $exam_id.$state_id.$district_id.$grade;
    
        $array = array('created_by' => $this->session->userdata('admin_id'));
        
        $state_name = isset($_GET['state_id'])?get_district_name($_GET['state_id']):'';
        $city_name = isset($_GET['district_id'])?get_subcity_name($_GET['district_id']):'';
        $grade_name = isset($_GET['grade'])?$_GET['grade']:'';

        $records['data'] = $this->Exam_model->getAllRegisterDataForInvitation($state_name, $city_name, $grade_name,$exam_id);
        
        $data = [];
        $i = 0;

        foreach ($records['data'] as $row) {
            if($row['school_name'] != ''){
                
                $invitationStatus = $this->checkExamInvitationStatus($exam_id,$row['id']);
                $doneImage =  base_url("assets/img/check.png");
                $pendingImage =  base_url("assets/img/pending.png");
                
            
                $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
                $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
                
                if($invt_recieved==0 && $invite_sent==1)
                {
                    $action =   'Status: <img src="'.$pendingImage.'" height="34" alt="">';
                }
                elseif ($invt_recieved==1 && $invite_sent==1) {
                    $action =   'Status: <img src="'.$doneImage.'" alt=""> <br>
                    <a title="Revoke Consent" class="btn btn-warning mt-2" onClick="revokeConsentsInvitations('.$row['id'].')"> Revoke Consent </a>';
                }
                else{
                    $action =   '<input type="checkbox" id="a" class="send_email_ids" onClick="getCount('.$row['id'].')" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Send Consent" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
               
                }
                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = $row['max_allocate_candidate'];
                $data[] = [
                    ++$i,
                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action
                ];
            }
        }

        $records1['data'] = $data;    
        echo json_encode($records1);
    }


    public function date_sheet_list_edit($id) {

        $subject = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";

        if ($this->input->post('submit')) {


            $data = array(
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $subject,
                'no_candidate' => $this->input->post('no_candidate'),
                'shft_exam' => $this->input->post('shft_exam'),
                'date_exam' => $this->input->post('date_exam'),
                'time_exam' => $this->input->post('time_exam'),
                'updated_at' => date('d-m-Y : h:m:s'),
                'updated_by' => $this->session->userdata('admin_id')
            );
            $data = $this->security->xss_clean($data);

            $result = $this->Exam_model->edit_date_sheet($data, $id);

            if ($result) {

                $this->session->set_flashdata('success',
                        'Updated successfully!');
                redirect(base_url('admin/examshedule_schedule/date_sheetlist'),
                        'refresh');
            }
            // }
        } else {


            $data['id'] = ($id);
            $data['user'] = $this->Exam_model->get_datesheet_id($id);
            $data['subject'] = $this->Master_model->get_subject();
            // print_r($data['user']); die();
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/date_sheet_list_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function date_sheet_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_exam_invitation', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!(सफलतापूर्वक हटा दिया गया!)');

        redirect(base_url('admin/examshedule_schedule/create_letter'));
    }
    
    public function date_sheet_edit($id) {
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            // $id = $this->uri->segment(4);
            // $new_id = urldecrypt($id);
            // echo $new_id;exit;
            
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
                'create_letter_status' => 1,
            );
        
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Add successfully!(सफलतापूर्वक जोड़ें!)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        } else {

            $id = $this->uri->segment(4);
            $new_id = urldecrypt($id);

            $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
            // echo '<pre>';print_r($data); die();
            
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/create_letter_edit', $data);

            $this->load->view('admin/includes/_footer');
        }
    }




    public function date_sheet_update() {
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Update successfully!(अपडेट सफलतापूर्वक हो गया)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        }
    }

    public function app_of_candidate() {
        $this->rbac->check_operation_access();

        $data['title'] = 'Applications of Candidate';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/candidate_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function candidate_list_data() {

        $query = $this->db->query('SELECT sum(number_of_can) FROM (ci_candidate_app )');
        $data['total'] = ($query->result_array());
        $a = ($data['total'][0]);
        $data['total'] = ($a['sum(number_of_can)']);

        $data['info'] = $this->Exam_model->get_all_candidate_data();

        $this->load->view('admin/exam/candidate_app_list', $data);
    }

    public function candidate_add() {

        if ($this->input->post()) {

            $data = array(
                'number_of_can' => $this->input->post('number_of_can'),
                'state' => $this->input->post('state'),
                'exam_name' => $this->input->post('exam_name'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
            );

            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_application_cand($data);

            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/app_of_candidate'), 'refresh');
        } else {

            // $data['subject'] = $this->Master_model->get_subject();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/candidate_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function candidate_edit($id) {

        if ($this->input->post()) {

            $data = array(
                'number_of_can' => $this->input->post('number_of_can'),
                // 'exam_name' =>  $this->input->post('exam_name'),
                // 'state' => $this->input->post('state'),
                'updated_by' => $this->session->userdata('admin_id'),
                'updated_at' => date('d-m-Y : h:m:s'),
            );

            $data = $this->security->xss_clean($data);
            // print_r($data); die();
            $result = $this->Exam_model->edit_candi($data, urldecrypt($id));

            $this->session->set_flashdata('success', ' Updated successfully!');

            redirect(base_url('admin/examshedule_schedule/app_of_candidate'), 'refresh');
        } else {

            $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));
            // print_r($data['admin']); die();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/candidate_edit', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function candiate_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_candidate_app', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!');

        redirect(base_url('admin/examshedule_schedule/app_of_candidate'));
    }

    public function fetch_examname_data($id) {

        $query = $this->db->query("SELECT * from ci_exam_master where status=1
		and id=" . $id);
        $data = $query->row_array();

        echo json_encode($data);

        // $no = $data['no_of_cand'];
        // $start_date_exam = $data['start_date_exam'];
        // $end_date_exam = $data['end_date_exam'];
        // return json_encode '<p>'.$no.' </p>';
        // return json_encode '<p>'.$start_date_exam.' </p>';
        // return json_encode '<p>'.$end_date_exam.' </p>';
    }

    public function send_invitation_user_all() {

        $ids = $this->input->get('data');
        $send_consent_id = $this->input->get('send_consent_id');
        $new_id = urldecrypt($send_consent_id); 
        $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
      
        
        if(!empty($ids)){
            foreach ($ids as $id) {
                $schoolData = getSchoolDetails($id);

                $arr = [
                    'exam_name' => $data['exam'][0]['subjectline'],
                    'ref_id' => $new_id,
                    'invite_sent' => '1',
                    'invt_recieved' => '0'
                ];

                $this->db->from('ci_registration_invitation');
                $this->db->where('ci_registration_invitation.school_id', $id);
                $this->db->where('ci_registration_invitation.ref_id', $new_id);
                
                $queryNew = $this->db->get();
                if ($queryNew->num_rows()== 0) {
                    $dataForNewTable = [
                        'school_id' =>$id,
                        'exam_name' => $data['exam'][0]['subjectline'],
                        'speedpost'=>$data['exam'][0]['speedpost'],
                        'startdate'=>$data['exam'][0]['startdate'],
                        'enddate'=>$data['exam'][0]['enddate'],
                        'name_designation_mobile'=>$data['exam'][0]['name_designation_mobile'],
                        'ref_id' => $new_id,
                        'invite_sent' => '1',
                        'invt_recieved' => '0',
                        'consents_signstamp_status'=>'0'
                    ];
                    $this->db->insert('ci_registration_invitation', $dataForNewTable);
                    $newDataForconsent = [
                        'ref_id' => $new_id,
                        'exam_name' => $data['exam'][0]['subjectline'],
                        'invite_sent' => '1',
                        'invt_recieved' => '0',
                        'school_id'=>$id,

                        "admin_id"=>isset($schoolData['admin_id'])?$schoolData['admin_id']:'',
                        "admin_role_id"=>isset($schoolData['admin_role_id'])?$schoolData['admin_role_id']:'',
                        "school_registration_number"=>isset($schoolData['school_registration_number'])?$schoolData['school_registration_number']:'',
                        "school_name"=>isset($schoolData['school_name'])?$schoolData['school_name']:'',
                        "address"=>isset($schoolData['address'])?$schoolData['address']:'',
                        "landmark"=>isset($schoolData['landmark'])?$schoolData['landmark']:'',
                        "district"=>isset($schoolData['district'])?$schoolData['district']:'',
                        "city"=>isset($schoolData['city'])?$schoolData['city']:'', 
                        "principal_name"=>isset($schoolData['principal_name'])?$schoolData['principal_name']:'',
                        "pri_mobile"=>isset($schoolData['pri_mobile'])?$schoolData['pri_mobile']:'',
                        "email"=>isset($schoolData['email'])?$schoolData['email']:'',
                        "whats_num"=>isset($schoolData['whats_num'])?$schoolData['whats_num']:'',
                        "super_name"=>isset($schoolData['super_name'])?$schoolData['super_name']:'',
                        "super_design"=>isset($schoolData['super_design'])?$schoolData['super_design']:'',
                        "super_mobile"=>isset($schoolData['super_mobile'])?$schoolData['super_mobile']:'',
                        "super_email"=>isset($schoolData['super_email'])?$schoolData['super_email']:'', 
                        "super_whatspp"=>isset($schoolData['super_whatspp'])?$schoolData['super_whatspp']:'',
                        "total_class_number"=>isset($schoolData['total_class_number'])?$schoolData['total_class_number']:'',
                        "class_sitting_capacity"=>isset($schoolData['class_sitting_capacity'])?$schoolData['class_sitting_capacity']:'',
                        "max_num_student"=>isset($schoolData['max_num_student'])?$schoolData['max_num_student']:'', 
                        "furniture_avail"=>isset($schoolData['furniture_avail'])?$schoolData['furniture_avail']:'', 
                        "elec_avail"=>isset($schoolData['elec_avail'])?$schoolData['elec_avail']:'', 
                        "gen_avai"=>isset($schoolData['gen_avai'])?$schoolData['gen_avai']:'', 
                        "wash_rrom"=>isset($schoolData['wash_rrom'])?$schoolData['wash_rrom']:'', 
                        "clock_room"=>isset($schoolData['clock_room'])?$schoolData['clock_room']:'', 
                        "vehicle_avail"=>isset($schoolData['vehicle_avail'])?$schoolData['vehicle_avail']:'', 
                        "staff_suffi"=>isset($schoolData['staff_suffi'])?$schoolData['staff_suffi']:'', 
                        "ukpsc_exxma"=>isset($schoolData['ukpsc_exxma'])?$schoolData['ukpsc_exxma']:'', 
                        "debar"=>isset($schoolData['debar'])?$schoolData['debar']:'', 
                        "bras_Seal"=>isset($schoolData['bras_Seal'])?$schoolData['bras_Seal']:'', 
                        "remark_if"=>isset($schoolData['remark_if'])?$schoolData['remark_if']:'', 
                        "suggetions"=>isset($schoolData['suggetions'])?$schoolData['suggetions']:'', 
                        "exam_center_hindi"=>isset($schoolData['exam_center_hindi'])?$schoolData['exam_center_hindi']:'', 
                        "max_allocate_candidate"=>isset($schoolData['max_allocate_candidate'])?$schoolData['max_allocate_candidate']:'', 
                        "exam_center_eng"=>isset($schoolData['exam_center_eng'])?$schoolData['exam_center_eng']:'', 
                        "acc_holder_name"=>isset($schoolData['acc_holder_name'])?$schoolData['acc_holder_name']:'', 
                        "ban_name"=>isset($schoolData['ban_name'])?$schoolData['ban_name']:'', 
                        "branch_name"=>isset($schoolData['branch_name'])?$schoolData['branch_name']:'', 
                        "ifsc"=>isset($schoolData['ifsc'])?$schoolData['ifsc']:'', 
                        "acc_num"=>isset($schoolData['acc_num'])?$schoolData['acc_num']:'', 
                        "acc_numacc_num_con"=>isset($schoolData['acc_numacc_num_con'])?$schoolData['acc_numacc_num_con']:'', 
                        "acc_num_con"=>isset($schoolData['acc_num_con'])?$schoolData['acc_num_con']:'', 
                        "date"=>isset($schoolData['date'])?$schoolData['date']:'', 
                        "place"=>isset($schoolData['place'])?$schoolData['place']:'', 
                        "status_admin"=>isset($schoolData['status_admin'])?$schoolData['status_admin']:'', 
                        "ranking_admin"=>isset($schoolData['ranking_admin'])?$schoolData['ranking_admin']:'', 
                        "admin_date"=>isset($schoolData['admin_date'])?$schoolData['admin_date']:'', 
                        "remard_admin"=>isset($schoolData['remard_admin'])?$schoolData['remard_admin']:'', 
                        "admin_role_ranking"=>isset($schoolData['admin_role_ranking'])?$schoolData['admin_role_ranking']:'', 
                        "fileName1"=>isset($schoolData['fileName1'])?$schoolData['fileName1']:'', 
                        "fileName2"=>isset($schoolData['fileName2'])?$schoolData['fileName2']:'', 
                        "fileName3"=>isset($schoolData['fileName3'])?$schoolData['fileName3']:'', 
                        "fileName4"=>isset($schoolData['fileName4'])?$schoolData['fileName4']:'', 
                        "fileName5"=>isset($schoolData['fileName5'])?$schoolData['fileName5']:'', 
                        "fileName6"=>isset($schoolData['fileName6'])?$schoolData['fileName6']:'', 
                        "created_at"=>isset($schoolData['created_at'])?$schoolData['created_at']:'', 
                        "created_by"=>isset($schoolData['created_by'])?$schoolData['created_by']:'', 
                        "updated_at"=>isset($schoolData['updated_at'])?$schoolData['updated_at']:'', 
                        "update_by"=>isset($schoolData['update_by'])?$schoolData['update_by']:'', 
                        "last_ip"=>isset($schoolData['last_ip'])?$schoolData['last_ip']:'', 
                        "file_movement"=>isset($schoolData['file_movement'])?$schoolData['file_movement']:'',  
                        "no_room"=>isset($schoolData['no_room'])?$schoolData['no_room']:'', 
                        "no_sheet"=>isset($schoolData['no_sheet'])?$schoolData['no_sheet']:'', 
                        "consent_grading"=>isset($schoolData['consent_grading'])?$schoolData['consent_grading']:'', 
                        "consent_status"=>isset($schoolData['consent_status'])?$schoolData['consent_status']:'', 
                        "state"=>isset($schoolData['state'])?$schoolData['state']:'', 
                        "examincation_id"=>isset($schoolData['examincation_id'])?$schoolData['examincation_id']:'', 
                        "exmin_ceter_option"=>isset($schoolData['exmin_ceter_option'])?$schoolData['exmin_ceter_option']:'', 
                        "consents_signstamp_file"=>isset($schoolData['consents_signstamp_file'])?$schoolData['consents_signstamp_file']:'', 
                        "consents_signstamp_status"=>isset($schoolData['consents_signstamp_status'])?$schoolData['consents_signstamp_status']:'',
                    ];
                    $this->db->insert('ci_exam_according_to_school', $newDataForconsent);
                    
                }

                $arrForInvitation = [
                    'invite_sent' => '1',
                    'invt_recieved' => '0'
                ];
                 $this->db->where(['id' => $new_id])->update('ci_exam_invitation', $arrForInvitation);
               
                 $this->db->where(['id' => $id])->update('ci_exam_registration', $arr);
                 $email = getEmail($id);
                 $phone = getMobile($id);
                 $examName = get_exam_name($data['exam'][0]['exam_name']);
                 $messageP1='Dear Sir/Madam , ';
                 $messageP1.= 'Consent for the '.$examName.' has been sent for your kind approval. Kindly login into your account on consent portal to complete the consent sending process.';
                 $messageP1.='Regards';
                 $messageP1.='UKPSC, Haridwar';
                 
               
                 $template_id = "1007076974594881905";
    
                 sendSMS($phone,$messageP1,$template_id);
                 $mail_data = array(
                     'examname' => $examName
                   
                 );
              
                 $this->load->helper('email_helper');
                 $this->mailer->mail_template($email,'send-consent-1',$mail_data);
 
               
            }
        
        }else{
            
            $id = $this->input->get('id');

            $schoolData = getSchoolDetails($id);

            $arr = [
                'exam_name' => $data['exam'][0]['subjectline'],
                'ref_id' => $new_id,
                'invite_sent' => '1',
                'invt_recieved' => '0'
            ];
            $arrForInvitation = [
                'invite_sent' => '1',
                'invt_recieved' => '0'
            ];
        
            $this->db->from('ci_registration_invitation');
            $this->db->where('ci_registration_invitation.school_id', $id);
            $this->db->where('ci_registration_invitation.ref_id', $new_id);
            $queryNew = $this->db->get();
            if ($queryNew->num_rows()== 0) {
                
            $dataForNewTable = [
                'school_id' =>$id,
                'exam_name' => $data['exam'][0]['subjectline'],
                'speedpost'=>$data['exam'][0]['speedpost'],
                'startdate'=>$data['exam'][0]['startdate'],
                'enddate'=>$data['exam'][0]['enddate'],
                'name_designation_mobile'=>$data['exam'][0]['name_designation_mobile'],
                'ref_id' => $new_id,
                'invite_sent' => '1',
                'invt_recieved' => '0',
                'consents_signstamp_status'=>'0'
            ];
            $this->db->insert('ci_registration_invitation', $dataForNewTable);
            $newDataForconsent = [
                'ref_id' => $new_id,
                'exam_name' => $data['exam'][0]['subjectline'],
                'invite_sent' => '1',
                'invt_recieved' => '0',
                'school_id'=>$id,

                "admin_id"=>isset($schoolData['admin_id'])?$schoolData['admin_id']:'',
                "admin_role_id"=>isset($schoolData['admin_role_id'])?$schoolData['admin_role_id']:'',
                "school_registration_number"=>isset($schoolData['school_registration_number'])?$schoolData['school_registration_number']:'',
                "school_name"=>isset($schoolData['school_name'])?$schoolData['school_name']:'',
                "address"=>isset($schoolData['address'])?$schoolData['address']:'',
                "landmark"=>isset($schoolData['landmark'])?$schoolData['landmark']:'',
                "district"=>isset($schoolData['district'])?$schoolData['district']:'',
                "city"=>isset($schoolData['city'])?$schoolData['city']:'', 
                "principal_name"=>isset($schoolData['principal_name'])?$schoolData['principal_name']:'',
                "pri_mobile"=>isset($schoolData['pri_mobile'])?$schoolData['pri_mobile']:'',
                "email"=>isset($schoolData['email'])?$schoolData['email']:'',
                "whats_num"=>isset($schoolData['whats_num'])?$schoolData['whats_num']:'',
                "super_name"=>isset($schoolData['super_name'])?$schoolData['super_name']:'',
                "super_design"=>isset($schoolData['super_design'])?$schoolData['super_design']:'',
                "super_mobile"=>isset($schoolData['super_mobile'])?$schoolData['super_mobile']:'',
                "super_email"=>isset($schoolData['super_email'])?$schoolData['super_email']:'', 
                "super_whatspp"=>isset($schoolData['super_whatspp'])?$schoolData['super_whatspp']:'',
                "total_class_number"=>isset($schoolData['total_class_number'])?$schoolData['total_class_number']:'',
                "class_sitting_capacity"=>isset($schoolData['class_sitting_capacity'])?$schoolData['class_sitting_capacity']:'',
                "max_num_student"=>isset($schoolData['max_num_student'])?$schoolData['max_num_student']:'', 
                "furniture_avail"=>isset($schoolData['furniture_avail'])?$schoolData['furniture_avail']:'', 
                "elec_avail"=>isset($schoolData['elec_avail'])?$schoolData['elec_avail']:'', 
                "gen_avai"=>isset($schoolData['gen_avai'])?$schoolData['gen_avai']:'', 
                "wash_rrom"=>isset($schoolData['wash_rrom'])?$schoolData['wash_rrom']:'', 
                "clock_room"=>isset($schoolData['clock_room'])?$schoolData['clock_room']:'', 
                "vehicle_avail"=>isset($schoolData['vehicle_avail'])?$schoolData['vehicle_avail']:'', 
                "staff_suffi"=>isset($schoolData['staff_suffi'])?$schoolData['staff_suffi']:'', 
                "ukpsc_exxma"=>isset($schoolData['ukpsc_exxma'])?$schoolData['ukpsc_exxma']:'', 
                "debar"=>isset($schoolData['debar'])?$schoolData['debar']:'', 
                "bras_Seal"=>isset($schoolData['bras_Seal'])?$schoolData['bras_Seal']:'', 
                "remark_if"=>isset($schoolData['remark_if'])?$schoolData['remark_if']:'', 
                "suggetions"=>isset($schoolData['suggetions'])?$schoolData['suggetions']:'', 
                "exam_center_hindi"=>isset($schoolData['exam_center_hindi'])?$schoolData['exam_center_hindi']:'', 
                "max_allocate_candidate"=>isset($schoolData['max_allocate_candidate'])?$schoolData['max_allocate_candidate']:'', 
                "exam_center_eng"=>isset($schoolData['exam_center_eng'])?$schoolData['exam_center_eng']:'', 
                "acc_holder_name"=>isset($schoolData['acc_holder_name'])?$schoolData['acc_holder_name']:'', 
                "ban_name"=>isset($schoolData['ban_name'])?$schoolData['ban_name']:'', 
                "branch_name"=>isset($schoolData['branch_name'])?$schoolData['branch_name']:'', 
                "ifsc"=>isset($schoolData['ifsc'])?$schoolData['ifsc']:'', 
                "acc_num"=>isset($schoolData['acc_num'])?$schoolData['acc_num']:'', 
                "acc_numacc_num_con"=>isset($schoolData['acc_numacc_num_con'])?$schoolData['acc_numacc_num_con']:'', 
                "acc_num_con"=>isset($schoolData['acc_num_con'])?$schoolData['acc_num_con']:'', 
                "date"=>isset($schoolData['date'])?$schoolData['date']:'', 
                "place"=>isset($schoolData['place'])?$schoolData['place']:'', 
                "status_admin"=>isset($schoolData['status_admin'])?$schoolData['status_admin']:'', 
                "ranking_admin"=>isset($schoolData['ranking_admin'])?$schoolData['ranking_admin']:'', 
                "admin_date"=>isset($schoolData['admin_date'])?$schoolData['admin_date']:'', 
                "remard_admin"=>isset($schoolData['remard_admin'])?$schoolData['remard_admin']:'', 
                "admin_role_ranking"=>isset($schoolData['admin_role_ranking'])?$schoolData['admin_role_ranking']:'', 
                "fileName1"=>isset($schoolData['fileName1'])?$schoolData['fileName1']:'', 
                "fileName2"=>isset($schoolData['fileName2'])?$schoolData['fileName2']:'', 
                "fileName3"=>isset($schoolData['fileName3'])?$schoolData['fileName3']:'', 
                "fileName4"=>isset($schoolData['fileName4'])?$schoolData['fileName4']:'', 
                "fileName5"=>isset($schoolData['fileName5'])?$schoolData['fileName5']:'', 
                "fileName6"=>isset($schoolData['fileName6'])?$schoolData['fileName6']:'', 
                "created_at"=>isset($schoolData['created_at'])?$schoolData['created_at']:'', 
                "created_by"=>isset($schoolData['created_by'])?$schoolData['created_by']:'', 
                "updated_at"=>isset($schoolData['updated_at'])?$schoolData['updated_at']:'', 
                "update_by"=>isset($schoolData['update_by'])?$schoolData['update_by']:'', 
                "last_ip"=>isset($schoolData['last_ip'])?$schoolData['last_ip']:'', 
                "file_movement"=>isset($schoolData['file_movement'])?$schoolData['file_movement']:'',  
                "no_room"=>isset($schoolData['no_room'])?$schoolData['no_room']:'', 
                "no_sheet"=>isset($schoolData['no_sheet'])?$schoolData['no_sheet']:'', 
                "consent_grading"=>isset($schoolData['consent_grading'])?$schoolData['consent_grading']:'', 
                "consent_status"=>isset($schoolData['consent_status'])?$schoolData['consent_status']:'', 
                "state"=>isset($schoolData['state'])?$schoolData['state']:'', 
                "examincation_id"=>isset($schoolData['examincation_id'])?$schoolData['examincation_id']:'', 
                "exmin_ceter_option"=>isset($schoolData['exmin_ceter_option'])?$schoolData['exmin_ceter_option']:'', 
                "consents_signstamp_file"=>isset($schoolData['consents_signstamp_file'])?$schoolData['consents_signstamp_file']:'', 
                "consents_signstamp_status"=>isset($schoolData['consents_signstamp_status'])?$schoolData['consents_signstamp_status']:'', 
            ];
    
            $this->db->insert('ci_exam_according_to_school', $newDataForconsent);
        }


            $this->db->where(['id' => $id])->update('ci_exam_registration', $arr);

            $this->db->where(['id' => $new_id])->update('ci_exam_invitation', $arrForInvitation);
       
            
            $data['user_data'] = $this->Exam_model->get_all_invites_idsupdate($id); 

                   // Message for Mobile 
            $examName = get_exam_name($data['exam'][0]['exam_name']);
             $messageP1='Dear Sir/Madam ,';
            $messageP1.= 'Consent for the '.$examName.' has been sent for your kind approval. Kindly login into your account on consent portal to complete the consent sending process.';
            $messageP1.='Regards';
            $messageP1.='UKPSC, Haridwar';
            $email = $data['user_data'][0]['email'];
            $phone = $data['user_data'][0]['pri_mobile'];
            $template_id = "1007076974594881905";
            sendSMS($phone,$messageP1,$template_id);
            $mail_data = array(
                'examname' => $examName
              
            );
           
            $this->load->helper('email_helper');
            $this->mailer->mail_template($email,'send-consent-1',$mail_data);

        }
        

        
        

    }
    public function send_invitation_user_all_OneTime() {

        // $ids = $this->input->get('data');
        $ids = [];

        $state_name = '';
        $city_name = '';
        $grade_name = '';
        $send_consent_id = $this->input->get('send_consent_id');
        $exam_id = urldecrypt($send_consent_id); 

        $schoolRecords = $this->Exam_model->get_all_registration_data($state_name, $city_name, $grade_name);

        
        foreach ($schoolRecords as $row) {
            if($row['school_name'] != ''){
                
                $invitationStatus = $this->checkExamInvitationStatus($exam_id,$row['id']);
            
                $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
                $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
                
                if($invt_recieved==0 && $invite_sent==0)
                {
                    array_push($ids,(int)$row['id']);
                }
            }
        }

    
        echo json_encode($ids);
        exit();

        $data['exam'] = $this->Exam_model->get_invites_byid($exam_id);
        print_r($data['exam']);
        print_r(count($ids));
        die();
        
    }

    public function send_invitation_user_not_recieve_all_OneTime() {

        // $ids = $this->input->get('data');
        $ids = [];

        $state_name = '';
        $city_name = '';
        $grade_name = '';
        $send_consent_id = $this->input->get('send_consent_id');
        $exam_id = urldecrypt($send_consent_id); 

        $schoolRecords = $this->Exam_model->get_all_registration_data($state_name, $city_name, $grade_name);

        
        foreach ($schoolRecords as $row) {
            if($row['school_name'] != ''){
                
                $invitationStatus = $this->checkExamInvitationStatus($exam_id,$row['id']);
            
                $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
                $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
                
                if($invt_recieved==0 && $invite_sent==1)
                {
                    array_push($ids,(int)$row['id']);
                }
            }
        }

    
        echo json_encode($ids);
        exit();

        $data['exam'] = $this->Exam_model->get_invites_byid($exam_id);
        print_r($data['exam']);
        print_r(count($ids));
        die();
        
    }

    public function revokeConsentsInvitations()
    {
        $id = $this->input->get('id');
        $send_consent_id = $this->input->get('send_consent_id');
        $new_id = urldecrypt($send_consent_id); 
        $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
        $arr = [
            'exam_name' => $data['exam'][0]['subjectline'],
            'ref_id' => $new_id,
            'invite_sent' => '0',
            'invt_recieved' => '1'
        ];
     
        $arrForInvitation = [
            'invite_sent' => '0',
            'invt_recieved' => '0'
        ];
        $this->db->from('ci_registration_invitation');
        $this->db->where('ci_registration_invitation.school_id', $id);
        $this->db->where('ci_registration_invitation.ref_id', $new_id);
        $this->db->delete('ci_registration_invitation');
   
        $this->db->where(['id' => $id])->update('ci_exam_registration', $arr);

        $this->db->where(['id' => $new_id])->update('ci_exam_invitation', $arrForInvitation);

    //    $newDataForconsent = [
    //         'ref_id' => $new_id,
    //         'exam_name' => $data['exam'][0]['subjectline'],
    //         'invite_sent' => '0',
    //         'invt_recieved' => '0',
    //         'superuserStatus' => '0',
    //     ];

        $this->db->from('ci_exam_according_to_school');
        $this->db->where('ci_exam_according_to_school.school_id', $id);
        $this->db->where('ci_exam_according_to_school.ref_id', $new_id);
        $this->db->delete('ci_exam_according_to_school');

        // $this->db->where(['school_id' => $id])->update('ci_exam_according_to_school', $newDataForconsent);
        // echo 'ok';
    }
    public function send_invitation_user_all_not_recieved_consent() {


        $ids = $this->input->get('data');
        $send_consent_id = $this->input->get('send_consent_id');
        $new_id = urldecrypt($send_consent_id); 
        $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
        if(!empty($ids)){
            foreach ($ids as $id) {

                 $email = getEmail($id);
                 $phone = getMobile($id);
                 $messageP1='Dear Sir/Madam ,';
                 $messageP1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.';
                 $messageP1.='Kindly ignore if already done.';
                 $messageP1.='Regards,';
                 $messageP1.='UKPSC, Haridwar';
           
              
                 $template_id = "1007970272335112709";
                 // EMAIL AND MESSAGE SEND UDING TEMPLETE
                 sendSMS($phone,$messageP1,$template_id);
                 $this->load->helper('email_helper');
                 $this->mailer->mail_template($email,'consent-not-send');
 
               
            }
        
        }else{
            
            $id = $this->input->get('id');
            $data['user_data'] = $this->Exam_model->get_all_invites_idsupdate($id); 
            $messageP1='Dear Sir/Madam ,';
            $messageP1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.';
            $messageP1.='Kindly ignore if already done.';
            $messageP1.='Regards,';
            $messageP1.='UKPSC, Haridwar';
            
            $email = $data['user_data'][0]['email'];
            $phone = $data['user_data'][0]['pri_mobile'];
         
            $template_id = "1007970272335112709";
            // EMAIL AND MESSAGE SEND UDING TEMPLETE
            sendSMS($phone,$messageP1,$template_id);
            $this->load->helper('email_helper');
            $this->mailer->mail_template($email,'consent-not-send');

        }



    }
    public function send_invitation_user_all_not_recieved_consent_copy() {

        $ids = $this->input->get('data');
       
        $send_consent_id = $this->input->get('send_consent_id');
        
        $new_id = urldecrypt($send_consent_id); 
       
        $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
        
        if(!empty($ids)){
            $i = 0;
            foreach ($ids as $id) {

                $data[$i] = $this->Exam_model->get_all_invites_ids($id);  

                foreach($data[$i] as $email => $value){
                    $emails[$i] = $value['email'];
                    $emails[$i] = $value['principal_name'];
                }

                $i++;
            }
        
            $i = 0;
            foreach ($ids as $id) {

                $data['user_data'][$i] = $this->Exam_model->get_all_invites_idsupdate($id); 
                $i++;
            }


        
            foreach($data['user_data'] as $value){
                foreach($value as $singledata){
                  
                    $examName = get_exam_name($data['exam'][0]['exam_name']);
                    $messageP1='Dear Sir/Madam ,';
                    $messageP1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.';
                    $messageP1.='Kindly ignore if already done.';
                    $messageP1.='Regards,';
                    $messageP1.='UKPSC, Haridwar';
                    // Message For Email Address 
                    // $messageE1='Dear Sir/Madam ,<br>';
                    // $messageE1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.<br>';
                    // $messageE1.='Kindly ignore if already done.<br>';
                    // $messageE1.='Regards,<br>';
                    // $messageE1.='UKPSC, Haridwar';
                    
                    $email = $singledata['email'];
                    $phone = $singledata['pri_mobile'];
                    $template_id = "1007970272335112709";
                    // EMAIL AND MESSAGE SEND UDING TEMPLETE
                    sendSMS($phone,$messageP1,$template_id);
                    // sendEmail($email,$messageE1,$template_id);
                    $this->load->helper('email_helper');
                    $this->mailer->mail_template($email,'consent-not-send');

                }
            }
        
        
        }else{
            
            $id = $this->input->get('id');
            $data['user_data'] = $this->Exam_model->get_all_invites_idsupdate($id); 
            $examName = get_exam_name($data['exam'][0]['exam_name']);
          
            $messageP1='Dear Sir/Madam ,';
            $messageP1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.';
            $messageP1.='Kindly ignore if already done.';
            $messageP1.='Regards,';
            $messageP1.='UKPSC, Haridwar';
            // Message For Email Address 
            // $messageE1='Dear Sir/Madam ,<br>';
            // $messageE1.='Your consent approval is still pending at your end. Kindly complete it by login into your account.<br>';
            // $messageE1.='Kindly ignore if already done.<br>';
            // $messageE1.='Regards,<br>';
            // $messageE1.='UKPSC, Haridwar';
            
            $email = $data['user_data'][0]['email'];
            $phone = $data['user_data'][0]['pri_mobile'];
         
            $template_id = "1007970272335112709";
            // EMAIL AND MESSAGE SEND UDING TEMPLETE
            sendSMS($phone,$messageP1,$template_id);
            $this->load->helper('email_helper');
            $this->mailer->mail_template($email,'consent-not-send');
            // sendEmail($email,$messageE1,$template_id);
        }
    
        

    }

    public function send_invitation_user($id) {
       
        $user = $this->db->select('admin_id')->from('ci_exam_registration')->where('id', $id)->get()->row('admin_id');
        // print_r($user); die();
        $data_id = array(
            'last_id' => $user,
            'invite_sent' => '1'
        );

        $result = $this->db->update('ci_exam_invitation', $data_id);

        $up_arr = array('invite_sent' => "1");

        $result = $this->db->where(['id' => $id])->update('ci_exam_registration', $up_arr);

        $this->session->set_flashdata('success', ' Sent Invitation successfully!');
        redirect(base_url('admin/examshedule_schedule/send_invitation'), 'refresh');
    }

    public function update_check_box() {
        print_r('hi');
    }

    public function invitation_reply($id) {

        $admin_id=$this->session->userdata('admin_id');
        if ($this->input->post()) {
            $ref_id = urldecrypt($id);
        
            $examselect = !empty($this->input->post('examselect')) ? $this->input->post('examselect') : "";
           
            $sub_name = !empty($this->input->post('sub_name')) ? $this->input->post('sub_name') : "";
            $date_exam = !empty($this->input->post('date_exam')) ? $this->input->post('date_exam') : "";
            $shft_exam = !empty($this->input->post('shft_exam')) ? $this->input->post('shft_exam') : "";
            $time_exam = !empty( $this->input->post('time_exam')) ? $this->input->post('time_exam') : "";
            
            $cand_no = !empty($this->input->post('cand_no')) ? $this->input->post('cand_no') : "";

            $inserted_id = array();
           
            foreach ($examselect as $key => $value) {   
                               
                $data = array(
                    'ref_id'        =>  $ref_id,
                    'examselect'    =>  $value,
                    'sub_name_re'   =>  !empty($sub_name) ? $sub_name[$value] : '',
                    'date_exam_re'     =>  !empty($date_exam) ? $date_exam[$value] : '',
                    'shft_exam'     =>  !empty($shft_exam) ? $shft_exam[$value] : '',
                    'time_exam'     =>  !empty($time_exam) ? $time_exam[$value] : '',
                    'cand_no'       =>  !empty($cand_no) ? $cand_no[$value] : '',
                    'created_by'    =>  $this->session->userdata('admin_id'),
                    'created_at'    =>  date('d-m-Y : h:m:s'),
                    'created_by'    =>  $this->session->userdata('admin_id'),
                );
                  $dataUpdate = array(
                'invt_recieved' => '1'
            );
            $dataUpdate2 = array(
                'invt_recieved' => '1',
                'ref_id' =>$ref_id
            );
        

            

            $this->db->where('admin_id', $admin_id);
            $this->db->update('ci_exam_registration', $dataUpdate2);
            // echo $this->db->last_query(); die();
            $this->db->update('ci_exam_invitation', $dataUpdate);
            $inserted_id[$value] = $this->Exam_model->insertData('ci_invite_return', $data);
              
            }
     
            $this->session->set_flashdata('success', ' Sent successfully!');

            redirect(base_url('admin/consent_active/consent_active_list'), 'refresh');
        } else {

           
            $data['id'] = ($id);

            $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id));
         
            $data['states'] = $this->location_model->get_states();
            // echo 'here';
            // echo '<prev>';
            // print_r($data);
            // exit;

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/invitation_reply', $data);
            $this->load->view('admin/includes/_footer');
        }
    }



    public function invitation_sent_list() {

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

       $this->load->view('admin/exam/invt_sent_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_sent_list_data() {

        $state_name = $city_name = $grade_name = "";
        $records['data'] = $this->Exam_model->get_all_recived_invites($state_name,$city_name,$grade_name);
        
        $data = [];

        $i = 0;

        foreach ($records['data'] as $row) {
            // if($row['school_name'] != ''){

                $array_value_sum = $row['no_candidate'];
                  $array = explode(',', $array_value_sum);
                  $total_sum = array_sum($array);
                  $row['total_sum'] =  $total_sum;
                  $row['startdate'] =  date("d-m-Y", strtotime($row['startdate']));
                  $row['enddate'] =  date("d-m-Y", strtotime($row['enddate']));
                $data[] = [
                    ++$i,

                    $row['subjectline'] ? get_exam_name($row['exam_name']): '',
                    $row['total_sum'] ? get_exam_name_details($row['exam_name'])['no_of_cand'] : '',
                    $row['startdate']? date("d-m-Y", strtotime(get_exam_name_details($row['exam_name'])['start_date_exam'])) : '',
                    $row['enddate']? date("d-m-Y", strtotime(get_exam_name_details($row['exam_name'])['end_date_exam'])) : '',
                    '<a href="' . base_url('admin/examshedule_schedule/consent_recieved_by_user_list/' . urlencrypt($row['id'])).'" title="Consent Recieved" class="btn btn-success consent_recieved"><i class="fa fa-eye"></i></a>
                     <a href="' . base_url('admin/examshedule_schedule/consent_not_recieved_by_user_list/' . urlencrypt($row['id'])) .'" title="Consent Not Recieved" class="btn btn-danger consent_not_recieved"><i class="fa fa-eye"></i></a>',
                ];
            // }
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_recieved_by_user_list() {
        $id = urldecrypt($this->uri->segment(4));

        $data['states'] = $this->location_model->get_states();
         
        $data['title'] = 'Recieved Consent';
        $data['id'] = $id;
    
        $this->load->view('admin/includes/_header', $data);
       
        $this->load->view('admin/exam/invt_recived_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function consent_recieved_by_user_data() {

        $data['info'] = $this->Exam_model->get_consent_recved_data();
  
        $this->load->view('admin/exam/consnt_recievd_list', $data);
    }
    
    public function consent_recieved_list($id) {
        // echo $id;

        $state_name = $city_name = $grade_name = '';
        $records['data'][1] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$id);
   ;

        $data = [];
        
        $i = 0;

        foreach ($records['data'][1][1] as $row) {
          
            if($row['school_name'] != ''){
                
                // if($row['invt_recieved']==0 && $row['invite_sent']==1)
                if($row["superuserStatus"]==1)
                {
                    $action =   'Recieved';
                }
                elseif ($row["superuserStatus"]==0) {
                    $action =   'Pending at government officer for approval';
                }
                else{
                    $action =   '<input type="checkbox" id="a" class="send_email_ids" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Send Invitations" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
               

                }
                // echo $row["consents_signstamp_file"] . "00000". $row["superuserStatus"];
                // if(isset($row["superuserStatus"]) && $row["superuserStatus"]==1)
                // {
                    if($row["superuserStatus"]==1){
                         $path = base_url("uploads/consent_form/".$row["consents_signstamp_file"]);
                    $downloadConsent = '<a href='.$path.' target="_blank" class="btn btn-primary">Download Consent</a>'; 
                    }
                    else{
                        $downloadConsent = '<button class="btn btn-default" disabled>Consent Not available</button>';
                    }
                  
                // }
                // else{

                //     $path ='<button class="btn btn-default" disabled>Consent Not available</button>';
                // }
               

                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = '<input style="height: 1px;width: 1px;" hidden type="checkbox" id="a" id="sum_value" name="sum_value" class="checkbox-item sum" rel="'.$row['max_allocate_candidate'].'"> '.$row['max_allocate_candidate'].'';

                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action,
                    $downloadConsent

            
                ];
            }
        }

        // $records1['data'] = $data;        
        $records1['data'] = $data; 
        // print_r($records1['data']) ;

        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_recieved_search(){
        $ref_id = isset($_GET['exam_new_id'])?$_GET['exam_new_id']:0;
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){

            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$ref_id);
            // echo '<pre>'; print_r($records); die();
            
        }else if(isset($_GET['district_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$ref_id);
            
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$ref_id);
            
        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$ref_id);
        }

        $array = array('created_by' => $this->session->userdata('admin_id'));
        $data['count'] = $data['data'][0];
        $data['main_data'] = $data['data'][1];  
        // print_r($data);
        // die();
        $this->load->view('admin/exam/consent_recieved_search', $data);
    }




    public function consent_not_recieved_by_user_list() {
        $id = urldecrypt($this->uri->segment(4));
       
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Recieved Not Consent';
        $data['id'] = $id;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/exam/invt_not_recived_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }


    public function inv_list_search_for_mail() {
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){

            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            
        }else if(isset($_GET['district_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            
        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
        }    
        $array = array('created_by' => $this->session->userdata('admin_id'));
        $data = [];
        $i = 0;
        foreach ($records['data'] as $row) {
            if($row['school_name'] != ''){
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['pri_mobile']? $row['pri_mobile'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidatekkk'] : '',
                    $row['id']? $row['id'] : '',
                    '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['ref_id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
                    <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                    base_url('admin/master/exam_del/' . urlencrypt($row['ref_id'])) .
                    '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
                ];
            }
        }

        $data['data'] = $records1['data'] = $data;        
        $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_notrecieved_search() {
        $ref_id = isset($_GET['exam_new_id'])?$_GET['exam_new_id'] :0;
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){
            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$ref_id);
        }else if(isset($_GET['district_id'])){
            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$ref_id);
        }else if(isset($_GET['grade_id'])){
            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$ref_id);  
        }else{
            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$ref_id);
        }    
        $data['count'] = $data['data'][0];
        $data['main_data'] = $data['data'][1];
        $data['exam_id'] = $ref_id;
        $this->load->view('admin/exam/consent_not_recieved', $data);
    }

    public function consent_notrecieved_by_user_data($id) {
       
        $data['states'] = $this->location_model->get_states();
        $state_name = $city_name = $grade_name = '';
        $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$id);
         
        $data = [];
        $exam_id = $id;
        $i = 0;
        foreach ($records['data'][1] as $row) {
            $invitationStatus = $this->checkExamInvitationStatus($exam_id,$row['id']);
            $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
            $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
           
            if($invt_recieved==0 && $invite_sent==1)
            {
            if($row['school_name'] != ''){
                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = $row['max_allocate_candidate'];
                $action =   '<input type="checkbox" id="a" class="send_email_ids" onClick="getCount('.$row['id'].')" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                 <a title="Re-Send Invitation" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
                $data[] = [
                    ++$i,
                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action,
                ];
            }


        }
    }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }
    public function consent_notrecieved_by_user_data_copy($id) {
       

        $array = array('created_by' => $this->session->userdata('admin_id'));
        $state_name = '';
        $city_name = '';
        $grade_name = '';
        $records['data'] = $this->Exam_model->get_all_registration_data($state_name, $city_name, $grade_name);
        $data = [];
        $i = 0;

        foreach ($records['data'] as $row) {
            if($row['school_name'] != ''){
                
                $invitationStatus = $this->checkExamInvitationStatus($exam_id,$row['id']);
                $doneImage =  base_url("assets/img/check.png");
                $pendingImage =  base_url("assets/img/pending.png");
                
            
                $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
                $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
                
                if($invt_recieved==0 && $invite_sent==1)
                {
                    $action =   'Status: <img src="'.$pendingImage.'" height="34" alt="">';
                }
                elseif ($invt_recieved==1 && $invite_sent==1) {
                    $action =   'Status: <img src="'.$doneImage.'" alt=""> <br>
                    <a title="Send Invitations" class="btn btn-warning mt-2" onClick="revokeConsentsInvitations('.$row['id'].')"> Revoke Consent </a>';
                }
                else{
                    $action =   '<input type="checkbox" id="a" class="send_email_ids" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Revoke Consent" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
               
                }
                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = $row['max_allocate_candidate'];
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action,
                ];
            }
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }




    public function view_recieved_consent($id) {
       
        $data['info'] = $this->Exam_model->get_return_data(urldecrypt($id));
        // print_r($data['info']); die();
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/invitation_recieved_user', $data);
        $this->load->view('admin/includes/_footer');
    }

      public function create_letter() {


        // $this->rbac->check_operation_access();
        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/create_letter_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function create_letter_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();
        
        $this->load->view('admin/exam/create_letter_list', $data);
    }
     public function create_invt_add() {
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
                'create_letter_status' => 1,
            );
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Add successfully!(सफलतापूर्वक जोड़ें!)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        } else {


            $id = $this->uri->segment(4);
            $new_id = urldecrypt($id);
            
            // $data['subject'] = $this->Master_model->get_subject();
            // $data['exam'] = $this->Master_model->get_exam();
            // C:\xampp\htdocs\UKPSC\uk\application\models\admin\Exam_model.php
            $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
            // echo '<pre>';print_r($data); die();
            
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/create_letter_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }


 public function send_consent() {


        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/send_letter_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function send_consent_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();
        // echo '<pre>';print_r($data);die;

        $this->load->view('admin/exam/send_letter_list', $data);
    }

    public function getSubjectNameNew() {

        if(isset($_GET['exam_id']))
        {
            $id = $_GET['exam_id'];
            $subjectList = $this->Exam_model->get_subject_new_by_id($id);
            if (count($subjectList)==0) {
                $options = '<option value="">' .' Add Subjects First'. '</option>';
            }
            else{
                $options = '<option value="">' .'Select Subject'. '</option>';
                foreach ($subjectList as $r) {
                    $options .= '<option value="' . $r['id'] . '">' . $r['sub_name'].'('.$r['sub_name_hindi'].')' . '</option>';
                }
    
            }
            
        
            echo $options;
        }
    }
    public function totalCountNumber(){
        if(isset($_GET['exam_id']))
        {
            $id = $_GET['exam_id'];
            $totalCount = $this->Exam_model->totalCountNumberInExam($id);
            echo $totalCount;
        }
    }

    public function checkExamInvitationStatus($exam_id,$school_rgister_id)
    {

        $this->db->from('ci_registration_invitation');
        $this->db->where('ci_registration_invitation.ref_id',$exam_id);
        $this->db->where('ci_registration_invitation.school_id',$school_rgister_id);
        // $data = $this->db->result_array();
        $query = $this->db->get();
        // row_array
        // $count = $query->num_rows();
        return $query->row_array();
    //     die;
    }





}
