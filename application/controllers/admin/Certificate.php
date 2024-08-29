<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Certificate extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        auth_check(); // check login auth

        $this->load->model("admin/admin_model", "admin_model");

        $this->load->model("admin/location_model", "location_model");

        $this->load->model("admin/Certificate_model", "Certificate_model");

        $this->load->helper("date");
    }

    function test_input($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    /*Permanent Code Starts Here*/

    public function permanent_list()
    {
        $this->rbac->check_operation_access();

        $data["states"] = $this->location_model->get_states();

        if (isset($_SESSION["state_id"]) && $_SESSION["state_id"] != "") {
            $data["districts"] = get_state_cities($_SESSION["state_id"]);
        }

        $data["title"] = "Permanent List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/certificate/permanent_index", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    public function permanent()
    {
        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(",", $this->input->post("systems_of_medicine"))
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(",", $this->input->post("clinical_establishment"))
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Apply" ? "2" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",
                "trim|required"
            );

            //            $this->form_validation->set_rules('address1', 'Address1', 'trim|required');

            //            $this->form_validation->set_rules('state', 'State', 'required');

            //            $this->form_validation->set_rules('district_establishment', 'District', 'required');

            //            $this->form_validation->set_rules('pin', 'Pin', 'trim|required');

            //            $this->form_validation->set_rules('std', 'Std', 'trim|required');

            //            $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');

            //            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

            //            $this->form_validation->set_rules('fax', 'Fax', 'trim|required');

            //            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

            //            $this->form_validation->set_rules('fname_owner', 'First Name', 'required');

            //            $this->form_validation->set_rules('lname_owner', 'Last Name', 'trim|required');

            //            $this->form_validation->set_rules('add1_owner', 'Address ', 'trim|required');

            //            $this->form_validation->set_rules('state_owner', 'State', 'required');

            //            $this->form_validation->set_rules('district_owner', 'District', 'required');

            //            $this->form_validation->set_rules('mobile_owner', 'Mobile', 'trim|required');

            //            $this->form_validation->set_rules('fname_person', 'First Name', 'trim|required');

            //            $this->form_validation->set_rules('lname_person', 'Last Name', 'trim|required');

            //            $this->form_validation->set_rules('ownership', 'Ownership', 'required');

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(base_url("admin/certificate/permanent/"), "refresh");
            } else {
                // Code to file uplodde move_uploaded_file

                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $certificate_number =
                    "P/" .
                    $this->input->post("state") .
                    "/" .
                    $this->input->post("district") .
                    "/" .
                    now();

                /* Showing filtered data in permanent form */

                $pro_id = now();

                $status = "1";

                $Date = date("Y-m-d");

                $expire_date = date("Y-m-d", strtotime($Date . " + 3 days"));

                $data = [
                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "certificate_number" => $certificate_number,

                    "pro_id" => $pro_id,

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "type_fee" => $this->input->post("type_fee"),

                    "address2" => $this->input->post("address2"),

                    "address1" => $this->input->post("address1"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "area_establishmet" => $this->input->post(
                        "area_establishmet"
                    ),

                    "constructed_area" => $this->input->post(
                        "constructed_area"
                    ),

                    "opd_clinics" => $this->input->post("opd_clinics"),

                    "serial_no1" => $this->input->post("serial_no1"),

                    "specialty_no1" => $this->input->post("specialty_no1"),

                    "serial_no2" => $this->input->post("serial_no2"),

                    "specialty_no2" => $this->input->post("specialty_no2"),

                    "serial_no3" => $this->input->post("serial_no3"),

                    "serial_no4" => $this->input->post("serial_no4"),

                    "specialty_no4" => $this->input->post("specialty_no4"),

                    "totalbeds" => $this->input->post("totalbeds"),

                    "serial_no5" => $this->input->post("serial_no5"),

                    "specialty_no5" => $this->input->post("specialty_no5"),

                    "specialty_bed1" => $this->input->post("specialty_bed1"),

                    "serial_no6" => $this->input->post("serial_no6"),

                    "specialty_no6" => $this->input->post("specialty_no6"),

                    "specialty_bed2" => $this->input->post("specialty_bed2"),

                    "serial_no7" => $this->input->post("serial_no7"),

                    "specialty_no7" => $this->input->post("specialty_no7"),

                    "specialty_bed3" => $this->input->post("specialty_bed3"),

                    "serial_no8" => $this->input->post("serial_no8"),

                    "specialty_no8" => $this->input->post("specialty_no8"),

                    "specialty_bed4" => $this->input->post("specialty_bed4"),

                    "serial_no9" => $this->input->post("serial_no9"),

                    "specialty_no9" => $this->input->post("specialty_no9"),

                    "specialty_bed5" => $this->input->post("specialty_bed5"),

                    "common_facility" => $this->input->post("common_facility"),

                    "w3review" => $this->input->post("w3review"),

                    "auth_yes" => $this->input->post("auth_yes"),

                    "permanent_staff" => $this->input->post("permanent_staff"),

                    "temporary_staff" => $this->input->post("temporary_staff"),

                    "doctor_name" => $this->input->post("doctor_name"),

                    "nurshing_name" => $this->input->post("nurshing_name"),

                    "para_name" => $this->input->post("para_name"),

                    "pharmacists_name" => $this->input->post(
                        "pharmacists_name"
                    ),

                    "administrative_name" => $this->input->post(
                        "administrative_name"
                    ),

                    "others_name" => $this->input->post("others_name"),

                    "cat_1" => $this->input->post("cat_1"),

                    "totl_1" => $this->input->post("totl_1"),

                    "remark_1" => $this->input->post("remark_1"),

                    "cat_2" => $this->input->post("cat_2"),

                    "totl_2" => $this->input->post("totl_2"),

                    "remark_2" => $this->input->post("remark_2"),

                    "cat_3" => $this->input->post("cat_3"),

                    "totl_3" => $this->input->post("totl_3"),

                    "remark_3" => $this->input->post("remark_3"),

                    "payment_op" => $this->input->post("payment_op"),

                    "ammount_rs" => $this->input->post("ammount_rs"),

                    "details_rs" => $this->input->post("details_rs"),

                    "recipt_no" => $this->input->post("recipt_no"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    "fileName5" => $fileName5,

                    "last_ip" => $this->input->ip_address(),

                    "systems_of_medicine" => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "status" => $status,

                    "expire_date" => $expire_date,

                    "created_at" => date("Y-m-d : h:m:s"),

                    "created_by" => $this->session->userdata("admin_id"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->add_permanent($data);

                if ($result) {
                    $this->session->set_flashdata(
                        "success",
                        'Request for "Permanent Certificate" has been add successfully!'
                    );

                    redirect(
                        base_url("admin/certificate/permanent_list"),
                        "refresh"
                    );
                }
            }
        } else {
            $data["states"] = $this->location_model->get_states();

            $data["get_city_by_state_id"] = $this->location_model->get_states();

            $data["ownership_level"] = get_ownership_level1();

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["random_number"] = get_new_certifecate_permanent();

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/permanent", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function edit_permanent($id)
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(
                    ",",

                    $this->input->post("systems_of_medicine")
                )
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(
                    ",",

                    $this->input->post("clinical_establishment")
                )
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Apply" ? "2" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",

                "trim|required"
            );

            //           $this->form_validation->set_rules('systems_of_medicine', 'Systems of Medicine', 'required');

            //           $this->form_validation->set_rules('clinical_services', 'Clinical Services', 'required');

            //           $this->form_validation->set_rules('clinical_establishment', 'Clinical Establishment', 'required');

            //           $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/certificate/edit_permanent/" . $id),

                    "refresh"
                );
            } else {
                // Code to file uplodde move_uploaded_file

                //                print_r($_FILES);

                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $data = [
                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "address1" => $this->input->post("address1"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "area_establishmet" => $this->input->post(
                        "area_establishmet"
                    ),

                    "constructed_area" => $this->input->post(
                        "constructed_area"
                    ),

                    "opd_clinics" => $this->input->post("opd_clinics"),

                    "serial_no1" => $this->input->post("serial_no1"),

                    "specialty_no1" => $this->input->post("specialty_no1"),

                    "serial_no2" => $this->input->post("serial_no2"),

                    "specialty_no2" => $this->input->post("specialty_no2"),

                    "serial_no3" => $this->input->post("serial_no3"),

                    "serial_no4" => $this->input->post("serial_no4"),

                    "specialty_no4" => $this->input->post("specialty_no4"),

                    "totalbeds" => $this->input->post("totalbeds"),

                    "serial_no5" => $this->input->post("serial_no5"),

                    "specialty_no5" => $this->input->post("specialty_no5"),

                    "specialty_bed1" => $this->input->post("specialty_bed1"),

                    "serial_no6" => $this->input->post("serial_no6"),

                    "specialty_no6" => $this->input->post("specialty_no6"),

                    "specialty_bed2" => $this->input->post("specialty_bed2"),

                    "serial_no7" => $this->input->post("serial_no7"),

                    "specialty_no7" => $this->input->post("specialty_no7"),

                    "specialty_bed3" => $this->input->post("specialty_bed3"),

                    "serial_no8" => $this->input->post("serial_no8"),

                    "specialty_no8" => $this->input->post("specialty_no8"),

                    "specialty_bed4" => $this->input->post("specialty_bed4"),

                    "serial_no9" => $this->input->post("serial_no9"),

                    "specialty_no9" => $this->input->post("specialty_no9"),

                    "specialty_bed5" => $this->input->post("specialty_bed5"),

                    "common_facility" => $this->input->post("common_facility"),

                    "w3review" => $this->input->post("w3review"),

                    "auth_yes" => $this->input->post("auth_yes"),

                    "permanent_staff" => $this->input->post("permanent_staff"),

                    "temporary_staff" => $this->input->post("temporary_staff"),

                    "doctor_name" => $this->input->post("doctor_name"),

                    "doctor_qualification" => $this->input->post(
                        "doctor_qualification"
                    ),

                    "doctor_registration" => $this->input->post(
                        "doctor_registration"
                    ),

                    "doctor_temp" => $this->input->post("doctor_temp"),

                    "nurshing_name" => $this->input->post("nurshing_name"),

                    "nurshing_qualification" => $this->input->post(
                        "nurshing_qualification"
                    ),

                    "nurshing_registration" => $this->input->post(
                        "nurshing_registration"
                    ),

                    "nurshing_temp" => $this->input->post("nurshing_temp"),

                    "para_name" => $this->input->post("para_name"),

                    "para_qualification" => $this->input->post(
                        "para_qualification"
                    ),

                    "para_registration" => $this->input->post(
                        "para_registration"
                    ),

                    "para_temp" => $this->input->post("para_temp"),

                    "pharmacists_name" => $this->input->post(
                        "pharmacists_name"
                    ),

                    "pharmacists_qualification" => $this->input->post(
                        "pharmacists_qualification"
                    ),

                    "pharmacists_registration" => $this->input->post(
                        "pharmacists_registration"
                    ),

                    "pharmacists_temp" => $this->input->post(
                        "pharmacists_temp"
                    ),

                    "administrative_name" => $this->input->post(
                        "administrative_name"
                    ),

                    "administrative_qualification" => $this->input->post(
                        "administrative_qualification"
                    ),

                    "administrative_registration" => $this->input->post(
                        "administrative_registration"
                    ),

                    "administrative_temp" => $this->input->post(
                        "administrative_temp"
                    ),

                    "others_name" => $this->input->post("others_name"),

                    "others_qualification" => $this->input->post(
                        "others_qualification"
                    ),

                    "others_registration" => $this->input->post(
                        "others_registration"
                    ),

                    "others_temp" => $this->input->post("others_temp"),

                    "cat_1" => $this->input->post("cat_1"),

                    "totl_1" => $this->input->post("totl_1"),

                    "remark_1" => $this->input->post("remark_1"),

                    "cat_2" => $this->input->post("cat_2"),

                    "totl_2" => $this->input->post("totl_2"),

                    "remark_2" => $this->input->post("remark_2"),

                    "cat_3" => $this->input->post("cat_3"),

                    "totl_3" => $this->input->post("totl_3"),

                    "remark_3" => $this->input->post("remark_3"),

                    "payment_op" => $this->input->post("payment_op"),

                    "ammount_rs" => $this->input->post("ammount_rs"),

                    "details_rs" => $this->input->post("details_rs"),

                    "recipt_no" => $this->input->post("recipt_no"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    "fileName5" => $fileName5,

                    // 'systems_of_medicine' => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "last_ip" => $this->input->ip_address(),

                    "updated_at" => date("Y-m-d : h:m:s"),

                    "updated_by" => $this->session->userdata("admin_id"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->edit_permanent(
                    $data,

                    urldecrypt($id)
                );

                //               die;

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        "User has been updated successfully!"
                    );

                    redirect(
                        base_url("admin/certificate/permanent_list"),

                        "refresh"
                    );
                }
            }
        } else {
            $data["id"] = $id;

            $data["user"] = $this->Certificate_model->get_permanent_by_id(
                urldecrypt($id)
            );

            // print_r( $data['user'] ); die;

            $data["states"] = $this->location_model->get_states();

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            //$data['districts_person'] = $this->location_model->get_districts_by_state_id($data['user']['state_person']);

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/permanent_edit", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function permanent_preview($id)
    {
        $this->rbac->check_operation_access(); // check opration permission

        $data["id"] = $id;

        $data["user"] = $this->Certificate_model->get_permanent_by_id(
            urldecrypt($id)
        );

        // print_r( $data['user'] ); die;

        $data["states"] = $this->location_model->get_states();

        $data["districts"] = $this->location_model->get_districts_by_state_id(
            $data["user"]["state"]
        );

        $data[
            "districts_owner"
        ] = $this->location_model->get_districts_by_state_id(
            $data["user"]["state_owner"]
        );

        $data["ownership_level"] = get_ownership_level1();

        $id = $data["user"]["ownership"];

        $con = ["parent_id" => $id, "status" => 1];

        $table_name = "ci_ownership_type";

        $sel_col = ["id", "name"];

        $data["ownership_level2"] = $this->Certificate_model->getData(
            $table_name,

            $sel_col,
            $con,
            ""
        );

        $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

        $data["medical_degree"] = get_medical_degree_tree(0);

        $this->load->view("admin/includes/_header");

        $this->load->view("admin/certificate/permanent_preview", $data);

        $this->load->view("admin/includes/_footer");
    }

    public function permanent_list_data()
    {
        $data["info"] = $this->Certificate_model->get_all_premanent();

        $this->load->view("admin/certificate/permanent_list", $data);
    }

    public function get_renew_data_ref_permanent($id)
    {
        $q = $this->Certificate_model->get_permanent_log($id);

        echo '<table class="table">



            <thead>



            <tr>



            <th scope="col">Name of Establishment</th>



            <th scope="col">Status</th>







            <th scope="col">Modified Date</th>



            </tr>



            </thead>



            <tbody>



            ';

        foreach ($q as $key => $value) {
            echo '<tr>







            <td>' .
                $value["establisment_name"] .
                '</td>



            <td>' .
                FILE_MOVEMENT[$value["file_movement"]] .
                '</td>



            <td>' .
                $value["modified_at"] .
                '</td>



            </tr>



            ';
        }

        echo "</tbody> </table>";
    }

    public function downolad_pramanent_pdf($folder, $fileName, $id)
    {
        $id = urldecrypt($id);

        $result = $this->Certificate_model->get_pramanent_file_name_by_id(
            $fileName,

            $id
        );

        //print_r( $result); die;

        //Set the time out

        set_time_limit(0);

        //path to the file

        if (isset($result[0]) && $result[0]->$fileName != "") {
            $file_path =
                FCPATH .
                "uploads/images/" .
                $folder .
                "/" .
                $result[0]->$fileName;

            //Call the download function with file path,file name and file type

            if (file_exists($file_path)) {
                $this->output_file(
                    $file_path,
                    $fileName . ".pdf",

                    "application/pdf"
                );

                $data["msg"] = "File downloaded successfully";
            } else {
                $data["msg"] = "No Physical File found";
            }
        } else {
            $data["msg"] = "No File uploded for this option";
        }

        echo $data["msg"];
    }

    public function permanent_info()
    {
        //$this->Certificate_model->get_provisional_FM_by_id($provisional_id);

        if (!empty($this->input->post("prov_id"))) {
            $id = $this->input->post("prov_id");

            $getdatas = $this->Certificate_model->getData(
                "ci_certificate_permanent",

                "*",
                ["id" => $id]
            );

            //             print_r($getdatas); die;

            $response = "<table border='0' width='100%'>";

            $response .=
                "<tr> <td>S.No.</td><td>Date</td><td>File Movement</td><td>Action By</td><td>Remarks</td>";

            $i = 1;

            // while ($i <= 5) {

            foreach ($getdatas as $key => $value) {
                // $getdd = $this->Certificate_model->getData('ci_certificate_provisional',['action_dra', 'remark_dra'],['ci_provision_remarks' => $id], $id);

                $id = "id";

                $emp_name = $value["created_at"];

                $salary = $value["file_movement"];

                $gender = $value["action_dra"];

                $city = $value["remark_dra"];

                // $email = $value['empname'];

                $response .= "<tr>";

                $response .= "<td>" . $emp_name . "</td>";

                $response .= "<td>" . $salary . "</td>";

                $response .= "<td>" . $gender . "</td>";

                $response .= "<td>" . $city . "</td>";

                // $response .= "<td>" . $email . "</td>";

                $response .= "</tr>";

                //$i++;
            }

            $response .= "</table>";

            echo $response;

            exit();
        }
    }

    public function renew_permanent_from($id)
    {
        $pro = $this->db
            ->select("*")
            ->from("ci_certificate_permanent")
            ->where("id", urldecrypt($id))
            ->get()
            ->row()->pro_id;

        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(",", $this->input->post("systems_of_medicine"))
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(",", $this->input->post("clinical_establishment"))
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Renew Application" ? "8" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",
                "trim|required"
            );

            //           $this->form_validation->set_rules('systems_of_medicine', 'Systems of Medicine', 'required');

            //           $this->form_validation->set_rules('clinical_services', 'Clinical Services', 'required');

            //           $this->form_validation->set_rules('clinical_establishment', 'Clinical Establishment', 'required');

            //           $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/certificate/re_new_permanent/" . $id),
                    "refresh"
                );
            } else {
                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/permanent/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $Date = date("Y-m-d");

                $expire_date = date("Y-m-d", strtotime($Date . " + 45 days"));

                $status = "1";

                $renew_number =
                    "Renew-P" .
                    "/" .
                    $_SESSION["state_id"] .
                    "/" .
                    substr($_SESSION["district_id"], 1, 3) .
                    "/" .
                    mt_rand(1, 99999);

                $data = [
                    "pro_id" => $pro,

                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "certificate_number" => $renew_number,

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "address1" => $this->input->post("address1"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "area_establishmet" => $this->input->post(
                        "area_establishmet"
                    ),

                    "constructed_area" => $this->input->post(
                        "constructed_area"
                    ),

                    "opd_clinics" => $this->input->post("opd_clinics"),

                    "serial_no1" => $this->input->post("serial_no1"),

                    "specialty_no1" => $this->input->post("specialty_no1"),

                    "serial_no2" => $this->input->post("serial_no2"),

                    "specialty_no2" => $this->input->post("specialty_no2"),

                    "serial_no3" => $this->input->post("serial_no3"),

                    "serial_no4" => $this->input->post("serial_no4"),

                    "specialty_no4" => $this->input->post("specialty_no4"),

                    "totalbeds" => $this->input->post("totalbeds"),

                    "serial_no5" => $this->input->post("serial_no5"),

                    "specialty_no5" => $this->input->post("specialty_no5"),

                    "specialty_bed1" => $this->input->post("specialty_bed1"),

                    "serial_no6" => $this->input->post("serial_no6"),

                    "specialty_no6" => $this->input->post("specialty_no6"),

                    "specialty_bed2" => $this->input->post("specialty_bed2"),

                    "serial_no7" => $this->input->post("serial_no7"),

                    "specialty_no7" => $this->input->post("specialty_no7"),

                    "specialty_bed3" => $this->input->post("specialty_bed3"),

                    "serial_no8" => $this->input->post("serial_no8"),

                    "specialty_no8" => $this->input->post("specialty_no8"),

                    "specialty_bed4" => $this->input->post("specialty_bed4"),

                    "serial_no9" => $this->input->post("serial_no9"),

                    "specialty_no9" => $this->input->post("specialty_no9"),

                    "specialty_bed5" => $this->input->post("specialty_bed5"),

                    "common_facility" => $this->input->post("common_facility"),

                    "w3review" => $this->input->post("w3review"),

                    "auth_yes" => $this->input->post("auth_yes"),

                    "permanent_staff" => $this->input->post("permanent_staff"),

                    "temporary_staff" => $this->input->post("temporary_staff"),

                    "doctor_name" => $this->input->post("doctor_name"),

                    "doctor_qualification" => $this->input->post(
                        "doctor_qualification"
                    ),

                    "doctor_registration" => $this->input->post(
                        "doctor_registration"
                    ),

                    "doctor_temp" => $this->input->post("doctor_temp"),

                    "nurshing_name" => $this->input->post("nurshing_name"),

                    "nurshing_qualification" => $this->input->post(
                        "nurshing_qualification"
                    ),

                    "nurshing_registration" => $this->input->post(
                        "nurshing_registration"
                    ),

                    "nurshing_temp" => $this->input->post("nurshing_temp"),

                    "para_name" => $this->input->post("para_name"),

                    "para_qualification" => $this->input->post(
                        "para_qualification"
                    ),

                    "para_registration" => $this->input->post(
                        "para_registration"
                    ),

                    "para_temp" => $this->input->post("para_temp"),

                    "pharmacists_name" => $this->input->post(
                        "pharmacists_name"
                    ),

                    "pharmacists_qualification" => $this->input->post(
                        "pharmacists_qualification"
                    ),

                    "pharmacists_registration" => $this->input->post(
                        "pharmacists_registration"
                    ),

                    "pharmacists_temp" => $this->input->post(
                        "pharmacists_temp"
                    ),

                    "administrative_name" => $this->input->post(
                        "administrative_name"
                    ),

                    "administrative_qualification" => $this->input->post(
                        "administrative_qualification"
                    ),

                    "administrative_registration" => $this->input->post(
                        "administrative_registration"
                    ),

                    "administrative_temp" => $this->input->post(
                        "administrative_temp"
                    ),

                    "others_name" => $this->input->post("others_name"),

                    "others_qualification" => $this->input->post(
                        "others_qualification"
                    ),

                    "others_registration" => $this->input->post(
                        "others_registration"
                    ),

                    "others_temp" => $this->input->post("others_temp"),

                    "cat_1" => $this->input->post("cat_1"),

                    "totl_1" => $this->input->post("totl_1"),

                    "remark_1" => $this->input->post("remark_1"),

                    "cat_2" => $this->input->post("cat_2"),

                    "totl_2" => $this->input->post("totl_2"),

                    "remark_2" => $this->input->post("remark_2"),

                    "cat_3" => $this->input->post("cat_3"),

                    "totl_3" => $this->input->post("totl_3"),

                    "remark_3" => $this->input->post("remark_3"),

                    "payment_op" => $this->input->post("payment_op"),

                    "ammount_rs" => $this->input->post("ammount_rs"),

                    "details_rs" => $this->input->post("details_rs"),

                    "recipt_no" => $this->input->post("recipt_no"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    // 'fileName5' => $fileName5,

                    "systems_of_medicine" => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "status" => $status,

                    "renew_status" => $renew_number,

                    "last_ip" => $this->input->ip_address(),

                    "created_at" => date("Y-m-d : h:m:s"),

                    "created_by" => $this->session->userdata("admin_id"),
                ];

                // $data = $this->security->xss_clean($data);

                // $result = $this->Certificate_model->edit_permanent($data, urldecrypt($id));

                // //               die;

                $data2 = [
                    "status" => "0",

                    "renew_status" => $renew_number,
                ];

                $dataUpdate1 = [
                    "refre_id" => $id,

                    "pro_id" => $pro,

                    "file_movement" => $file_movement,

                    "establisment_name" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "modified_at" => date("Y-m-d h:m:s"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->db->insert("ci_certificate_permanent", $data);

                // ref_id

                $data["ref_id"] = $this->db->insert_id();

                $result = $this->db->insert(
                    "ci_certificate_permanent_renew",
                    $data
                );

                $result = $this->Certificate_model->edit_permanent_renew(
                    $data2,
                    urldecrypt($id)
                );

                $result = $this->db->insert("permanent_log", $dataUpdate1);

                if ($result) {
                    $this->session->set_flashdata(
                        "success",
                        "User has been updated successfully!"
                    );

                    redirect(
                        base_url("admin/certificate/permanent_list"),
                        "refresh"
                    );
                }
            }
        } else {
            $data["id"] = $id;

            $data["user"] = $this->Certificate_model->get_permanent_by_id(
                urldecrypt($id)
            );

            // print_r( $data['user'] ); die;

            $data["states"] = $this->location_model->get_states();

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            //$data['districts_person'] = $this->location_model->get_districts_by_state_id($data['user']['state_person']);

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,
                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/re_new_permanent", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function add_remark_permanent($permanent_id)
    {
        if ($this->input->post("submit")) {
            $action =
                $this->input->post("action_dra") .
                "/" .
                $this->input->post("admin_role_id") .
                "/" .
                now();

            $up_arr = [];

            $actiontaken = $this->input->post("action_dra");

            $pro_id = $this->db
                ->select("pro_id")
                ->from("ci_certificate_permanent")
                ->where("id", $permanent_id)
                ->get()
                ->row()->pro_id;

            $data = [
                "pro_id" => $pro_id,

                "permanent_id" => $this->input->post("permanent_id"),

                "admin_role_id" => $this->input->post("admin_role_id"),

                "action_dra" => $action,

                "remark_dra" => $this->input->post("remark_dra"),

                "last_ip" => $this->input->ip_address(),

                "created_at" => date("Y-m-d h:m:s"),

                "created_by" => $this->session->userdata("admin_id"),
            ];

            $dataUpdate = [
                "id" => $this->input->post("permanent_id"),

                "file_movement" => $this->input->post("action_dra"),

                "remark_dra" => $this->input->post("remark_dra"),

                // 'renew_status' => $this->input->post('renew_status'),

                "updated_at" => date("Y-m-d h:m:s"),

                "updated_by" => $this->session->userdata("admin_id"),
            ];

            $dataUpdate1 = [
                "pro_id" => $pro_id,

                "refre_id" => $provisional_id,

                "file_movement" => $this->input->post("action_dra"),

                "modified_at" => date("Y-m-d h:m:s"),
            ];

            if ($actiontaken == 3 || $actiontaken == 5) {
                if ($actiontaken == 3) {
                    $app_status = "0";
                }

                if ($actiontaken == 5) {
                    $app_status = "1";
                }

                $up_arr = ["approved_status" => $app_status];
            }

            $permanent_id = $this->input->post("permanent_id");

            $this->db
                ->where(["id" => $permanent_id])
                ->update("ci_certificate_permanent", $up_arr);

            $data = $this->security->xss_clean($data);

            $dataUpdate = $this->security->xss_clean($dataUpdate);

            $dataUpdate1 = $this->security->xss_clean($dataUpdate1);

            $admin_role_id = $this->input->post("admin_role_id");

            $result = $this->Certificate_model->add_action_pra(
                $data,
                $dataUpdate,
                $permanent_id
            );

            $result = $this->Certificate_model->permanent_log($dataUpdate1);

            if ($result) {
                $this->session->set_flashdata(
                    "success",
                    "Status Updated Successfully !! "
                );

                redirect(
                    base_url("admin/certificate/permanent_list"),
                    "refresh"
                );
            }
        } else {
            $permanent_id = urldecrypt($permanent_id);

            // $permanent_id = ($permanent_id);

            $data["permanent_id"] = $permanent_id;

            $data["user"] = $this->Certificate_model->get_permanent_by_id(
                $permanent_id
            );

            $data[
                "remarks"
            ] = $this->Certificate_model->get_remarks_by_permanent_id(
                $permanent_id
            );

            $data["states"] = $this->location_model->get_states();

            $data["ownership_level"] = get_ownership_level1();

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/permanent_dra", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function deaction_hospital_permanent($id)
    {
        // print_r("expression"); die();

        $deactivate_data = $this->Certificate_model->get_pro_staus($id);

        // $id = $deactivate_data['id'];

        // $stats = $deactivate_data['is_active'];

        $s = "0";

        $data = [
            "status" => $s,

            "deacti_status" => "Deactivated",

            "updated_at" => date("Y-m-d h:m:s"),
        ];

        $this->db->where("id", $id)->update("ci_certificate_permanent", $data);

        echo 1;

        // redirect('admin/dashboard');

        exit();
    }

    public function pdf_create_permanent($id)
    {
        $q = $this->db
            ->select("*")
            ->from("ci_certificate_permanent")
            ->where("id", urldecrypt($id))
            ->get()
            ->row_array();

        // print_r( $q); die();

        $state_id = $this->db
            ->select("state_symbol")
            ->from("ci_states")
            ->where("id", $q["state"])
            ->get()
            ->row("state_symbol");

        // print_r($state_id); die();

        $q1 = date("Y/m/d");

        // print_r($q); die();

        $this->load->library("Pdf");

        // create new PDF document

        $pdf = new TCPDF(
            PDF_PAGE_ORIENTATION,
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            "UTF-8",
            false
        );

        $pdf = new TCPDF("L", "pt", ["format" => "A4", "Rotate" => 360]);

        $header_file_string =
            "The Clinical Establishments (Registration and Regulation) ACT, 2010)";

        $footer_string = "";

        // set document information

        $pdf->SetCreator("Cerrs Certificate");

        $pdf->SetHeaderData("logo.png", 15, "", $header_file_string, "");

        $pdf->setFooterData($footer_string);

        // set header and footer fonts

        $pdf->setHeaderFont(["helvetica", "", 8]);

        $pdf->setFooterFont(["helvetica", "", 8]);

        // set default monospaced font

        $pdf->SetDefaultMonospacedFont("courier");

        // set margins

        $pdf->SetMargins(15, 25, 15);

        $pdf->SetHeaderMargin(5);

        $pdf->SetFooterMargin(15, 17, 15);

        // set auto page breaks

        $pdf->SetAutoPageBreak(true, 15);

        // set image scale factor

        $pdf->setImageScale(1.25);

        $pdf->SetAuthor("CERRS");

        $pdf->SetTitle("CERRS Certificate");

        $pdf->SetSubject("Certificate");

        $pdf->SetKeywords("Certificate");

        // set font

        $pdf->SetFont("helvetica", "B", 10);

        // add a page

        $pdf->AddPage();

        $pdf->SetFont("helvetica", "", 10);

        // -----------------------------------------------------------------------------

        $tbl = "";

        $tbl .=
            '<html lang="en">



<head>



    <meta charset="UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">



    <!-- Bootstrap CSS



    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />



    <link href="assets/css/style.css" rel="stylesheet" /> -->



    <title>Document</title>



   



</head>



<body style="margin: 0; line-height: 1.5;">



    <div class="certificate-wrap">



        <div class="container" style="max-width: 1140px; padding: 0 15px; margin: 0 auto">



            <div class="row">



                <div class="col-md-12" style="width: 100%; padding: 0 15px;">



                    <div class="certificate-content" style="padding: 20px 0; border: 4px solid #000;">



                        <div class="top-content" style="margin: 0 20px;">



                            <div class="d-flex justify-content-between" style="clear: both; overflow: hidden; width: 100%;">



                                <p style="font-size: 14px; font-style: italic; margin: 0; color: #000; float: left;">



                                    S. No. <span  style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @$q["pro_id"] .
            '</span>



                                </p>



                                <p style="font-size: 14px; font-style: italic; margin: 0; color: #000; float: right;">



                                    Permanent Registration No. <span  style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @$q["certificate_number"] .
            '</span>



                                </p>



                            </div>



                        </div>



                        <div class="text-center" style="text-align: center; margin: 0 20px;">



                            <div class="state-heading" style="padding: 15px 0;">



                                <h3 style="margin: 0; color: #000; line-height: 1.5; font-size: 20px; font-weight: 500;">







                               <img  src="http://localhost/new_cerss/assets/dist/img/' .
            $state_id .
            '" width="100">







                              </h3>



                               



                                <h2 style="margin: 0; color: #000; font-size: 24px; font-weight: 500; line-height: 1.2;">



                                    Government of <span style="font-size: 20px; color: #cf8a87; font-style: italic;">' .
            @get_state_name($q["state"]) .
            ',</span>



                                </h2>



                            </div>



                            <h3 style="margin: 0; color: #000; font-size: 20px; font-weight: 500; margin: 0 0 20px 0; ">



                                District Registering Authority, <span style="font-size: 16px; color: #cf8a87; font-style: italic; padding: 15px 0;">' .
            @get_city_name($q["district"]) .
            '</span>



                            </h3>



                            



                            <div class="main-heading">



                                <h2 style="font-size: 22px; font-weight: 600; margin: 0; color: #000; line-height: 1.2;">



                                    CERTIFICATE OF PERMANENT REGISTRATION



                                </h2>



                            </div>



                        </div>



                        <div class="main-content text-start" style="text-align: left; margin: 0 20px;">



                            <p style="line-height: 2; font-weight: 600; font-size: 16px; padding: 15px 0; margin: 0; color: #000;">



                                This is to certify that <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @$q["establishment"] .
            ' 



                                <span style="font-size: 14px; color: #000; ">located at</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @$q["address1"] .
            ", " .
            @get_city_name($q["district"]) .
            ', 



                               ' .
            @get_state_name($q["state"]) .
            '</span> 



                                <span style="font-size: 14px; color: #000; ">owned by</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @$q["fname_owner"] .
            " " .
            @$q["mname_owner"] .
            " " .
            @$q["lname_owner"] .
            '</span> <span style="font-size: 14px; color: #000; ">has been granted permanent registration as a clinical establishment under section 30 of </span>



                                <span class="text-underline" style="font-size: 22px; text-decoration: underline; color:#000">The Clinical Establishments (Registration and Regulation) Act, 2010.</span><span style="font-size: 14px; color: #000; "> The Clinical Establishment is registered for providing medical services as a</span>



                                <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @get_establishment_name($q["clinical_establishment"]) .
            '</span> <span style="font-size: 14px; color: #000; "> under</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            @get_system_med_name($q["systems_of_medicine"]) .
            '</span>



                                <span style="font-size: 14px; color: #000; ">system of medicine.</span>



                            </p>



                            <p style="line-height: 2; font-weight: 600; font-size: 16px; margin: 0;color: #000;"><span class="right-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>This Certificate is valid for a period of five years from the date of issue.</p>



                        </div>



                        <div class="designation-content" style="clear: both; overflow: hidden; width: 100%;">



                            <div class="text-center" style="margin: 0 20px; text-align: center; float: right; clear: both; overflow: hidden;">



                                <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">Designation of the Issuing Authority</p>



                                <span  style="font-size: 14px; color: #cf8a87; font-style: italic;"> DRA ' .
            @get_city_name($q["district"]) .
            '</span>



                            </div>



                        </div>



                        <div class="place-content text-start" style="text-align: left; margin: 0 20px;">



                            <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">



                                Place 



                                <span  style="font-size: 14px; color: #cf8a87; font-style: italic; text-decoration: underline; font-weight: 500;">



                                    ' .
            @get_city_name($q["district"]) .
            '



                                </span>



                            </p>



                            <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">



                                Date of Issue 



                                <span style="font-size: 14px; color: #cf8a87; font-style: italic; text-decoration: underline; font-weight: 500;">



                                    ' .
            @$q["updated_at"] .
            '



                                </span>



                            </p>



                        </div>



                        <div class="text-end" style="text-align: right; margin: 0 20px;">



                            <div class="certificate-no">



                               <!-- <span>54</span>-->



                            </div>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div>



</body>



</html>';

        $tbl .= "";

        print_r($tbl);

        die();

        $pdf->writeHTML($tbl, true, false, false, false, "");

        ob_end_clean();

        $pdf->Output("permanent_certificate" . ".pdf", "D");
    }

    /*Provisiona Code Statrts Here*/

    public function provisional_list()
    {
        $this->rbac->check_operation_access();

        $data["states"] = $this->location_model->get_states();

        if (isset($_SESSION["state_id"]) && $_SESSION["state_id"] != "") {
            $data["districts"] = get_state_cities($_SESSION["state_id"]);
        }

        $data["title"] = "Provisional List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/certificate/provisional_index", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    public function provisional_list_data()
    {
        $data["info"] = $this->Certificate_model->get_all_provisional();

        $this->load->view("admin/certificate/provisional_list", $data);
    }

    public function provisional()
    {
        if ($this->input->post("submit")) {
            //

            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(
                    ",",

                    $this->input->post("systems_of_medicine")
                )
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(
                    ",",

                    $this->input->post("clinical_establishment")
                )
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Apply" ? "2" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "address1",
                "Address1",

                "trim|required"
            );

            $this->form_validation->set_rules("state", "State", "required");

            //            $this->form_validation->set_rules('district_establishment', 'District', 'required');

            $this->form_validation->set_rules("pin", "Pin", "trim|required");

            $this->form_validation->set_rules("std", "Std", "trim|required");

            $this->form_validation->set_rules(
                "telephone",
                "Telephone",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "mobile",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules("fax", "Fax", "trim|required");

            $this->form_validation->set_rules(
                "email",
                "Email",

                "trim|valid_email|required"
            );

            $this->form_validation->set_rules(
                "fname_owner",
                "First Name",

                "required"
            );

            $this->form_validation->set_rules(
                "lname_owner",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "add1_owner",
                "Address ",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "state_owner",
                "State",
                "required"
            );

            //            $this->form_validation->set_rules('district_owner', 'District', 'required');

            $this->form_validation->set_rules(
                "mobile_owner",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "fname_person",
                "First Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "lname_person",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "ownership",
                "Ownership",

                "required"
            );

            //            if (empty($_FILES['fileName1']['name'])) {

            //                $this->form_validation->set_rules('fileName1', 'fileName1', 'required');

            //            }

            //             if (empty($_FILES['fileName2']['name'])) {

            //                $this->form_validation->set_rules('fileName2', 'fileName2', 'required');

            //            }

            //             if (empty($_FILES['fileName3']['name'])) {

            //                $this->form_validation->set_rules('fileName3', 'fileName3', 'required');

            //            }

            //             if (empty($_FILES['fileName4']['name'])) {

            //                $this->form_validation->set_rules('fileName4', 'fileName4', 'required');

            //            }

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(base_url("admin/certificate/provisional/"), "refresh");
            } else {
                // Code to file uplodde move_uploaded_file

                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $certificate_number =
                    "Prov/" .
                    $this->input->post("state") .
                    "/" .
                    $this->input->post("district") .
                    "/" .
                    now();

                $pro_id = now();

                $Date = date("Y-m-d h:m:s");

                $expire_date = date(
                    "Y-m-d h:m:s",
                    strtotime($Date . "+1 days")
                );

                $status = "1";

                $data = [
                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "certificate_number" => $this->input->post(
                        "certificate_number"
                    ),

                    "provisional_number" => $certificate_number,

                    "pro_id" => $pro_id,

                    "admin_id" => $this->input->post("admin_id"),

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "address1" => $this->input->post("address1"),

                    "type_fee" => $this->input->post("type_fee"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "fee_total" => $this->input->post("fee_total"),

                    "fee_display" => $this->input->post("fee_display"),

                    "beds" => $this->input->post("beds"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    "fileName5" => $fileName5,

                    "systems_of_medicine" => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "status" => $status,

                    "expire_date" => $expire_date,

                    "created_at" => date("Y-m-d h:m:s"),

                    "last_ip" => $this->input->ip_address(),

                    "created_by" => $this->session->userdata("admin_id"),
                ];

                $dataUpdate = [
                    "pro_id" => $pro_id,

                    "file_movement" => $file_movement,

                    "establisment_name" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "modified_at" => date("Y-m-d h:m:s"),
                ];

                $data = $this->security->xss_clean($data);

                $dataUpdate = $this->security->xss_clean($dataUpdate);

                // print_r($data ); die();

                $result = $this->Certificate_model->add_provisional($data);

                $dataUpdate["refre_id"] = $this->db->insert_id();

                $result = $this->Certificate_model->provisional_log(
                    $dataUpdate
                );

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        'Request for "Provisional Certificate" has been add successfully!'
                    );

                    redirect(
                        base_url("admin/certificate/provisional_list"),

                        "refresh"
                    );
                }
            }
        } else {
            $data["states"] = $this->location_model->get_states();

            $data["get_city_by_state_id"] = $this->location_model->get_states();

            $data["ownership_level"] = get_ownership_level1();

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["random_number"] = get_new_certifecate_provisional();

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/provisional", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function edit_provissional($id)
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(
                    ",",

                    $this->input->post("systems_of_medicine")
                )
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(
                    ",",

                    $this->input->post("clinical_establishment")
                )
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Apply" ? "2" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "address1",
                "Address1",

                "trim|required"
            );

            $this->form_validation->set_rules("state", "State", "required");

            $this->form_validation->set_rules("pin", "Pin", "trim|required");

            $this->form_validation->set_rules("std", "Std", "trim|required");

            $this->form_validation->set_rules(
                "telephone",
                "Telephone",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "mobile",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules("fax", "Fax", "trim|required");

            $this->form_validation->set_rules(
                "email",
                "Email",

                "trim|valid_email|required"
            );

            $this->form_validation->set_rules(
                "fname_owner",
                "First Name",

                "required"
            );

            $this->form_validation->set_rules(
                "lname_owner",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "add1_owner",
                "Address ",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "state_owner",
                "State",
                "required"
            );

            $this->form_validation->set_rules(
                "mobile_owner",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "fname_person",
                "First Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "lname_person",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "ownership",
                "Ownership",

                "required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/certificate/edit_provissional/" . $id),

                    "refresh"
                );
            } else {
                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $data = [
                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "address1" => $this->input->post("address1"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "fee_total" => $this->input->post("fee_total"),

                    "fee_display" => $this->input->post("fee_display"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    "fileName5" => $fileName5,

                    // 'systems_of_medicine' => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "last_ip" => $this->input->ip_address(),

                    "updated_at" => date("Y-m-d : h:m:s"),

                    "updated_by" => $this->session->userdata("admin_id"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->edit_provisional(
                    $data,

                    urldecrypt($id)
                );

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        "User has been updated successfully!"
                    );

                    redirect(
                        base_url("admin/certificate/provisional_list"),

                        "refresh"
                    );
                }
            }
        } else {
            $data["id"] = urldecrypt($id); //$id;

            $data["user"] = $this->Certificate_model->get_provisional_by_id(
                urldecrypt($id)
            );

            $data["states"] = $this->location_model->get_states();

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["medical_catogory_1"] = get_medical_degree_tree(
                $data["user"]["degree"]
            );

            $data["medical_catogory_2"] = get_medical_degree_tree(
                $data["user"]["catogory_1"]
            );

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/provisional_edit", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function provissional_preview($id)
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(
                    ",",

                    $this->input->post("systems_of_medicine")
                )
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(
                    ",",

                    $this->input->post("clinical_establishment")
                )
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Apply" ? "2" : "1";

            $this->form_validation->set_rules(
                "establishment",
                "Establishment",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "address1",
                "Address1",

                "trim|required"
            );

            $this->form_validation->set_rules("state", "State", "required");

            $this->form_validation->set_rules("pin", "Pin", "trim|required");

            $this->form_validation->set_rules("std", "Std", "trim|required");

            $this->form_validation->set_rules(
                "telephone",
                "Telephone",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "mobile",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules("fax", "Fax", "trim|required");

            $this->form_validation->set_rules(
                "email",
                "Email",

                "trim|valid_email|required"
            );

            $this->form_validation->set_rules(
                "fname_owner",
                "First Name",

                "required"
            );

            $this->form_validation->set_rules(
                "lname_owner",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "add1_owner",
                "Address ",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "state_owner",
                "State",
                "required"
            );

            $this->form_validation->set_rules(
                "mobile_owner",
                "Mobile",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "fname_person",
                "First Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "lname_person",
                "Last Name",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "ownership",
                "Ownership",

                "required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/certificate/edit_provissional/" . $id),

                    "refresh"
                );
            } else {
                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName4"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName5"]["name"];

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

                $data = [
                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "address1" => $this->input->post("address1"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    "fileName5" => $fileName5,

                    // 'systems_of_medicine' => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "file_movement" => $file_movement,

                    "last_ip" => $this->input->ip_address(),

                    "updated_at" => date("Y-m-d : h:m:s"),

                    "updated_by" => $this->session->userdata("admin_id"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->edit_provisional(
                    $data,

                    urldecrypt($id)
                );

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        "User has been updated successfully!"
                    );

                    redirect(
                        base_url("admin/certificate/provisional_list"),

                        "refresh"
                    );
                }
            }
        } else {
            $data["id"] = urldecrypt($id); //$id;

            $data["user"] = $this->Certificate_model->get_provisional_by_id(
                urldecrypt($id)
            );

            $data["states"] = $this->location_model->get_states();

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["medical_catogory_1"] = get_medical_degree_tree(
                $data["user"]["degree"]
            );

            $data["medical_catogory_2"] = get_medical_degree_tree(
                $data["user"]["catogory_1"]
            );

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/provisional_preview", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function get_remark()
    {
        $result["data"] = $this->Certificate_model->getremarks_Comments();

        $this->load->view("admin/certificate/provisional_dra", $data);
    }

    public function provisional_info()
    {
        //$this->Certificate_model->get_provisional_FM_by_id($provisional_id);

        if (!empty($this->input->post("prov_id"))) {
            $id = $this->input->post("prov_id");

            $getdatas = $this->Certificate_model->getData(
                "ci_certificate_provisional",

                "*",
                ["id" => $id]
            );

            // print_r($getdatas); die;

            $response = "<table border='0' width='100%'>";

            $response .=
                "<tr> <td>S.No.</td><td>Date</td><td>File Movement</td><td>Action By</td><td>Remarks</td>";

            $i = 1;

            // while ($i <= 5) {

            foreach ($getdatas as $key => $value) {
                // $getdd = $this->Certificate_model->getData('ci_certificate_provisional',['action_dra', 'remark_dra'],['ci_provision_remarks' => $id], $id);

                $id = "id";

                $emp_name = $value["created_at"];

                $salary = $value["file_movement"];

                $gender = $value["action_dra"];

                $city = $value["remark_dra"];

                // $email = $value['empname'];

                $response .= "<tr>";

                $response .= "<td>" . $emp_name . "</td>";

                $response .= "<td>" . $salary . "</td>";

                $response .= "<td>" . $gender . "</td>";

                $response .= "<td>" . $city . "</td>";

                // $response .= "<td>" . $email . "</td>";

                $response .= "</tr>";

                //$i++;
            }

            $response .= "</table>";

            echo $response;

            exit();
        }
    }

    public function downolad_provisional_pdf($folder, $fileName, $id)
    {
        $id = urldecrypt($id);

        $result = $this->Certificate_model->get_provisional_file_name_by_id(
            $fileName,

            $id
        );

        //print_r( $result); die;

        //Set the time out

        set_time_limit(0);

        //        echo  FCPATH . 'uploads/images/' . $folder . '/' . $result[0]->$fileName; die;

        //path to the file

        if (isset($result[0]) && $result[0]->$fileName != "") {
            $file_path =
                FCPATH .
                "uploads/images/" .
                $folder .
                "/" .
                $result[0]->$fileName;

            //Call the download function with file path,file name and file type

            if (file_exists($file_path)) {
                $this->output_file(
                    $file_path,
                    $fileName . ".pdf",

                    "application/pdf"
                );

                $data["msg"] = "File downloaded successfully";
            } else {
                $data["msg"] = "No Physical File found";
            }
        } else {
            $data["msg"] = "No File uploded for this option";
        }

        echo $data["msg"];
    }

    public function add_remark($provisional_id)
    {
        if ($this->input->post("submit")) {
            $action =
                $this->input->post("action_dra") .
                "/" .
                $this->input->post("admin_role_id") .
                "/" .
                now();

            $up_arr = [];

            $actiontaken = $this->input->post("action_dra");

            $pro_id = $this->db
                ->select("pro_id")
                ->from("ci_certificate_provisional")
                ->where("id", $provisional_id)
                ->get()
                ->row()->pro_id;

            $data = [
                "pro_id" => $pro_id,

                "provisional_id" => $this->input->post("provisional_id"),

                "admin_role_id" => $this->input->post("admin_role_id"),

                "action_dra" => $action,

                "remark_dra" => $this->input->post("remark_dra"),

                "last_ip" => $this->input->ip_address(),

                "created_at" => date("Y-m-d h:m:s"),

                "created_by" => $this->session->userdata("admin_id"),
            ];

            $dataUpdate = [
                "id" => $this->input->post("provisional_id"),

                "file_movement" => $this->input->post("action_dra"),

                "remark_dra" => $this->input->post("remark_dra"),

                "updated_at" => date("Y-m-d h:m:s"),

                "updated_by" => $this->session->userdata("admin_id"),
            ];

            // print_r($pro_id); die();

            $dataUpdate1 = [
                "pro_id" => $pro_id,

                "refre_id" => $provisional_id,

                "file_movement" => $this->input->post("action_dra"),

                "modified_at" => date("Y-m-d h:m:s"),
            ];

            if ($actiontaken == 3 || $actiontaken == 5) {
                if ($actiontaken == 3) {
                    $app_status = "0";
                }

                if ($actiontaken == 5) {
                    $app_status = "1";
                }

                $up_arr = ["approved_status" => $app_status];
            }

            $provisional_id = $this->input->post("provisional_id");

            $this->db
                ->where(["id" => $provisional_id])
                ->update("ci_certificate_provisional", $up_arr);

            $data = $this->security->xss_clean($data);

            $dataUpdate = $this->security->xss_clean($dataUpdate);

            $dataUpdate1 = $this->security->xss_clean($dataUpdate1);

            $admin_role_id = $this->input->post("admin_role_id");

            $result = $this->Certificate_model->add_action(
                $data,
                $dataUpdate,

                $provisional_id
            );

            $result = $this->Certificate_model->provisional_log($dataUpdate1);

            if ($result) {
                $this->session->set_flashdata(
                    "success",

                    "Status Updated Successfully !! "
                );

                redirect(
                    base_url("admin/certificate/provisional_list"),

                    "refresh"
                );
            }
        } else {
            $provisional_id = urldecrypt($provisional_id);

            $data["provisional_id"] = $provisional_id;

            $data["user"] = $this->Certificate_model->get_provisional_by_id(
                $provisional_id
            );

            // print_r($data['user']); die();

            $data[
                "remarks"
            ] = $this->Certificate_model->get_remarks_by_provisional_id(
                $provisional_id
            );

            $data["states"] = $this->location_model->get_states();

            $data["ownership_level"] = get_ownership_level1();

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,
                $con,
                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["medical_catogory_1"] = get_medical_degree_tree(
                $data["user"]["degree"]
            );

            $data["medical_catogory_2"] = get_medical_degree_tree(
                $data["user"]["catogory_1"]
            );

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/provisional_dra", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function renew_provisional_from($id)
    {
        $pro = $this->db
            ->select("*")
            ->from("ci_certificate_provisional")
            ->where("id", urldecrypt($id))
            ->get()
            ->row()->pro_id;

        // $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post("submit")) {
            $systems_of_medicine = $this->input->post("systems_of_medicine")
                ? implode(
                    ",",

                    $this->input->post("systems_of_medicine")
                )
                : "";

            $clinical_establishment = $this->input->post(
                "clinical_establishment"
            )
                ? implode(
                    ",",

                    $this->input->post("clinical_establishment")
                )
                : "";

            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement =
                $this->input->post("submit") == "Renew Application" ? "8" : "1";

            $this->form_validation->set_rules(
                "establishment",

                "Establishment",

                "trim|required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/certificate/renew_provisional_from/" . $id),

                    "refresh"
                );
            } else {
                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName1"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName2"]["name"];

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
                    $config["upload_path"] = "uploads/images/provisional/";

                    $config["allowed_types"] = "pdf";

                    $config["file_name"] =
                        time() . "-" . $_FILES["fileName3"]["name"];

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

                $Date = date("Y-m-d : h:m:s");

                $expire_date = date(
                    "Y-m-d : h:m:s",
                    strtotime($Date . " + 45 days")
                );

                $status = "1";

                $renew_number =
                    "Renew" .
                    "/" .
                    $_SESSION["state_id"] .
                    "/" .
                    substr($_SESSION["district_id"], 1, 3) .
                    "/" .
                    mt_rand(1, 99999);

                $data = [
                    "pro_id" => $pro,

                    "status" => $status,

                    "renew_status" => $renew_number,

                    "establishment" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "certificate_number" => $renew_number,

                    "appication_mode" => $this->test_input(
                        $this->input->post("appication_mode")
                    ),

                    "admin_id" => $this->input->post("admin_id"),

                    "address1" => $this->input->post("address1"),

                    "address2" => $this->input->post("address2"),

                    "city" => $this->input->post("city"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "pin" => $this->input->post("pin"),

                    "std" => $this->input->post("std"),

                    "telephone" => $this->input->post("telephone"),

                    "mobile" => $this->input->post("mobile"),

                    "fax" => $this->input->post("fax"),

                    "email" => $this->input->post("email"),

                    "website" => $this->input->post("website"),

                    "fname_owner" => $this->input->post("fname_owner"),

                    "mname_owner" => $this->input->post("mname_owner"),

                    "lname_owner" => $this->input->post("lname_owner"),

                    "add1_owner" => $this->input->post("add1_owner"),

                    "add2_owner" => $this->input->post("add2_owner"),

                    "city_owner" => $this->input->post("city_owner"),

                    "state_owner" => $this->input->post("state_owner"),

                    "district_owner" => $this->input->post("district_owner"),

                    "pin_owner" => $this->input->post("pin_owner"),

                    "std__owner" => $this->input->post("std__owner"),

                    "telephone_owner" => $this->input->post("telephone_owner"),

                    "mobile_owner" => $this->input->post("mobile_owner"),

                    "fax_owner" => $this->input->post("fax_owner"),

                    "email_owner" => $this->input->post("email_owner"),

                    "website_owner" => $this->input->post("website_owner"),

                    "fname_person" => $this->input->post("fname_person"),

                    "mname_person" => $this->input->post("mname_person"),

                    "lname_person" => $this->input->post("lname_person"),

                    "degree" => $this->input->post("degree"),

                    "catogory_1" => $this->input->post("catogory_1"),

                    "catogory_2" => $this->input->post("catogory_2"),

                    "fee_total" => $this->input->post("fee_total"),

                    "fee_display" => $this->input->post("fee_display"),

                    "person_registration" => $this->input->post(
                        "person_registration"
                    ),

                    "person_central_cauncil" => $this->input->post(
                        "person_central_cauncil"
                    ),

                    "std_person" => $this->input->post("std_person"),

                    "telephone_person" => $this->input->post(
                        "telephone_person"
                    ),

                    "mobile_person" => $this->input->post("mobile_person"),

                    "email_person" => $this->input->post("email_person"),

                    "website_person" => $this->input->post("website_person"),

                    "ownership" => $this->input->post("ownership"),

                    "ownership2" => $this->input->post("ownership2"),

                    "beds" => $this->input->post("beds"),

                    "fileName1" => $fileName1,

                    "fileName2" => $fileName2,

                    "fileName3" => $fileName3,

                    "fileName4" => $fileName4,

                    // 'fileName5' => $fileName5,

                    "systems_of_medicine" => $systems_of_medicine,

                    "clinical_services" => $this->input->post(
                        "clinical_services"
                    ),

                    "clinical_establishment" => $clinical_establishment,

                    "expire_date" => $expire_date,

                    "renew_date" => $this->input->post("renew_date"),

                    "dec_renew" => $this->input->post("dec_renew"),

                    "file_movement" => $file_movement,

                    "last_ip" => $this->input->ip_address(),

                    "created_at" => date("Y-m-d : h:m:s"),

                    "created_by" => $this->session->userdata("admin_id"),
                ];

                $data2 = [
                    "status" => "0",

                    "renew_status" => $renew_number,
                ];

                $dataUpdate1 = [
                    "refre_id" => $id,

                    "pro_id" => $pro,

                    "file_movement" => $file_movement,

                    "establisment_name" => $this->test_input(
                        $this->input->post("establishment")
                    ),

                    "modified_at" => date("Y-m-d h:m:s"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->db->insert(
                    "ci_certificate_provisional",
                    $data
                );

                $data["ref_id"] = $this->db->insert_id();

                $dataUpdate1["refre_id"] = $this->db->insert_id();

                $result = $this->db->insert(
                    "ci_certificate_provisional_renew",
                    $data
                );

                $result = $this->db->insert("provisional_log", $dataUpdate1);

                $result = $this->Certificate_model->edit_provisional_renew(
                    $data2,
                    urldecrypt($id)
                );

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        "Applied for Renewable of application successfully!"
                    );

                    redirect(
                        base_url("admin/certificate/provisional_list"),

                        "refresh"
                    );
                }
            }
        } else {
            $data["id"] = urldecrypt($id); //$id;

            $data["user"] = $this->Certificate_model->get_provisional_by_id(
                urldecrypt($id)
            );

            $data["states"] = $this->location_model->get_states();

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state"]
            );

            $data[
                "districts_owner"
            ] = $this->location_model->get_districts_by_state_id(
                $data["user"]["state_owner"]
            );

            $data["ownership_level"] = get_ownership_level1();

            $id = $data["user"]["ownership"];

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data["ownership_level2"] = $this->Certificate_model->getData(
                $table_name,

                $sel_col,

                $con,

                ""
            );

            $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

            $data["medical_degree"] = get_medical_degree_tree(0);

            $data["medical_catogory_1"] = get_medical_degree_tree(
                $data["user"]["degree"]
            );

            $data["medical_catogory_2"] = get_medical_degree_tree(
                $data["user"]["catogory_1"]
            );

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/certificate/rew_new_provisional", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function get_renew_data_ref($id)
    {
        $q = $this->Certificate_model->get_proviio_log($id);

        echo '<table class="table">



  <thead>



    <tr>



      



      <th scope="col">Name of Establishment</th>



      <th scope="col">Status</th>



      



      <th scope="col">Modified Date</th>



    </tr>



  </thead>



  <tbody>



  ';

        foreach ($q as $key => $value) {
            echo '<tr>



      



      <td>' .
                $value["establisment_name"] .
                '</td>



      <td>' .
                FILE_MOVEMENT[$value["file_movement"]] .
                '</td>



      <td>' .
                $value["modified_at"] .
                '</td>



    </tr>



    ';
        }

        echo "</tbody> </table>";
    }

    /*provisional Code END here*/

    function change_status()
    {
        $this->rbac->check_operation_access(); // check opration permission

        $this->Certificate_model->change_status();
    }

    public function getOwnership()
    {
        if ($this->input->post()) {
            $id = trim($this->input->post("id"));

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_ownership_type";

            $sel_col = ["id", "name"];

            $data = $this->Certificate_model->getData(
                $table_name,
                $sel_col,

                $con,
                ""
            );

            $html = "";

            if (!empty($data)) {
                $html .= '<option value="0">Select Ownership</option>';

                foreach ($data as $d) {
                    $html .=
                        '<option value="' .
                        $d["id"] .
                        '">' .
                        $d["name"] .
                        "</option>";
                }
            }

            echo json_encode($html);

            exit();
        }
    }

    public function getmedicaldegree()
    {
        if ($this->input->post()) {
            $id = trim($this->input->post("id"));

            $label_name = trim($this->input->post("label_name"));

            $con = ["parent_id" => $id, "status" => 1];

            $table_name = "ci_medical_degree";

            $sel_col = ["id", "name"];

            $data = $this->Certificate_model->getData(
                $table_name,
                $sel_col,

                $con,
                ""
            );

            $html = '<option value="0">Select ' . $label_name . "</option>";

            if (!empty($data)) {
                foreach ($data as $d) {
                    $html .=
                        '<option value="' .
                        $d["id"] .
                        '">' .
                        $d["name"] .
                        "</option>";
                }
            }

            echo $html;
        }
    }

    public function filterdata()
    {
        $this->session->set_userdata(
            "filter_state",
            $this->input->post("state")
        );

        $this->session->set_userdata(
            "filter_district",

            $this->input->post("district")
        );

        $this->session->set_userdata(
            "filter_status",

            $this->input->post("status")
        );

        $this->session->set_userdata(
            "filter_keyword",

            $this->input->post("keyword")
        );
    }

    public function file_upload()
    {
        $config["upload_path"] = "./uploads/";

        $config["allowed_types"] = "jpg|pdf|csv";

        $config["max_size"] = 100;

        $config["max_width"] = 1024;

        $config["max_height"] = 768;

        $this->load->library("upload", $config);

        if (!$this->upload->do_upload("userfile")) {
            $error = ["error" => $this->upload->display_errors()];

            $this->load->view("upload_form", $error);
        } else {
            $data = ["upload_data" => $this->upload->data()];

            $this->load->view("upload_success", $data);
        }
    }

    public function output_file($file, $name, $mime_type = "")
    {
        /*



          This function takes a path to a file to output ($file),  the filename that the browser will see ($name) and  the MIME type of the file ($mime_type, optional).



         */

        //Check the file premission

        //if(!is_readable($file)) die('File not found or inaccessible!');

        $size = filesize($file);

        $name = rawurldecode($name);

        /* Figure out the MIME type | Check in array */

        $known_mime_types = [
            "pdf" => "application/pdf",

            "txt" => "text/plain",

            "html" => "text/html",

            "htm" => "text/html",

            "exe" => "application/octet-stream",

            "zip" => "application/zip",

            "doc" => "application/msword",

            "xls" => "application/vnd.ms-excel",

            "ppt" => "application/vnd.ms-powerpoint",

            "gif" => "image/gif",

            "png" => "image/png",

            "jpeg" => "image/jpg",

            "jpg" => "image/jpg",

            "php" => "text/plain",
        ];

        if ($mime_type == "") {
            $file_extension = strtolower(substr(strrchr($file, "."), 1));

            if (array_key_exists($file_extension, $known_mime_types)) {
                $mime_type = $known_mime_types[$file_extension];
            } else {
                $mime_type = "application/force-download";
            }
        }

        //turn off output buffering to decrease cpu usage

        @ob_end_clean();

        // required for IE, otherwise Content-Disposition may be ignored

        if (ini_get("zlib.output_compression")) {
            ini_set("zlib.output_compression", "Off");
        }

        header("Content-Type: " . $mime_type);

        header('Content-Disposition: attachment; filename="' . $name . '"');

        header("Content-Transfer-Encoding: binary");

        header("Accept-Ranges: bytes");

        /* The three lines below basically make the 



          download non-cacheable */

        header("Cache-control: private");

        header("Pragma: private");

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        // multipart-download and download resuming support

        if (isset($_SERVER["HTTP_RANGE"])) {
            list($a, $range) = explode("=", $_SERVER["HTTP_RANGE"], 2);

            list($range) = explode(",", $range, 2);

            list($range, $range_end) = explode("-", $range);

            $range = intval($range);

            if (!$range_end) {
                $range_end = $size - 1;
            } else {
                $range_end = intval($range_end);
            }

            $new_length = $range_end - $range + 1;

            header("HTTP/1.1 206 Partial Content");

            header("Content-Length: $new_length");

            header("Content-Range: bytes $range-$range_end/$size");
        } else {
            $new_length = $size;

            header("Content-Length: " . $size);
        }

        /* Will output the file itself */

        $chunksize = 1 * (1024 * 1024); //you may want to change this

        $bytes_send = 0;

        if ($file = fopen($file, "r")) {
            if (isset($_SERVER["HTTP_RANGE"])) {
                fseek($file, $range);
            }

            while (
                !feof($file) &&
                !connection_aborted() &&
                $bytes_send < $new_length
            ) {
                $buffer = fread($file, $chunksize);

                print $buffer; //echo($buffer); // can also possible

                flush();

                $bytes_send += strlen($buffer);
            }

            fclose($file);
        }
        //If no permissiion
        else {
            die("Error - can not open file.");
        }

        //die

        die();
    }

    public function totalFeeCount()
    {
        if ($this->input->post()) {
            $stablismentIdBedCount = $this->input->post("all_id");

            //echo $arrSidNbedCout = explode(',', $stablismentIdBedCount);

            $html = "";

            $totalFee = 0;

            foreach ($stablismentIdBedCount as $val) {
                $val = explode("#", $val);

                $stabId = $val[0];

                $bedCount = $val[1];

                // $all_id = $this->input->post('all_id');

                $state_id = $this->input->post("state_id");

                $current_type = trim($this->input->post("current_type"));

                $provisional_type = trim(
                    $this->input->post("provisional_type")
                );

                $result = $this->Certificate_model->getTotalFees(
                    $stabId,
                    $bedCount,
                    $current_type,
                    $provisional_type,
                    $state_id
                );

                // print_r($result['totalFee']); die;

                if (count($result) > 0) {
                    $fee = $result["totalFee"];

                    $html .= $result["html"] . "/-  ";

                    $totalFee += $fee;
                }
            }

            //             print_r($html);die;

            $show_data["html"] = $html;

            $show_data["totalFee"] = $totalFee;

            echo json_encode($show_data);

            exit();
        }
    }

    public function diseasesList()
    {
        if ($this->input->get()) {
            $id = $this->input->get("diseasesId");

            $getDiseases = $this->db
                ->select("diseases_name, id")
                ->from("ci_diseases")
                ->where("diseases_type", $id)
                ->get()
                ->result_array();

            $html = '<option value="0">Select Type Diseases</option>';

            if (!empty($getDiseases)) {
                foreach ($getDiseases as $value) {
                    $html .=
                        '<option value="' .
                        $value["id"] .
                        '">' .
                        $value["diseases_name"] .
                        "</option>";
                }
            }

            $returnData = json_encode(trim($html));

            echo $returnData;

            exit();
        }
    }

    public function deaction_hospital($id)
    {
        $deactivate_data = $this->Certificate_model->get_pro_staus($id);

        // $id = $deactivate_data['id'];

        // $stats = $deactivate_data['is_active'];

        $s = "0";

        $data = [
            "status" => $s,

            "deacti_status" => "Deactivated",

            "updated_at" => date("Y-m-d h:m:s"),
        ];

        $this->db
            ->where("id", $id)
            ->update("ci_certificate_provisional", $data);

        echo 1;

        // redirect('admin/dashboard');

        exit();
    }

    public function pdf_create_provisional($id)
    {
        $q = $this->db
            ->select("*")
            ->from("ci_certificate_provisional")
            ->where("id", $id)
            ->get()
            ->row_array();

        $q1 = date("Y/m/d");

        // print_r($q); die();

        $this->load->library("Pdf");

        // create new PDF document

        $pdf = new TCPDF(
            PDF_PAGE_ORIENTATION,
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            "UTF-8",
            false
        );

        $pdf = new TCPDF("L", "pt", ["format" => "A4", "Rotate" => 360]);

        $header_file_string =
            "The Clinical Establishments (Registration and Regulation) ACT, 2010)";

        $footer_string = "";

        // set document information

        $pdf->SetCreator("Cerrs Certificate");

        $pdf->SetHeaderData("logo.png", 15, "", $header_file_string, "");

        $pdf->setFooterData($footer_string);

        // set header and footer fonts

        $pdf->setHeaderFont(["helvetica", "", 8]);

        $pdf->setFooterFont(["helvetica", "", 8]);

        // set default monospaced font

        $pdf->SetDefaultMonospacedFont("courier");

        // set margins

        $pdf->SetMargins(15, 25, 15);

        $pdf->SetHeaderMargin(5);

        $pdf->SetFooterMargin(15, 17, 15);

        // set auto page breaks

        $pdf->SetAutoPageBreak(true, 15);

        // set image scale factor

        $pdf->setImageScale(1.25);

        $pdf->SetAuthor("CERRS");

        $pdf->SetTitle("CERRS Certificate");

        $pdf->SetSubject("Certificate");

        $pdf->SetKeywords("Certificate");

        // set font

        $pdf->SetFont("helvetica", "B", 10);

        // add a page

        $pdf->AddPage();

        $pdf->SetFont("helvetica", "", 10);

        // -----------------------------------------------------------------------------

        $tbl = "";

        $tbl .=
            '<html lang="en">



<head>



    <meta charset="UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">



    <!-- Bootstrap CSS



    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />



    <link href="assets/css/style.css" rel="stylesheet" /> -->



    <title>Document</title>



   



</head>



<body style="margin: 0; line-height: 1.5;">



    <div class="certificate-wrap">



        <div class="container" style="max-width: 1140px; padding: 0 15px; margin: 0 auto">



            <div class="row">



                <div class="col-md-12" style="width: 100%; padding: 0 15px;">



                    <div class="certificate-content" style="padding: 20px 0; border: 4px solid #000;">



                        <div class="top-content" style="margin: 0 20px;">



                            <div class="d-flex justify-content-between" style="clear: both; overflow: hidden; width: 100%;">



                                <p style="font-size: 14px; font-style: italic; margin: 0; color: #000; float: left;">



                                    S. No.<span  style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            $q["pro_id"] .
            '</span>



                                </p>



                                <p style="font-size: 14px; font-style: italic; margin: 0; color: #000; float: right;">



                                    Provisional Registration No.<span  style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            $q["provisional_number"] .
            '</span>



                                </p>



                            </div>



                        </div>



                        <div class="text-center" style="text-align: center; margin: 0 20px;">



                            <div class="state-heading" style="padding: 15px 0;">



                                <h3 style="margin: 0; color: #000; line-height: 1.5; font-size: 20px; font-weight: 500;">



                                    <img src="http://localhost/new_cerss/assets/dist/img/up_symbol.png" width="100" height="100">



                                </h3>



                                <h2 style="margin: 0; color: #000; font-size: 24px; font-weight: 500; line-height: 1.2;">



                                    Government of <span style="font-size: 20px; color: #cf8a87; font-style: italic;">' .
            get_state_name($q["state"]) .
            ',</span>



                                </h2>



                            </div>



                            <h3 style="margin: 0; color: #000; font-size: 20px; font-weight: 500; line-height: 1.2;">



                                District Registering Authority



                            </h3>



                            <span class="text-purple" style="font-size: 16px; color: #cf8a87; font-style: italic; padding: 15px 0; display: block;">' .
            get_city_name($q["district"]) .
            ',</span>



                            <div class="main-heading">



                                <h2 style="font-size: 22px; font-weight: 600; margin: 0; color: #000; line-height: 1.2;">



                                    CERTIFICATE OF PROVISIONAL REGISTRATION



                                </h2>



                            </div>



                        </div>



                        <div class="main-content text-start" style="text-align: left; margin: 0 20px;">



                            <p style="line-height: 2; font-weight: 600; font-size: 16px; padding: 15px 0; margin: 0; color: #000;">



                                This is to certify that <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            $q["establishment"] .
            ' 



                                <span style="font-size: 14px; color: #000; ">located at</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            $q["address1"] .
            ", " .
            get_city_name($q["district"]) .
            ', 



                               ' .
            get_state_name($q["state"]) .
            '</span> 



                                <span style="font-size: 14px; color: #000; ">owned by</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            $q["fname_owner"] .
            " " .
            $q["mname_owner"] .
            " " .
            $q["lname_owner"] .
            '</span> <span style="font-size: 14px; color: #000; ">has been granted provisional registration as a clinical establishment under section 30 of </span>



                                <span class="text-underline" style="font-size: 22px; text-decoration: underline; color:#000">The Clinical Establishments (Registration and Regulation) Act, 2010.</span><span style="font-size: 14px; color: #000; "> The Clinical Establishment is registered for providing medical services as a</span>



                                <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            get_establishment_name($q["clinical_establishment"]) .
            '</span> <span style="font-size: 14px; color: #000; "> under</span> <span class="text-pink" style="font-size: 14px; color: #cf8a87; font-style: italic;">' .
            get_system_med_name($q["systems_of_medicine"]) .
            '</span>



                                <span style="font-size: 14px; color: #000; ">system of medicine.</span>



                            </p>



                            <p style="line-height: 2; font-weight: 600; font-size: 16px; margin: 0;color: #000;"><span class="right-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>This Certificate is valid for a period of five years from the date of issue.</p>



                        </div>



                        <div class="designation-content" style="clear: both; overflow: hidden; width: 100%;">



                            <div class="text-center" style="margin: 0 20px; text-align: center; float: right; clear: both; overflow: hidden;">



                                <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">Designation of the Issuing Authority</p>



                                <span  style="font-size: 14px; color: #cf8a87; font-style: italic;"> DRA ' .
            get_city_name($q["district"]) .
            '</span>



                            </div>



                        </div>



                        <div class="place-content text-start" style="text-align: left; margin: 0 20px;">



                            <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">



                                Place 



                                <span  style="font-size: 14px; color: #cf8a87; font-style: italic; text-decoration: underline; font-weight: 500;">



                                    ' .
            get_city_name($q["district"]) .
            '



                                </span>



                            </p>



                            <p style="font-weight: 600; font-size: 16px; margin: 0; color: #000;">



                                Date of Issue 



                                <span style="font-size: 14px; color: #cf8a87; font-style: italic; text-decoration: underline; font-weight: 500;">



                                    ' .
            $q["updated_at"] .
            '



                                </span>



                            </p>



                        </div>



                        <div class="text-end" style="text-align: right; margin: 0 20px;">



                            <div class="certificate-no">



                                <span>54</span>



                            </div>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div>



</body>



</html>';

        $tbl .= "";

        print_r($tbl);

        die();

        $pdf->writeHTML($tbl, true, false, false, false, "");

        ob_end_clean();

        $pdf->Output("provisional_certificate_" . ".pdf", "D");
    }

    public function publish_website1($id)
    {
        $data = [
            "publish" => "1",

            "publish_date" => date("Y-m-d : h:m:s"),
        ];

        $data = $this->security->xss_clean($data);

        $result = $this->db
            ->where(["id" => urldecrypt($id)])
            ->update("ci_certificate_permanent", $data);

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Parmanent Registration Published successfully!"
            );

            redirect(base_url("admin/certificate/permanent_list"));
        }

        $data["id"] = $id;

        $data["user"] = $this->Certificate_model->get_permanent_by_id(
            urldecrypt($id)
        );

        // print_r( $data['user'] ); die;

        $data["states"] = $this->location_model->get_states();

        $data["districts"] = $this->location_model->get_districts_by_state_id(
            $data["user"]["state"]
        );

        $data[
            "districts_owner"
        ] = $this->location_model->get_districts_by_state_id(
            $data["user"]["state_owner"]
        );

        $data["ownership_level"] = get_ownership_level1();

        $id = $data["user"]["ownership"];

        $con = ["parent_id" => $id, "status" => 1];

        $table_name = "ci_ownership_type";

        $sel_col = ["id", "name"];

        $data["ownership_level2"] = $this->Certificate_model->getData(
            $table_name,

            $sel_col,
            $con,
            ""
        );

        $data["rootClinicalEstablishment"] = get_clinical_establishment1(0);

        $data["medical_degree"] = get_medical_degree_tree(0);

        $this->load->view("admin/includes/_header");

        $this->load->view("admin/certificate/permanent_publish", $data);

        $this->load->view("admin/includes/_footer");
    }

    public function add_complaint($id)
    {
        // $this->sendotp();

        if ($this->input->post("submit")) {
            $this->form_validation->set_rules("name", "Name", "trim|required");

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata(
                    "form_data",
                    $this->input->post()
                );

                $this->session->set_flashdata("errors", $data["errors"]);

                // redirect(base_url('admin/auth/register'),'refresh');
            } else {
                $pro_id = $this->db
                    ->select("pro_id")
                    ->from("ci_certificate_permanent")
                    ->where("id", $id)
                    ->get()
                    ->row()->pro_id;

                $user_otp = rand(100000, 999999);

                $objec = "1";

                $data = [
                    "name" => $this->input->post("name"),

                    "complaint_agains" => $this->input->post(
                        "complaint_agains"
                    ),

                    "email" => $this->input->post("email"),

                    "otp_email" => $user_otp,

                    "mobile_complaint" => $this->input->post(
                        "mobile_complaint"
                    ),

                    "mobile_otp" => $this->input->post("mobile_otp"),

                    "add_complaint" => $this->input->post("add_complaint"),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "complaint_pin" => $this->input->post("complaint_pin"),

                    "file_objection" => $this->input->post("file_objection"),

                    "last_ip" => $this->input->ip_address(),

                    "created_at" => date("Y-m-d h:m:s"),
                ];

                $data2 = [
                    "id" => $this->input->post("complaint_agains"),

                    "file_objection" => $this->input->post("file_objection"),

                    "is_any_objection" => $objec,

                    "objection_date" => date("Y-m-d h:m:s"),

                    // 'publish_date' => date('Y-m-d h:m:s'),
                ];

                $dataUpdate1 = [
                    "refre_id" => $this->input->post("complaint_agains"),

                    "pro_id" => $pro_id,

                    "complaint_by" => $this->test_input(
                        $this->input->post("name")
                    ),

                    "modified_at" => date("Y-m-d h:m:s"),
                ];

                $data = $this->security->xss_clean($data);

                $data2 = $this->security->xss_clean($data2);

                $this->db
                    ->where(["id" => $id])
                    ->update("ci_certificate_permanent", $data2);

                // $result = $this->Certificate_model->update_complain($data2,$id);

                $result1 = $this->db->insert("permanent_log", $dataUpdate1);

                $result = $this->Certificate_model->add_pulish_data($data);

                if ($result) {
                    $this->load->helper("email_helper");

                    $mail_data = [
                        "fullname" =>
                            $data["name"] .
                            " , " .
                            "Please Enter OTP to proceed next" .
                            " - " .
                            $data["otp_email"],
                    ];

                    $to = $data["email"];

                    $email = $this->mailer->mail_template(
                        $to,
                        "email-otp-verification",
                        $mail_data
                    );

                    if ($email) {
                        $this->session->set_flashdata(
                            "success",
                            "Your Complaint has been register sucessfully."
                        );

                        redirect(base_url("publish_data"));
                    } else {
                        echo "Email Error";
                    }
                }
            }
        } else {
            $id = urldecrypt($id);

            $data["id"] = $id;

            $data["title"] = "File Objection";

            $data["states"] = $this->location_model->get_states();

            $this->load->view("admin/includes/_header2", $data);

            $this->load->view(
                "admin/certificate/permanent_publish_complaint",
                $data
            );

            // $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function sendotp()
    {
        print_r("hi");
    }
}
