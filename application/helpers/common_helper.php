<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// -----------------------------------------------------------------------------
// Get Language by ID
function get_consentStatus($id)
{
    $ci = &get_instance();
    $ci->db->where('ref_id', $id);
    return $ci->db->get('ci_exam_according_to_school')->row_array()['superuserStatus'];
}
function get_DisApproveRemark($id)
{
    $ci = &get_instance();
    $ci->db->where('ref_id', $id);
    return $ci->db->get('ci_exam_according_to_school')->row_array()['remark_by_govt'];
}
// Get Language by ID
function get_lang_name_by_id($id)
{
    $ci = &get_instance();
    $ci->db->where('id', $id);
    return $ci->db->get('ci_language')->row_array()['name'];
}
// -----------------------------------------------------------------------------
// Get Language Short Code
function get_lang_short_code($id)
{
    $ci = &get_instance();
    $ci->db->where('id', $id);

    return $ci->db->get('ci_language')->row_array()['short_name'];
}

// -----------------------------------------------------------------------------
// Get Language List
function get_language_list()
{
    $ci = &get_instance();
    $ci->db->where('status', 1);
    return $ci->db->get('ci_language')->result_array();
}

// -----------------------------------------------------------------------------
// Get country list
function get_country_list()
{
    $ci = &get_instance();
    return $ci->db->get('ci_countries')->result_array();
}

// -----------------------------------------------------------------------------
// Get country name by ID
function get_country_name($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_countries', array('id' => $id))->row_array()['name'];
}

function get_subject_name($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_subject', array('id' => $id))->row_array()['sub_name'];
}

function get_system_med_name($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_medicine_system', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get City ID by Name
function get_country_id($title)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_countries', array('slug' => $title))->row_array()['id'];
}

// -----------------------------------------------------------------------------
// Get country slug
function get_country_slug($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_countries', array('id' => $id))->row_array()['slug'];
}

// -----------------------------------------------------------------------------
// Get country's states
function get_country_states($country_id)
{
    $ci = &get_instance();
    return $ci->db->select('*')->where('country_id', $country_id)->get('ci_states')->result_array();
}

// -----------------------------------------------------------------------------
// Get state's cities
function get_state_cities($state_id)
{
    $ci = &get_instance();
    return $ci->db->select('*')->where('state_id', $state_id)->get('ci_cities')->result_array();
}

// Get state name by ID
function get_state_name($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_states', array('id' => $id))->row_array()['name'];
}
function get_district_name($id)
{

    $ci = &get_instance();
    return @$ci->db->get_where('ci_cities', array('id' => $id))->row_array()['name'];
}
function get_exam_name($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_master', array('id' => $id))->row_array()['exam_name'];
}
function get_exam_nameID($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_master', array('id' => $id))->row_array()['id'];
}

function get_exam_namewithStatusOne($id)
{
    $ci = &get_instance();
    // ->where('invite_sent',1)->where('invt_recieved',1)
    // or_where('invite_sent',1)->or_where('invite_sent',1)
    return $ci->db->select('*')->where('exam_name', $id)->get('ci_exam_invitation')->row_array()['id'];
    // return @$ci->db->where('ci_exam_master', array('id' => $id))->row_array()['exam_name'];
}
function get_exam_name_details($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_master', array('id' => $id))->row_array();
}

function get_exam_controller_id($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_master', array('id' => $id))->row_array()['created_by'];
}
function get_exam_controller_details($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_admin', array('admin_id' => $id))->row_array();
}

function get_exam_name_new($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array()['subjectline'];
}

function getExamIdFromCandidateTable($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where(' ci_candidate_app', array('id' => $id))->row_array()['exam_name'];
}
function get_exam_name_downloadreport($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array()['exam_name'];
}
function get_startdate_new($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array()['startdate'];
}
function get_enddate_new($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array()['enddate'];
}
function get_exam_name_new_id($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array()['exam_name'];
}
function getNewInvitationId($id)
{
    $ci = &get_instance();
    return @$ci->db->get_where('ci_exam_invitation', array('exam_name' => $id))->row_array()['id'];
}

function get_auth_name($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_admin_roles', array('admin_role_id' => $id))->row_array()['admin_role_title'];
}

