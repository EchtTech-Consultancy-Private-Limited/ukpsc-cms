<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Consent_active extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("mailer");
        auth_check();
        $this->load->model("admin/admin_model", "admin_model");
        $this->load->model("admin/location_model", "location_model");
        $this->load->model("admin/Certificate_model", "Certificate_model");
        $this->load->model("admin/Exam_model", "Exam_model");
        $this->load->model("admin/Exam_model", "exam_model");
        $this->load->helper("date");
        $this->load->library("session");
    }

    function test_input($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    function consent_active_list_data()
    {
        $data["info"] = $this->Certificate_model->get_all_active_consent();

        $this->load->view("admin/consent_active/consent_list", $data);
    }

    function consent_recieved_data_COPY27_03_2023()
    {
        $data["row"] = $this->Certificate_model->get_all_active_consent_reg();

        foreach ($data["row"] as $key => $valueid) {
            $ref_id = $valueid["ref_id"];
            $school_id = $valueid["id"];

            $get_full_data = $this->Certificate_model->get_all_data_consent(
                $ref_id
            );
        }

        // $data["info"] = isset($get_full_data) ? $get_full_data : '';

        $data[
            "info"
        ] = $this->Certificate_model->getSentConsentFromExamController();

        // print_r($data['info']);
        // die();

        //
        // $this->load->view("admin/consent_active/consent_list_recieved", $data);
        $this->load->view(
            "admin/consent_active/consent_list_recieved_23-03-2023",
            $data
        );
    }

    function consent_recieved_data()
    {
        
        $data["info"] = $this->Certificate_model->getSentConsentFromExamController();
        //print_r($data["info"]);die;
        $this->load->view("admin/consent_active/consent_list_recieved", $data);
        // $this->load->view("admin/consent_active/consent_list_recieved_23-03-2023", $data);
    }

    public function consent_active_list()
    {
        $this->rbac->check_operation_access();

        $data["states"] = $this->location_model->get_states();

        if (isset($_SESSION["state_id"]) && $_SESSION["state_id"] != "") {
            $data["districts"] = get_state_cities($_SESSION["state_id"]);
        }

        $data["title"] = "Consent List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/consent_active/cosent_index", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    public function consent_recieved()
    {
        // $this->rbac->check_operation_access();

        $data["states"] = $this->location_model->get_states();
        if (isset($_SESSION["state_id"]) && $_SESSION["state_id"] != "") {
            $data["districts"] = get_state_cities($_SESSION["state_id"]);
        }

        $data["title"] = "Consent List";
        // echo '<pre>';print_r($data);exit;
        $this->load->view("admin/includes/_header", $data);
        $this->load->view("admin/consent_active/cosent_index_recieved", $data);
        $this->load->view("admin/includes/_footer", $data);
    }

    public function consent_preview($id)
    {
        $this->rbac->check_operation_access(); // check opration permission

        $data["id"] = $id;

        $data["user"] = $this->Certificate_model->get_objection_id(
            urldecrypt($id)
        );

        exit();

        $this->load->view("admin/includes/_header");

        $this->load->view("admin/consent_active/consent_preview", $data);

        $this->load->view("admin/includes/_footer");
    }
    public function consent_add()
    {
        if ($this->input->post("submit")) {
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $dataForExamSchool = [
                "school_registration_number" => $this->test_input(
                    $this->input->post("school_registration")
                ),
                "address" => $this->test_input($this->input->post("address")),
                "admin_id" => $this->session->userdata("admin_id"),
                "school_name" => $this->input->post("school_name"),
                "landmark" => $this->input->post("landmark"),
                "district" => $this->input->post("district"),
                "city" => $this->input->post("city"),
                "ref_id" => $this->input->post("ci_exam_registrationid"),
                "exam_name" => $this->input->post("exam_name"),
                "school_id" => $school_Id,
                "admin_id" => $this->session->userdata("admin_id"),
            ];

            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );

            if ($result) {
                $ci_exam_registrationid = $this->input->post(
                    "ci_exam_registrationid"
                );
                redirect(
                    base_url(
                        "admin/consent_active/consent_add_1" .
                            "/" .
                            $ci_exam_registrationid
                    )
                );
            }
        } else {
            $exam_id = $this->uri->segment(5);
            $school_Id = $this->uri->segment(4);
            $data["exam_name"] = $this->Certificate_model->get_exam_detail(
                $exam_id
            );
            $data[
                "admin"
            ] = $this->Certificate_model->get_user_detail_register_modify();
            $district = $data["admin"][0]["district"];
            $city_id = $data["admin"][0]["city"];
            $data["district"] = $this->Certificate_model->generatedistrict(
                $district
            );
            $data["city_name"] = $this->Certificate_model->generateukpscid(
                $city_id
            );

            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent", $data);
            $this->load->view("admin/includes/_footer");
        }
    }

    public function consent_add_1()
    {
        $admin_id = $this->session->userdata["admin_id"];
        if ($this->input->post("submit")) {
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $dataForExamSchool = [
                "principal_name" => $this->input->post("principal_name"),
                "pri_mobile" => $this->input->post("pri_mobile"),
                "email" => $this->input->post("email"),
                "whats_num" => $this->input->post("whats_num"),
                "ref_id" => $this->input->post("ci_exam_registrationid1"),
                "school_id" => $school_Id,
            ];

            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );
            if ($result) {
                $ci_exam_registrationid1 = $this->input->post(
                    "ci_exam_registrationid1"
                );
                redirect(
                    base_url(
                        "admin/consent_active/consent_add_2" .
                            "/" .
                            $ci_exam_registrationid1
                    )
                );
            }
        } else {
            $exam_id = $this->uri->segment(4);
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $data["exam_name"] = $this->Certificate_model->get_exam_detail(
                $exam_id
            );
            $data["admin"] = $this->admin_model->get_center_data_updatenew(
                $exam_id,
                $school_Id
            );
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent1", $data);
            $this->load->view("admin/includes/_footer");
        }
    }
    public function consent_add_2()
    {
        if ($this->input->post("submit")) {
            $ref_id = $this->input->post("ci_exam_registrationid2");
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );

            $dataForExamSchool = [
                "super_name" => $this->input->post("super_name"),
                "super_design" => $this->input->post("super_design"),
                "super_mobile" => $this->input->post("super_mobile"),
                "super_email" => $this->input->post("super_email"),
                "super_whatspp" => $this->input->post("super_whatspp"),
                "ref_id" => $ref_id,
                "school_id" => $school_Id,
            ];
            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );
            if ($result) {
                $ci_exam_registrationid2 = $this->input->post(
                    "ci_exam_registrationid2"
                );
                redirect(
                    base_url(
                        "admin/consent_active/consent_add_3" .
                            "/" .
                            $ci_exam_registrationid2
                    )
                );
            }
        } else {
            $exam_id = $this->uri->segment(4);
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $exam_id = $this->uri->segment(4);
            $data["exam_name"] = $this->Certificate_model->get_exam_detail(
                $exam_id
            );
            $data["user"] = $this->admin_model->get_center_data_updatenew(
                $exam_id,
                $school_Id
            );
            //print_r($data["user"]['email']);die;
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent2", $data);
            $this->load->view("admin/includes/_footer");
        }
    }
    public function consent_add_3()
    {
        if ($this->input->post("submit")) {
            $ref_id = $this->input->post("ci_exam_registrationid3");
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $dataForExamSchool = [
                "no_room" => $this->input->post("no_room"),
                "no_sheet" => $this->input->post("no_sheet"),
                "max_allocate_candidate" => $this->input->post(
                    "max_allocate_candidate"
                ),
                "furniture_avail" => $this->input->post("furniture_avail"),
                "elec_avail" => $this->input->post("elec_avail"),
                "gen_avai" => $this->input->post("gen_avai"),
                "wash_rrom" => $this->input->post("wash_rrom"),
                "clock_room" => $this->input->post("clock_room"),
                "vehicle_avail" => $this->input->post("vehicle_avail"),
                "staff_suffi" => $this->input->post("staff_suffi"),
                "ukpsc_exxma" => $this->input->post("ukpsc_exxma"),
                "debar" => $this->input->post("debar"),
                "bras_Seal" => $this->input->post("bras_Seal"),
                "remark_if" => $this->input->post("remark_if"),
                "ref_id" => $ref_id,
                "school_id" => $school_Id,
            ];
            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );
            if ($result) {
                $ci_exam_registrationid3 = $this->input->post(
                    "ci_exam_registrationid3"
                );
                redirect(
                    base_url(
                        "admin/consent_active/consent_add_4" .
                            "/" .
                            $ci_exam_registrationid3
                    )
                );
            }
        } else {
            $exam_id = $this->uri->segment(4);
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $exam_id = $ref_id = $this->uri->segment(4);
            $data["exam_name"] = $this->Certificate_model->get_exam_detail(
                $exam_id
            );
            $data["user"] = $this->admin_model->get_center_data_updatenew(
                $exam_id,
                $school_Id
            );
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent3", $data);
            $this->load->view("admin/includes/_footer");
        }
    }

    public function consent_add_4()
    {
        if ($this->input->post("submit")) {
            $ref_id = $this->input->post("ci_exam_registrationid4");
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $dataForExamSchool = [
                "acc_holder_name" => $this->input->post("acc_holder_name"),
                "ban_name" => $this->input->post("ban_name"),
                "branch_name" => $this->input->post("branch_name"),
                "ifsc" => $this->input->post("ifsc"),
                "acc_num" => $this->input->post("acc_num"),
                "acc_num_con" => $this->input->post("acc_num_con"),
                "ref_id" => $ref_id,
                "school_id" => $school_Id,
            ];
            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );

            if ($result) {
                $ci_exam_registrationid4 = $this->input->post(
                    "ci_exam_registrationid4"
                );
                redirect(
                    base_url(
                        "admin/consent_active/consent_add_5" .
                            "/" .
                            $ci_exam_registrationid4
                    )
                );
            }
        } else {
            $exam_id = $this->uri->segment(4);
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $exam_id = $ref_id = $this->uri->segment(4);
            $data["exam_name"] = $this->Certificate_model->get_exam_detail(
                $exam_id
            );
            $data["user"] = $this->admin_model->get_center_data_updatenew(
                $exam_id,
                $school_Id
            );
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent4", $data);
            $this->load->view("admin/includes/_footer");
        }
    }
    public function consent_add_5()
    {
        $admin_id = $this->session->userdata["admin_id"];

        if (!empty($_FILES["fileName1"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName1"]["name"];
            $config["max_size"] = 1024 * 1024;
            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName1")) {
                $uploadData = $this->upload->data();
                $fileName1 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName1 = "";
            }
        } else {
            $fileName1 = "";
        }
        if (!empty($_FILES["fileName2"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName2"]["name"];
            $config["max_size"] = 1024 * 1024;

            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName2")) {
                $uploadData = $this->upload->data();
                $fileName2 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName2 = "";
            }
        } else {
            $fileName2 = "";
        }
        if (!empty($_FILES["fileName3"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName3"]["name"];
            $config["max_size"] = 1024 * 1024;

            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName3")) {
                $uploadData = $this->upload->data();
                $fileName3 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName3 = "";
            }
        } else {
            $fileName3 = "";
        }
        if (!empty($_FILES["fileName4"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName4"]["name"];
            $config["max_size"] = 1024 * 1024;

            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName4")) {
                $uploadData = $this->upload->data();
                $fileName4 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName4 = "";
            }
        } else {
            $fileName4 = "";
        }
        if (!empty($_FILES["fileName5"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName5"]["name"];
            $config["max_size"] = 1024 * 1024;

            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName5")) {
                $uploadData = $this->upload->data();
                $fileName5 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName5 = "";
            }
        } else {
            $fileName5 = "";
        }

        if (!empty($_FILES["fileName6"]["name"])) {
            $config["upload_path"] = "uploads/consent_data/";
            $config["allowed_types"] = "jpeg|jpg|pdf";
            $config["file_name"] = time() . "-" . $_FILES["fileName6"]["name"];
            $config["max_size"] = 1024 * 1024;

            //Load upload library and initialize configuration
            $this->load->library("upload", $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("fileName6")) {
                $uploadData = $this->upload->data();
                $fileName6 = $uploadData["file_name"];
            } else {
                $error = ["error" => $this->upload->display_errors()];
                $this->session->set_flashdata("error", $error["error"]);
                $fileName6 = "";
            }
        } else {
            $fileName6 = "";
        }
        
    //print_r($this->input->post("examincation_ids"));die;
        if ($this->input->post("submit")) {
            $file_movement =
            $this->input->post("submit") == "Submit" ? "2" : "1";
            $examincation_ids = $this->input->post("examincation_ids");
            $exmin_ceter_option = $this->input->post("exmin_ceter_option");
            $exmin_ceter_option = implode(",", $exmin_ceter_option);
            $ref_id = $this->input->post("ci_exam_registrationid5");
            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );

            $dataForExamSchool = [
                "fileName1" => $fileName1,
                "fileName2" => $fileName2,
                "fileName3" => $fileName3,
                "fileName4" => $fileName4,
                "fileName5" => $fileName5,
                "fileName6" => $fileName6,
                "examincation_id" => $examincation_ids,
                "exmin_ceter_option" => $exmin_ceter_option,
                "file_movement" => $file_movement,
                "created_at" => date("d-m-Y : h:m:s"),
                "created_by" => $this->session->userdata("admin_id"),
                "ref_id" => $ref_id,
                "school_id" => $school_Id,
            ];

            $result = $this->Certificate_model->editNewDataForExam(
                $dataForExamSchool
            );

            if ($result) {
                $ci_exam_registrationid5 = $this->input->post(
                    "ci_exam_registrationid5"
                );
                redirect(
                    base_url(
                        "admin/consent_active/down_form/" .
                            $admin_id .
                            "/" .
                            $ci_exam_registrationid5
                    )
                );
            }
        } elseif ($this->input->post("submitupload")) {
            if (!empty($_FILES["from_upload_file"]["name"])) {
                $config["upload_path"] = "uploads/consent_form/";
                $config["allowed_types"] = "pdf";
                $config["file_name"] =
                    time() . "-" . $_FILES["from_upload_file"]["name"];
                $config["max_size"] = 1024 * 1024;

                //Load upload library and initialize configuration
                $this->load->library("upload", $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload("from_upload_file")) {
                    $uploadData = $this->upload->data();
                    $from_upload_file = $uploadData["file_name"];
                } else {
                    $error = ["error" => $this->upload->display_errors()];
                    $this->session->set_flashdata("error", $error["error"]);
                    $from_upload_file = "";
                }
            }

            if ($this->input->post("submitupload")) {
                $school_Id = getSchoolNameFromEmailId(
                    $this->session->userdata("username")
                );

                $dataForNewTable = [
                    "invite_sent" => "1",
                    "invt_recieved" => "1",
                    "consents_signstamp_status" => "1",
                ];
                $this->db->where(["school_id" => $school_Id]);
                $this->db->where([
                    "ref_id" => $this->input->post("ci_exam_fileupload6"),
                ]);
                $this->db->update(
                    "ci_registration_invitation",
                    $dataForNewTable
                );

                // New 28-09-2022
                $ref_id = $this->input->post("ci_exam_fileupload6");
                $dataForExamSchool = [
                    "consents_signstamp_file" => $from_upload_file,
                    "consents_signstamp_status" => 1,
                    "created_at" => date("d-m-Y : h:m:s"),
                    "created_by" => $this->session->userdata("admin_id"),
                    "invite_sent" => "1",
                    "invt_recieved" => "1",
                    "ref_id" => $ref_id,
                    "school_id" => $school_Id,
                ];
                $result = $this->Certificate_model->editNewDataForExam(
                    $dataForExamSchool
                );
                if ($result) {
                    $this->db->select("*");
                    $this->db->where(
                        "id",
                        $this->input->post("ci_exam_fileupload6")
                    );
                    $this->db->from("ci_exam_invitation");
                    $equery = $this->db->get();
                    $eData = $equery->result_array();

                    $this->db->select("*");
                    $this->db->where("admin_id", $admin_id);
                    $this->db->from("ci_admin");
                    $query = $this->db->get();
                    $cData = $query->result_array();

                    $examName = get_exam_name($eData[0]["exam_name"]);
                    $admin_id = $this->session->userdata["admin_id"];
                    $this->db->select("*");
                    $this->db->where("admin_id", $admin_id);
                    $this->db->from("ci_admin");
                    $query = $this->db->get();
                    $cData = $query->result_array();

                    $exam_controller_id = get_exam_controller_id(
                        $eData[0]["exam_name"]
                    );
                    $fetch_controller_details = get_exam_controller_details(
                        $exam_controller_id
                    );

                    $email = $fetch_controller_details["email"];
                    $phone = $fetch_controller_details["mobile_no"];

                    $template_id = "1007261310462557602";
                    $schoolName = getSchoolName($school_Id);
                    $messageP1 = "Dear Sir/Madam ,";
                    $messageP1 .=
                        "Consent for the " .
                        $examName .
                        " of UKPSC has been applied and submitted for your kind perusal.";
                    $messageP1 .= "Regards";
                    $messageP1 .= "Centre";

                    sendSMS($phone, $messageP1, $template_id);

                    $mail_data = [
                        "examname" => $examName,
                        "Centre" => $schoolName,
                    ];

                    $this->load->helper("email_helper");
                    $this->mailer->mail_template(
                        $email,
                        "apply-consent-school",
                        $mail_data
                    );
                    $data["fileupload"] = "fileupload";
                    $this->session->set_flashdata(
                        "consent_recievedsuss",
                        'Request for "Consent Letter" has been applied successfully! (""सहमति पत्र" के लिए अनुरोध सफलतापूर्वक लागू कर दिया गया है!)'
                    );

                    $ci_exam_registrationid5 = $this->input->post(
                        "ci_exam_registrationid5"
                    );

                    redirect(base_url("admin/consent_active/consent_recieved"));
                }
            }
        } else {
            $exam_id = $this->uri->segment(4);

            $school_Id = getSchoolNameFromEmailId(
                $this->session->userdata("username")
            );
            $data["admin"] = $this->admin_model->get_user_detail($admin_id);
            $data[
                "user"
            ] = $this->Certificate_model->get_user_detail_register_modify();
            // $data['info'] = $this->admin_model->get_center_data_update($school_Id);
            $data["info"] = $this->admin_model->get_center_data_updatenew(
                $exam_id,
                $school_Id
            );

            $examinationid = $this->uri->segment(4);

            $data["examinationid"] = $examinationid;
            // $data["examination_form"] = $this->Certificate_model->get_examination_form($examinationid);
            $data[
                "examination_form"
            ] = $this->Certificate_model->getExaminationData($examinationid);

            $data["schoolId"] = $school_Id;

            // New Exam ID
            $data["exam_name_replace_subject_id"] =
                $data["examination_form"][0]["exam_name"];

            $sub_name = $data["examination_form"][0]["sub_name"];
            $sub_name_array = explode(",", $sub_name);
            $date_exam = $data["examination_form"][0]["date_exam"];
            $date_exam_array = explode(",", $date_exam);
            $shft_exam = $data["examination_form"][0]["shft_exam"];
            $shft_exam_array = explode(",", $shft_exam);
            $time_exam = $data["examination_form"][0]["time_exam"];
            $time_exam_array = explode(",", $time_exam);
            $no_candidate = $data["examination_form"][0]["no_candidate"];
            $no_candidate_array = explode(",", $no_candidate);

            foreach ($sub_name_array as $k => $value1) {
                $subjectId = $sub_name_array[$k];
                $xs = $this->admin_model->get_sub_name($subjectId);
                $sub_info[$k]["id"] = isset($xs[0]["id"]) ? $xs[0]["id"] : 0;
                $sub_info[$k]["date_exam"] = isset($date_exam_array[$k])
                    ? $date_exam_array[$k]
                    : "";
                $sub_info[$k]["sub_name_english"] = isset($xs[0]["sub_name"])
                    ? $xs[0]["sub_name"]
                    : "";
                $sub_info[$k]["sub_name_hindi"] = isset(
                    $xs[0]["sub_name_hindi"]
                )
                    ? $xs[0]["sub_name_hindi"]
                    : "";
                $sub_info[$k]["sub_code"] = isset($xs[0]["sub_code"])
                    ? $xs[0]["sub_code"]
                    : "";
                $sub_info[$k]["shft_exam_array"] = isset($shft_exam_array[$k])
                    ? $shft_exam_array[$k]
                    : "";
                $sub_info[$k]["time_exam_array"] = isset($time_exam_array[$k])
                    ? $time_exam_array[$k]
                    : "";
                $sub_info[$k]["no_candidate_array"] = isset(
                    $no_candidate_array[$k]
                )
                    ? $no_candidate_array[$k]
                    : "";
                $sub_info[$k]["sub_name"] = $sub_name;
            }

            $sub_info["sub_info"] = $sub_info;
            $dates = explode(',', $data['examination_form'][0]['date_exam']);
            $checkDateExam = array_diff_assoc($dates, array_unique($dates));
            if(!empty($checkDateExam)){
                $sub_info['trueFalse'] = 1;
            }else{
                $sub_info['trueFalse'] = 0;
            }
            //print_r($trueFalse);die;
            $this->load->view("admin/includes/_header", $sub_info);
            $this->load->view("admin/consent_active/consent5", $data);
            $this->load->view("admin/includes/_footer", $sub_name);
        }
    }

    public function consent_add_6()
    {
        $admin_id = $this->session->userdata["admin_id"];
        if ($this->input->post("submit")) {
            $data = [
                "acc_holder_name" => $this->input->post("acc_holder_name"),
                "ban_name" => $this->input->post("ban_name"),
            ];

            $data = $this->security->xss_clean($data);
            $result = $this->Certificate_model->add_edit_step_data(
                $data,
                $admin_id
            );
        } else {
            $data["admin"] = $this->admin_model->get_user_detail($admin_id);
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/consent_active/consent6", $data);
            $this->load->view("admin/includes/_footer");
        }
    }
    public function down_form($id)
    {
        $data["id"] = $id;
        $ref_id = $this->uri->segment(5);
        $data["admin"] = $this->Certificate_model->get_registration_preview(
            $id,
            $ref_id
        );

        $data["states"] = $this->location_model->get_states();
        $data["user"] = $this->admin_model->get_old_data($id);

        $examinationid = $this->uri->segment(5);
        // $data["examination_form"] = $this->Certificate_model->get_examination_form($examinationid);
        $data[
            "examination_form"
        ] = $this->Certificate_model->getExaminationData($examinationid);
        $data["exam_name_replace_subject_id"] =
            $data["examination_form"][0]["exam_name"];
        $sub_name = $data["admin"]["examincation_id"];
        $sub_name_array = explode(",", $sub_name);

        $date_exam = $data["examination_form"][0]["date_exam"];
        $date_exam_array = explode(",", $date_exam);

        $shft_exam = $data["examination_form"][0]["shft_exam"];
        $shft_exam_array = explode(",", $shft_exam);

        $time_exam = $data["examination_form"][0]["time_exam"];
        $time_exam_array = explode(",", $time_exam);

        $no_candidate = $data["examination_form"][0]["no_candidate"];
        $no_candidate_array = explode(",", $no_candidate);

        $exmin_ceter_option = $data["admin"]["exmin_ceter_option"];
        $exmin_ceter_option_array = explode(",", $exmin_ceter_option);

        foreach ($sub_name_array as $k => $value1) {
            $subjectId = $sub_name_array[$k];
            $xs = $this->admin_model->get_sub_name($subjectId);
            $sub_info[$k]["id"] = $xs[0]["id"];
            $sub_info[$k]["date_exam"] = $date_exam_array[$k];
            $sub_info[$k]["sub_name_english"] = $xs[0]["sub_name"];
            $sub_info[$k]["sub_name_hindi"] = $xs[0]["sub_name_hindi"];
            $sub_info[$k]["sub_code"] = $xs[0]["sub_code"];
            $sub_info[$k]["shft_exam_array"] = $shft_exam_array[$k];
            $sub_info[$k]["time_exam_array"] = $time_exam_array[$k];
            $sub_info[$k]["no_candidate_array"] = $no_candidate_array[$k];
            $sub_info[$k]["exmin_ceter_option_array"] =
                $exmin_ceter_option_array[$k];
        }

        $sub_info["sub_info"] = $sub_info;
        $this->load->view("admin/includes/_header2", $sub_info);
        $this->load->view("admin/consent_active/consent_letter_preview", $data);
    }

    public function preview_form($id)
    {
        $data["id"] = $id;
        $data["admin"] = $this->Certificate_model->get_registration_data1(
            urldecrypt($id)
        );
        // print_r( $data['admin'] ); die;
        $data["states"] = $this->location_model->get_states();

        $this->load->view("admin/includes/_header2");
        $this->load->view("admin/consent_letter/consent_letter_preview", $data);
        // $this->load->view('admin/includes/_footer');
    }

    public function update_exam_name()
    {
        // $to = 'submsharma@gmail.com';
        // $message = 'hii';

        $admin_id = $this->session->userdata["admin_id"];
        $id = $this->input->get("prov_id");
        $exam_name = $this->db
            ->select("subjectline")
            ->from("ci_exam_invitation")
            ->where("id", $id)
            ->get()
            ->row("subjectline");

        $this->db->where("admin_id", $admin_id);
        $this->db->update("ci_exam_registration", ["exam_name" => $exam_name]);
    }

    public function optionsCheck()
    {
        $data = explode(",", $_GET["passArray"]);

        $dataTable = [
            "examId" => $data[0],
            "schoolId" => $data[1],
            "examDate" => $data[2],
            "examShift" => $data[3],
            "examTime" => $data[4],
            "choice" => $_GET["option"],
        ];

        $this->db->from("examshiftchoice");
        $this->db->where("examId", $data[0]);
        $this->db->where("schoolId", $data[1]);
        $this->db->where("examDate", $data[2]);
        $this->db->where("examShift", $data[3]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $this->db->update("examshiftchoice", $dataTable);
        } else {
            $this->db->insert("examshiftchoice", $dataTable);
        }

        return false;
    }
}
