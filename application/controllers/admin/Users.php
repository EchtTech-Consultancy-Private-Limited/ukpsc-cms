<?php defined("BASEPATH") or exit("No direct script access allowed");

class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        auth_check(); // check login auth

        $this->rbac->check_module_access();

        $this->load->model("admin/user_model", "user");

        $this->load->model("admin/admin_model", "admin");

        $this->load->model("admin/Activity_model", "activity_model");

        $this->load->model("admin/location_model", "location_model");
    }

    //-----------------------------------------------------

    function index($type = "")
    {
        $this->session->set_userdata("filter_type", $type);

        $this->session->set_userdata("filter_keyword", "");

        $this->session->set_userdata("filter_status", "");

        $data["admin_roles"] = $this->user->get_admin_roles();

        $data["states"] = $this->location_model->get_states();

        $data["title"] = "Admin List";

        $data["js_file"] = "admin.js";

        $this->load->view("admin/includes/_header");

        $this->load->view("admin/users/index", $data);

        $this->load->view("admin/includes/_footer");
    }

    //---------------------------------------------------------

    function filterdata()
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

    //--------------------------------------------------

    function list_data()
    {
        //print_r($_SESSION);

        $data["info"] = $this->user->get_all();

        $this->load->view("admin/users/list", $data);
    }

    //-----------------------------------------------------------

    function change_status()
    {
        $this->rbac->check_operation_access(); // check opration permission

        $this->user->change_status();
    }

    //--------------------------------------------------

    function add()
    {
        $this->rbac->check_operation_access(); // check opration permission

        $data["js_file"] = "admin.js";

        $data["admin_roles"] = $this->admin->get_admin_roles_by_id(6);

        $data["states"] = $this->location_model->get_states();

        if ($this->input->post("submit")) {
            $this->form_validation->set_rules("role", "Role", "trim|required");

            $this->form_validation->set_rules(
                "username",
                "Username",
                "trim|alpha_numeric|is_unique[ci_admin.username]|required"
            );

            $this->form_validation->set_rules(
                "firstname",
                "Firstname",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "middlename",
                "Middlename",
                "trim"
            );

            $this->form_validation->set_rules(
                "lastname",
                "Lastname",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "email",
                "Email",
                "trim|valid_email|required"
            );

            $this->form_validation->set_rules(
                "mobile_no",
                "Number",
                "trim|required"
            );

            $this->form_validation->set_rules("phone_no", "Number", "trim");

            $this->form_validation->set_rules(
                "idproof",
                "ID Proof",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "state",
                "State",
                "trim|required"
            );

            //$this->form_validation->set_rules('district', 'District', 'trim|required');

            $this->form_validation->set_rules(
                "designation",
                "Designation",
                "trim|required"
            );

            $this->form_validation->set_rules("status", "Status", "required");

            $this->form_validation->set_rules(
                "password",
                "Password",
                "trim|required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(base_url("admin/admin/add"), "refresh");
            } else {
                $data = [
                    "admin_role_id" => $this->input->post("role"),

                    "firstname" => $this->input->post("firstname"),

                    "middlename" => $this->input->post("middlename"),

                    "lastname" => $this->input->post("lastname"),

                    "username" => $this->input->post("username"),

                    "email" => $this->input->post("email"),

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

                    "is_active" => $this->input->post("status"),

                    "token" => md5(rand(0, 1000)),

                    "last_ip" => $this->input->ip_address(),

                    "created_at" => date("Y-m-d h:m:s"),

                    "updated_at" => date("Y-m-d h:m:s"),
                ];

                $data = $this->security->xss_clean($data);

                //print_r($data); die;

                $result = $this->user->add_admin($data);

                if ($result) {
                    // Activity Log

                    $this->activity_model->add_log(4);

                    $this->session->set_flashdata(
                        "success",
                        "Admin has been added successfully!"
                    );

                    //Start-Sending welcome email to user

                    //Ashutosh Misra 14June2021

                    $this->load->helper("email_helper");

                    $mail_data = [
                        "fullname" =>
                            $data["firstname"] . " " . $data["lastname"],

                        "username" => $data["username"],

                        "password" => $this->input->post("password"),
                    ];

                    $to = $data["email"];

                    $email = $this->mailer->mail_template(
                        $to,
                        "welcome-email",
                        $mail_data
                    );

                    if ($email) {
                        $this->session->set_flashdata(
                            "success",
                            "User Account has been made and account details has been send to user email."
                        );

                        //redirect(base_url('admin/auth/login'));
                    } else {
                        echo "Email Error";
                    }

                    //End- Sending welcome email to user

                    redirect(base_url("admin/admin"));
                }
            }
        } else {
            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/users/add");

            $this->load->view("admin/includes/_footer");
        }
    }

    //--------------------------------------------------

    function edit($id = "")
    {
        //echo '<pre>';print_r($_SERVER); die;

        //                if(!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != base_url('admin/admin/') )

        //                    redirect(base_url('admin/auth/login/'));

        $this->rbac->check_operation_access(); // check opration permission

        $data["admin_roles"] = $this->user->get_admin_roles();

        if ($this->input->post("submit")) {
            $this->form_validation->set_rules("role", "Role", "trim|required");

            //$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[ci_admin.username]|required');

            $this->form_validation->set_rules(
                "firstname",
                "Firstname",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "middlename",
                "Middlename",
                "trim"
            );

            $this->form_validation->set_rules(
                "lastname",
                "Lastname",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "email",
                "Email",
                "trim|valid_email|required"
            );

            $this->form_validation->set_rules(
                "mobile_no",
                "Number",
                "trim|required"
            );

            $this->form_validation->set_rules("phone_no", "Number", "trim");

            $this->form_validation->set_rules(
                "idproof",
                "ID Proof",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "state",
                "State",
                "trim|required"
            );

            //$this->form_validation->set_rules('district', 'District', 'trim|required');

            $this->form_validation->set_rules(
                "designation",
                "Designation",
                "trim|required"
            );

            $this->form_validation->set_rules("status", "Status", "required");

            $this->form_validation->set_rules(
                "password",
                "Password",
                "trim|required"
            );

            if ($this->form_validation->run() == false) {
                $data = [
                    "errors" => validation_errors(),
                ];

                $this->session->set_flashdata("errors", $data["errors"]);

                redirect(base_url("admin/admin/edit/" . $id), "refresh");
            } else {
                $data = [
                    "admin_role_id" => $this->input->post("role"),

                    "firstname" => $this->input->post("firstname"),

                    "middlename" => $this->input->post("middlename"),

                    "lastname" => $this->input->post("lastname"),

                    //'username' => $this->input->post('username'),

                    "email" => $this->input->post("email"),

                    "phone_no" => $this->input->post("phone_no"),

                    "mobile_no" => $this->input->post("mobile_no"),

                    "idproof" => $this->input->post("idproof"),

                    "designation" => $this->input->post("designation"),

                    "state_id" => $this->input->post("state"),

                    "district_id" => $this->input->post("district"),

                    "password" => password_hash(
                        $this->input->post("password"),
                        PASSWORD_BCRYPT
                    ),

                    "is_active" => $this->input->post("status"),

                    "created_at" => date("Y-m-d : h:m:s"),

                    "updated_at" => date("Y-m-d : h:m:s"),
                ];

                if ($this->input->post("password") != "") {
                    $data["password"] = password_hash(
                        $this->input->post("password"),
                        PASSWORD_BCRYPT
                    );
                }

                $data = $this->security->xss_clean($data);

                $result = $this->user->edit_admin($data, urldecrypt($id));

                if ($result) {
                    // Activity Log

                    $this->activity_model->add_log(5);

                    $this->session->set_flashdata(
                        "success",
                        "Admin has been updated successfully!"
                    );

                    redirect(base_url("admin/admin"));
                }
            }
        } elseif ($id == "") {
            redirect("admin/admin");
        } else {
            $data["admin"] = $this->user->get_admin_by_id(urldecrypt($id));

            $data["states"] = $this->location_model->get_states();

            $data[
                "districts"
            ] = $this->location_model->get_districts_by_state_id(
                $data["admin"]["state_id"]
            );

            $this->load->view("admin/includes/_header");

            $this->load->view("admin/admin/edit", $data);

            $this->load->view("admin/includes/_footer");
        }
    }

    //--------------------------------------------------

    function check_username($id = 0)
    {
        $this->db->from("admin");

        $this->db->where("username", $this->input->post("username"));

        $this->db->where("admin_id !=" . $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    //------------------------------------------------------------

    function delete($id = "")
    {
        $this->rbac->check_operation_access(); // check opration permission

        $this->user->delete(urldecrypt($id));

        // Activity Log

        $this->activity_model->add_log(6);

        $this->session->set_flashdata(
            "success",
            "User has been Deleted Successfully."
        );

        redirect("admin/admin");
    }
}
?>