function rnobyemailid($emailId)
{
    $ci = &get_instance();
    return isset($ci->db->get_where('ci_admin', array('email' => $emailId))->row_array()['school_registration_number']) ? $ci->db->get_where('ci_admin', array('email' => $emailId))->row_array()['school_registration_number'] : '';
}
// -----------------------------------------------------------------------------
// Get city name by ID
function get_city_name($id)
{

    $ci = &get_instance();

    if ($id != null or $id != '') {

        return $ci->db->get_where('ci_towns', array('id' => $id))->row_array()['city'];
    } else {
        return false;
    }
}
// new function to get sub city
function get_subcity_name($id)
{
    $ci = &get_instance();
    if ($id != null or $id != '') {
        // return $ci->db->get_where('ci_sub_cities', array('id' => $id))->row_array()['subcityname'];

        $ci = &get_instance();
        $q = $ci->db->select('subcityname')->where('id', $id)
            ->get('ci_sub_cities')->row_array();
        $city = isset($q['subcityname']) ? $q['subcityname'] : '';

        return $city;
    } else {
        return false;
    }
}
// geting role id 
function get_admin_role($id)
{
    $ci = &get_instance();
    if ($id != null or $id != '') {
        return $ci->db->get_where('ci_admin_roles', array('admin_role_id' => $id))->row_array()['admin_role_title'];
    } else {
        return false;
    }
}


function get_establishment_name($id)
{
    $ci = &get_instance();
    if ($id != null or $id != '') {
        return @$ci->db->get_where('ci_establishment_type', array('id' => $id))->row_array()['name'];
    } else {
        return false;
    }
}

// -----------------------------------------------------------------------------
// Get city ID by title
function get_city_slug($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_cities', array('id' => $id))->row_array()['slug'];
}

/**
 * Generic function which returns the translation of input label in currently loaded language of user
 * @param $string
 * @return mixed
 */
function trans($string)
{
    $ci = &get_instance();
    return $ci->lang->line($string);
}

// -----------------------------------------------------------------------------
// update last login details
function update_last_login($data, $username)
{
    $ci = &get_instance();

    $ci->db->where('username', $username);
    $ci->db->update('ci_admin', $data);
}




// get data  
function getDataHelper($condition = '', $table_name = '')
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from($table_name);
    $ci->db->where($condition);
    $icd = $ci->db->get()->result();
    return $icd;
}


function establishment_type_tree(
    $parent_id = 0,
    $sub_mark = '',
    $selected_id = 0
) {
    $ci = &get_instance();
    $condition = "parent_id =" . "'" . $parent_id . "'";
    $ci->db->select('*');
    $ci->db->from('ci_establishment_type');
    $ci->db->where($condition);
    $icd = $ci->db->get();
    $options = '';
    foreach ($icd->result() as $r) {
        if ($selected_id == $r->id)
            $is_selected = 'selected';
        else
            $is_selected = '';

        echo $options = '<option value="' . $r->id . '" ' . $is_selected . '>' . $sub_mark . $r->name . '</option>';
        establishment_type_tree(
            $r->id,
            $sub_mark . '   ---&nbsp;&nbsp;&nbsp;',
            $selected_id
        );
    }
}

function service_type_tree($parent_id = 0, $sub_mark = '', $selected_id = 0)
{
    $ci = &get_instance();
    $condition = "parent_id =" . "'" . $parent_id . "'";
    $ci->db->select('*');
    $ci->db->from('ci_service_type');
    $ci->db->where($condition);
    $icd = $ci->db->get();
    $options = '';
    foreach ($icd->result() as $r) {
        if ($selected_id == $r->id)
            $is_selected = 'selected';
        else
            $is_selected = '';

        echo $options = '<option value="' . $r->id . '" ' . $is_selected . '>' . $sub_mark . $r->name . '</option>';
        service_type_tree(
            $r->id,
            $sub_mark . '   ---&nbsp;&nbsp;&nbsp;',
            $selected_id
        );
    }
}

function get_ownership_level1()
{
    $ci = &get_instance();
    return $ci->db->get_where(' ci_ownership_type', array('parent_id' => 0))->result_array();
}

function get_clinical_establishment1($p_id)
{
    $ci = &get_instance();
    $q = $ci->db->get_where(
        ' ci_establishment_type',
        array('parent_id' => $p_id)
    )->result_array();

    $ci->db->select('t1.id, t1.name, t1.bedapplicable, (select count(*) from ci_establishment_type t2 WHERE t2.`parent_id`=t1.id) as child_count');
    $q = $ci->db->get_where(
        ' ci_establishment_type t1',
        array('t1.parent_id' => $p_id)
    )->result_array();

    return $q;
}

