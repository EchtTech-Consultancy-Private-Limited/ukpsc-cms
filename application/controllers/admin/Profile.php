<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        auth_check(); // check login auth

        $this->load->model("admin/admin_model", "admin_model");

        $this->load->model("admin/location_model", "location_model");

        $this->load->model("admin/Certificate_model", "Certificate_model");

        $this->load->model("admin/admin_model", "admin");
    }

    //-------------------------------------------------------------------------

    public function index()
    {
        $data["js_file"] = "admin.js";

        $admin_role_id = $this->session->userdata["admin_role_id"];

        if ($admin_role_id != 6) {
            $data["admin_roles"] = $this->admin->get_admin_roles();
        } else {
            $data["admin_roles"] = [];
        }

        $data["states"] = $this->location_model->get_states();

        $data["districts"] = $this->location_model->get_district_all_name();

        if ($this->input->post("submit")) {
            $data = [
                "firstname" => $this->input->post("firstname"),

                "lastname" => $this->input->post("lastname"),

                "phone_no" => $this->input->post("phone_no"),

                "mobile_no" => $this->input->post("mobile_no"),

                "idproof" => $this->input->post("idproof"),

                "idproof_no" => $this->input->post("idproof_no"),

                "designation" => $this->input->post("designation"),

                "state_id" => $this->input->post("state"),

                "district_id" => $this->input->post("district"),

                "password" => password_hash(
                    $this->input->post("password"),

                    PASSWORD_BCRYPT
                ),

                // 'is_active' => $this->input->post('status'),

                "token" => md5(rand(0, 1000)),

                "last_ip" => $this->input->ip_address(),

                "updated_at" => date("Y-m-d h:m:s"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->admin_model->update_user($data);

            if ($result) {
                $this->session->set_flashdata(
                    "success",

                    "Profile has been Updated Successfully!"
                );

                redirect(base_url("admin/profile"), "refresh");
            }
        } else {
            $data["title"] = "Admin Profile";
            $data["admin"] = $this->admin_model->get_user_detail();
            $this->load->view("admin/includes/_header");
            $this->load->view("admin/profile/index", $data);
            $this->load->view("admin/includes/_footer");
        }
    }
    // Brijesh Password change code
    public function passwordChange(){
        $id = $this->session->userdata("admin_id");
        $data = [
            "password" => password_hash($this->input->post("password"),PASSWORD_BCRYPT),
        ];
        $data = $this->security->xss_clean($data);
        $result = $this->admin_model->change_pwd($data, $id);
        if($result ==true){
            $response = array(
                'status' => 'success',
                'message' => "<h3>Password Updated successfully.</h3>"
            );
        }else{
        
            $response = array(
                'status' => 'error',
                'message' => "<h3>Password Update Error.</h3>"
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    //-------------------------------------------------------------------------

    public function change_pwd()
    {
        $id = $this->session->userdata("admin_id");

        if ($this->input->post("submit")) {
            $this->form_validation->set_rules(
                "password",
                "Password",

                "trim|required"
            );

            $this->form_validation->set_rules(
                "confirm_pwd",
                "Confirm Password",

                "trim|required|matches[password]"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(base_url("admin/profile/change_pwd"), "refresh");
            } else {
                $data = [
                    "password" => password_hash($this->input->post("password"),PASSWORD_BCRYPT),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->admin_model->change_pwd($data, $id);

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        "Password has been changed successfully!"
                    );

                    redirect(base_url("admin/profile/change_pwd"));
                }
            }
        } else {
            $data["title"] = "Change Password";

            $data["user"] = $this->admin_model->get_user_detail();

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/profile/change_pwd", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function account_deactivation()
    {
        $data["states"] = $this->location_model->get_states();

        $data["data_usr"] = $this->Certificate_model->count_row_data(
            $_SESSION["admin_id"]
        );

        // print_r($data['data_usr'] ); die();

        if (isset($_SESSION["state_id"]) && $_SESSION["state_id"] != "") {
            $data["districts"] = get_state_cities($_SESSION["state_id"]);
        }

        $data["title"] = "Account Deactivation";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/profile/deactivaiton_index", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    public function deactivation_list()
    {
        $data["info"] = $this->Certificate_model->get_all_deactivation();

        $this->load->view("admin/profile/deactivation_list", $data);
    }

    public function datatable_json()
    {
        $records["data"] = $this->Certificate_model->get_deactivation_data();

        $data = [];

        $i = 0;

        foreach ($records["data"] as $row) {
            $data[] = [
                ++$i,

                $row["name"] ? $row["name"] : "",

                '<span class="btn btn-xs btn-success" title="status">' .
                $row["status"] .
                "<span>",

                '<a title="Edit" class="update btn btn-sm btn-warning" href="' .
                base_url(
                    "admin/master/establishment_type_edit/" .
                        urlencrypt($row["id"])
                ) .
                '"> <i class="fa fa-pencil-square-o"></i></a>



                 <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url(
                    "admin/master/establishment_type_del/" .
                        urlencrypt($row["id"])
                ) .
                '" onclick="return confirm(\'Do you want to delete ?\')" > <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records["data"] = $data;

        echo json_encode($records);
    }

    public function account_deactivation_add()
    {
        if ($this->input->post("submit")) {
            // 0 = draft , 1= Save ,2 = reject , 3= Approve , 4= Hold !!

            $file_movement = $this->input->post("submit") == "Save" ? "2" : "1";

            $this->form_validation->set_rules(
                "reason_deactication",
                "reason_deactication",

                "trim|required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(
                    base_url("admin/profile/deactivation_add/"),
                    "refresh"
                );
            } else {
                if (!empty($_FILES["fileName1"]["name"])) {
                    $config["upload_path"] =
                        "uploads/images/deactivation_request_file/";

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

                $name = $_SESSION["fullname"];

                $data = [
                    "name" => $name,

                    "reason_deactication" => $this->input->post(
                        "reason_deactication"
                    ),

                    "reason_deactivation" => $this->input->post(
                        "reason_deactivation"
                    ),

                    "deactivation_date" => $this->input->post(
                        "deactivation_date"
                    ),

                    "deactivation_place" => $this->input->post(
                        "deactivation_place"
                    ),

                    "state" => $this->input->post("state"),

                    "district" => $this->input->post("district"),

                    "file_movement" => $file_movement,

                    "fileName1" => $fileName1,

                    "created_at" => date("Y-m-d : h:m:s"),

                    "created_by" => $this->session->userdata("admin_id"),
                ];

                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->add_deactivation_req($data);

                if ($result) {
                    $this->session->set_flashdata(
                        "success",

                        'Request for "Deactivation" has been submitted successfully!'
                    );

                    redirect(
                        base_url("admin/profile/account_deactivation"),

                        "refresh"
                    );
                }
            }
        } else {
            $admin_id = $_SESSION["admin_id"];

            $data["states"] = $this->location_model->get_states();

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/profile/deactivation_add", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function deactivation_preview($id)
    {
        $data["id"] = $id;

        $data["states"] = $this->location_model->get_states();

        $data[
            "deactivation_data"
        ] = $this->Certificate_model->get_deactivation_data($id);

        $this->load->view("admin/includes/_header");

        $this->load->view("admin/profile/deactivation_preview", $data);

        $this->load->view("admin/includes/_footer");
    }

    public function dra_deactivation_action($deaction_id)
    {
        if ($this->input->post("submit")) {
            // $this->form_validation->set_rules('establishment', 'Establishment', 'trim|required');

            $action =
                $this->input->post("action_dra") .
                "/" .
                $this->input->post("admin_role_id");

            $up_arr = [];

            $actiontaken = $this->input->post("action_dra");

            $data = [
                "deaction_id" => $this->input->post("deaction_id"),

                "admin_role_id" => $this->input->post("admin_role_id"),

                "action_dra" => $this->input->post("action_dra"),

                "remark_dra" => $this->input->post("remark_dra"),

                // 'seniour_auth_name' => $this->input->post('seniour_auth_name'),

                "last_ip" => $this->input->ip_address(),

                "created_at" => date("Y-m-d h:m:s"),

                "created_by" => $this->session->userdata("admin_id"),
            ];

            // print_r($data);  die();

            $dataUpdate = [
                "id" => $this->input->post("deaction_id"),

                "file_movement" => $this->input->post("action_dra"),

                // 'seniour_auth' => $this->input->post('seniour_auth_name'),

                "remark_by_auth" => $this->input->post("remark_dra"),

                "updated_at" => date("Y-m-d h:m:s"),

                "updated_by" => $this->session->userdata("admin_id"),
            ];

            // print_r($dataUpdate);  die();

            if ($actiontaken == 3 || $actiontaken == 5) {
                if ($actiontaken == 3) {
                    $app_status = "0";
                }

                if ($actiontaken == 5) {
                    $app_status = "1";
                }

                $up_arr = ["approved_status" => $app_status];
            }

            $deaction_id = $this->input->post("deaction_id");

            $this->db
                ->where(["id" => $deaction_id])
                ->update("ci_account_deactivation", $up_arr);

            $data = $this->security->xss_clean($data);

            $dataUpdate = $this->security->xss_clean($dataUpdate);

            $admin_role_id = $this->input->post("admin_role_id");

            $result = $this->Certificate_model->deactivation_dra(
                $data,
                $dataUpdate,

                $deaction_id
            );

            if ($result) {
                $this->session->set_flashdata(
                    "success",

                    "Status Updated Successfully !! "
                );

                redirect(
                    base_url("admin/profile/account_deactivation"),

                    "refresh"
                );
            }
        } else {
            $data["deaction_id"] = $deaction_id;

            $data["states"] = $this->location_model->get_states();

            $data["user"] = $this->Certificate_model->get_deaction_data(
                $deaction_id
            );

            // print_r(  $data['user']); die();

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/profile/deactivation_dra", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    public function deaction_button()
    {
        $getUserId = $this->session->userdata("admin_id");

        $data = [
            "is_active" => 0,

            "last_ip" => $this->input->ip_address(),

            "updated_at" => date("Y-m-d h:m:s"),
        ];

        $this->db->where("admin_id", $getUserId)->update("ci_admin", $data);

        $this->session->sess_destroy();

        echo 1;

        exit();
    }

    public function count_row()
    {
        $data["user"] = $this->Certificate_model->count_row_data(
            $_SESSION["admin_id"]
        );

        print_r($data["user"]);
        die();
    }

    public function downolad_pdf($folder, $fileName, $id)
    {
        $id = $id;

        $result = $this->Certificate_model->get_deactivation_file(
            $fileName,

            $id
        );

        // print_r( $result); die;

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

    public function consent_user()
    {
        // echo '<pre>';print($this->rbac->check_operation_access());die;

        $data["title"] = "Consent Letter List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/consent_letter/consent_letter_index", $data);

        $this->load->view("admin/includes/_footer", $data);
    }
}
?>  