function get_medical_degree_tree($p_id)
{
    $ci = &get_instance();
    return $q = $ci->db->get_where(
        'ci_medical_degree',
        array('parent_id' => $p_id)
    )->result_array();
}

function get_medical_degree_by_id($id)
{
    $ci = &get_instance();
    return $ci->db->get_where('ci_medical_degree', array('id' => $id))->row_array()['name'];
}

function get_clinical_establishment_child(
    $parent_id,
    $nole_address,
    $clinical_establishment = array()
) {
    $ci = &get_instance();
    $condition = "parent_id =" . "'" . $parent_id . "'";
    $ci->db->select('t1.id, t1.name, t1.bedapplicable,  (select count(*) from ci_establishment_type t2 WHERE t2.`parent_id`=t1.id) as child_count');
    $ci->db->from('ci_establishment_type t1');
    $ci->db->where($condition);
    $icd = $ci->db->get();
    $childCount = $icd->num_rows();
    if ($icd->num_rows() > 0) {
        $i = 1;
        $new_nole_address = '';
        foreach ($icd->result() as $r) {
            if (in_array($r->id, $clinical_establishment))
                $is_checked = 'checked';
            else
                $is_checked = '';
            if ($i == 1) {
                echo '<ul>';
            }
            $new_nole_address = $nole_address . "_" . $r->id;
            echo '<li>';
            if ($r->child_count <= 0)
                echo '<input type="checkbox" class="selectedEstablishment" id="checked_' . $r->id . '" name="clinical_establishment[]" data-nole_address="' . $new_nole_address . '"' . $is_checked . ' value="' . $r->id . '"/>';
            echo $r->name;
            if ($r->bedapplicable == 'yes') {
                echo '<input type= "text" id="txtfee_' . $r->id . '" maxlength="4" style="    max-width: 30px!important;" > ';
            }

            get_clinical_establishment_child(
                $r->id,
                $new_nole_address,
                $clinical_establishment
            );
            echo '</li>';
            if ($i == $childCount) {
                echo '</ul>';
            }
            $i++;
        }
    }
}

function get_clinical_establishment1_by_ids($ids)
{
    $ci = &get_instance();
    $ids = explode(",", $ids);
    $q = $ci->db->select('GROUP_CONCAT( `name` SEPARATOR ",   ") as establishment_name')->where_in(
        'id',
        $ids
    )->get('ci_establishment_type')->result_array();
    // echo $ci->db->last_query();
    return $q;
}

function get_ownership_name_by_id($id)
{

    $ci = &get_instance();
    if ($id != null or $id != '') {
        $a = @$ci->db->get_where('ci_ownership_type', array('id' => $id))->row_array()['name'];

        return $a;
    } else {
        return false;
    }
}

function get_stastical_detail_by_id($id)
{

    $ci = &get_instance();
    return $ci->db->get_where('ci_certificate_statistical', array('id' => $id))->row_array()['contact_person'];
}


function urlencrypt($string)
{
    $output = false;
    $r = rand(10, 100);
    $string = $string . $r;

    // hash
    $key = hash('sha256', SECRET_KEY);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    //do the encyption given text/string/number
    $output = openssl_encrypt($string, ENCRYPT_METHOD, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

function urldecrypt($string)
{
    $output = false;

    // hash
    $key = hash('sha256', SECRET_KEY);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    //decrypt the given text/string/number
    $output = openssl_decrypt(
        base64_decode(substr($string, 0, -2)),
        ENCRYPT_METHOD,
        $key,
        0,
        $iv
    );
    $output = substr($output, 0, -2);
    return $output;
}

// Generate a Random Number for unique registration 

function get_new_certifecate_permanent($state_id = false, $district_id = false)
{



    $str = 'Perm' . now();
    // print_r($str);  die;
    return $str;
}
function get_new_certifecate_provisional($state_id = false, $district_id = false)
{

    $str = 'PROV/' . $state_id . '/' . $district_id . '/' . now();
    // print_r($str);  die;
    return $str;
}
function reply_exam_sheduled($id)
{

    $ci = &get_instance();
    return $ci->db->get_where('ci_exam_invitation', array('id' => $id))->row_array();
}


function getCandidateNumbers($school_id, $exam_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('candidate_array')->where('school_id', $school_id)->where('exam_id ', $exam_id)
        ->get('ci_allocation_table')->row_array();
    $candidateValues = isset($q['candidate_array']) ? explode(",", $q['candidate_array']) : [];
    return $candidateValues;
}
function uniqueSnoschool($email)
{
    $ci = &get_instance();
    $q = $ci->db->select('school_registration_number')->where('email', $email)
        ->get('ci_admin')->row_array();
    $snoSchool = isset($q['school_registration_number']) ? $q['school_registration_number'] : '';
    return $snoSchool;
}

function getCenterCode($school_id, $exam_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('exam_center_code')->where('school_id', $school_id)->where('exam_id ', $exam_id)
        ->get('ci_allocation_table')->row_array();
    $exam_center_code = isset($q['exam_center_code']) ? $q['exam_center_code'] : '';
    return $exam_center_code;
}
function getExamIdStatusActive($admin_id, $exam_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('exam_id')->where('admin_id', $admin_id)->where('exam_id ', $exam_id)->where('status', 1)
        ->get('ci_allocation_table')->row_array();
    $exam_id = isset($q['exam_id']) ? $q['exam_id'] : 0;
    return $exam_id;
}
function getSchoolName($school_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('school_name')->where('id', $school_id)
        ->get('ci_exam_registration')->row_array();
    $exam_center_code = isset($q['school_name']) ? $q['school_name'] : '';
    return $exam_center_code;
}
function getSchoolNameFromEmailId($emailId)
{
    $ci = &get_instance();
    $q = $ci->db->select('id')->where('email', $emailId)
        ->get('ci_exam_registration')->row_array();
    $id = isset($q['id']) ? $q['id'] : '';
    return $id;
}
function getMobile($school_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('pri_mobile')->where('id', $school_id)
        ->get('ci_exam_registration')->row_array();
    $mobile = isset($q['pri_mobile']) ? $q['pri_mobile'] : '';
    return $mobile;
}
function getEmail($school_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('email')->where('id', $school_id)
        ->get('ci_exam_registration')->row_array();
    $email = isset($q['email']) ? $q['email'] : '';
    return $email;
}
function getExamIdFromSubjectList($subjectId)
{
    $ci = &get_instance();
    $q = $ci->db->select('exam_id')->where('id', $subjectId)
        ->get('ci_subject')->row_array();
    $exam_id = isset($q['exam_id']) ? $q['exam_id'] : '';
    return $exam_id;
}
function getConsentAllocate_max($school_id)
{
    $ci = &get_instance();
    $q = $ci->db->select('max_allocate_candidate')->where('id', $school_id)
        ->get('ci_exam_registration')->row_array();
    $exam_center_code = isset($q['max_allocate_candidate']) ? $q['max_allocate_candidate'] : '';
    return $exam_center_code;
}


function checkExamInvitationStatus($exam_id, $school_rgister_id)
{
    $ci = &get_instance();
    $query =  $ci->db->from('ci_registration_invitation')->where('ci_registration_invitation.ref_id', $exam_id)->where('ci_registration_invitation.school_id', $school_rgister_id)->get();
    return $query->row_array();
}

function getSchoolDetails($school_id)
{
    $ci = &get_instance();
    $query =  $ci->db->from('ci_exam_registration')->where('id', $school_id)->get();
    return $query->row_array();
}

function getStateInSuperAdminList($admin_id)
{

    $ci = &get_instance();
    $q = $ci->db->select('state_id')->where('admin_id', $admin_id)
        ->get('ci_admin')->row_array();
    $state_id = isset($q['state_id']) ? $q['state_id'] : '';
    return $state_id;
}
function getcityInSuperAdminList($admin_id)
{

    $ci = &get_instance();
    $q = $ci->db->select('district_id')->where('admin_id', $admin_id)
        ->get('ci_admin')->row_array();
    $district_id = isset($q['district_id']) ? $q['district_id'] : '';

    return $district_id;
}

function checkOption($exam_id, $school_id, $dateexam, $shiftexam)
{
    $ci = &get_instance();
    $q = $ci->db->select('choice')
        ->where('examId', $exam_id)
        ->where('schoolId', $school_id)
        ->where('examShift', $shiftexam)
        ->where('examDate', $dateexam)
        ->get('examshiftchoice')->row_array();
    $choice = isset($q['choice']) ? $q['choice'] : '';

    return $choice;
}

function getsendInvitationSchoolList($exam_id){
    $examId = urldecode($exam_id);
    $ci = &get_instance();
   $rowCount = $ci->db->query("SELECT * FROM ci_exam_registration INNER JOIN ci_registration_invitation ON ci_exam_registration.id=ci_registration_invitation.school_id");
   ;
return $rowCount->num_rows();
}
function getValues($exam_id){
    $exam_id = urldecrypt($exam_id);
    $ci = &get_instance();
    $ci->db->from('ci_exam_registration');
    $ci->db->where('ci_exam_registration.fileName6 is  NOT NULL');
    $ci->db->order_by('ci_exam_registration.id', 'desc');
    $query = $ci->db->get();
    $module = array();
    if ($query->num_rows() > 0) {
        $module = $query->result_array();
    }
    // echo $query->num_rows();
    $pendingCount = 0;
    foreach ($module as $key => $row) {
        $school_rgister_id = $row['id'];
        $ci = &get_instance();
        $query =  $ci->db->from('ci_registration_invitation')->where('ci_registration_invitation.ref_id', $exam_id)->where('ci_registration_invitation.school_id', $school_rgister_id)->get();
        $invitationStatus =  $query->row_array();
        $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
        $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
        if($invt_recieved==0 && $invite_sent==0){
            $pendingCount = $pendingCount+1;
        }
        
        # code...
    }
    return $pendingCount;
}

function getNotRecievedCount($exam_id){
    $exam_id = urldecrypt($exam_id);

    $ci = &get_instance();
    $ci->db->from(' ci_exam_according_to_school');
    $ci->db->where(' ci_exam_according_to_school.fileName6 is  NOT NULL');
    $ci->db->where('ci_exam_according_to_school.invt_recieved',0);
    $ci->db->where('ci_exam_according_to_school.ref_id',$exam_id);
    $ci->db->order_by(' ci_exam_according_to_school.id', 'desc');
    $query = $ci->db->get();
    return $query->num_rows();
}


function sendSMS($mobile, $message, $template_id)
{
    $phone = $mobile;
    $user_message = $message;
    $authKey = "1101498600000055523";
    $mobileNumber = $phone;
    $senderId = "UKPSCM";
    $message = $user_message;
    $route = "route=4";

    // $postData = array(
    //     "username"=>'UKPSC',
    //     "password"=>"123456",
    //     "sender"=>'UKPSCM',
    //     "pe_id"=>"1101498600000055523",
    //     "reqid"=>"1",
    //     "template_id"=>$template_id,
    //     "format"=>"json",
    //     'message'=>$message,
    //     'to'=>$mobileNumber
    // );

    $postData = array(
        "username" => 'UKPSC',
        "password" => "UKPSC123",
        "sender" => 'UKPSCM',
        "e_id" => "1101498600000055523",
        "priority" => 11,
        "t_id" => $template_id,
        "format" => "json",
        'message' => $message,
        'to' => $mobileNumber
    );


    /*API URL*/
    // $url="http://sms.holymarkindia.in/API/WebSMS/Http/v1.0a/index.php";
    $url = "http://hmimedia.in/pushsms.php";
    //$url = "";

    /* init the resource */
    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_FOLLOWLOCATION => true
    ));
    /*Ignore SSL certificate verification*/
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    /*get response*/
    $output = curl_exec($ch);

    /*Print error if any*/
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
    echo "OTP sent successfully.";
}
function sendEmail($email, $message, $template_id)
{
    $postData = array(
        "username" => "UKPSC",
        "api_password" => "50ef9hkx4ota7pb53",
        "sender" => "ukpschdr@gmail.com",
        "replyto" => "ukpschdr@gmail.com",
        "cright" => "UKPSC",
        "display" => "UKPSC",
        'subject' => 'UKPSC',
        'message' => $message,
        'to' => $email
    );


    /*API URL*/
    $url = "http://hmiemail.in/pushemail.php";
   // $url = "";
    /* init the resource */
    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_FOLLOWLOCATION => true
    ));
    /*Ignore SSL certificate verification*/
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    /*get response*/
    $output = curl_exec($ch);


    /*Print error if any*/
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
    echo "Message Sent Successfully !";
}
