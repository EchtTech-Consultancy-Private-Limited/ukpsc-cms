<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Location extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library("datatable"); // loaded my custom serverside datatable library

        $this->load->model("admin/location_model", "location_model");
    }

    // ---------------------------------------------------

    //                     COUNTRY

    //-----------------------------------------------------

    public function index()
    {
        $data["title"] = "Country List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/location/country_list", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    //-------------------------------------------------------

    public function country_datatable_json()
    {
        $records = $this->location_model->get_all_countries();

        $data = [];

        $count = 0;

        foreach ($records["data"] as $row) {
            $status = $row["status"] == 0 ? "Inactive" : "Active" . "<span>";

            $data[] = [
                ++$count,

                $row["name"],

                '<span class="btn btn-xs btn-success" title="status">' .
                $status .
                "<span>",

                '<a title="Edit" class="update btn btn-sm btn-warning" href="' .
                base_url(
                    "admin/location/country/edit/" . urlencrypt($row["id"])
                ) .
                '"> <i class="fa fa-pencil-square-o"></i></a>



                 <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url(
                    "admin/location/country/del/" . urlencrypt($row["id"])
                ) .
                '" onclick="return confirm(\'Do you want to delete ?\')" > <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records["data"] = $data;

        echo json_encode($records);
    }

    //-----------------------------------------------------

    public function country_add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                "country",
                "country",
                "trim|is_unique[ci_countries.name]|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/country_add", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $slug = make_slug($this->input->post("country"));

            $data = [
                "name" => ucfirst($this->input->post("country")),

                "slug" => $slug,
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->add_country($data);

            $this->session->set_flashdata(
                "success",
                "Country has been added successfully"
            );

            redirect(base_url("admin/location"));
        } else {
            $data["title"] = "Add Country";

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/country_add", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function country_edit($id = 0)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                "country",
                "country",
                "trim|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/country_edit", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $slug = make_slug($this->input->post("country"));

            $data = [
                "name" => ucfirst($this->input->post("country")),

                "slug" => $slug,

                "status" => $this->input->post("status"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->edit_country(
                $data,
                urldecrypt($id)
            );

            $this->session->set_flashdata(
                "success",
                "Country has been updated successfully"
            );

            redirect(base_url("admin/location"));
        } else {
            $data["title"] = "Update Country";

            $data["country"] = $this->location_model->get_country_by_id(
                urldecrypt($id)
            );

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/country_edit", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function country_del($id = 0)
    {
        $this->db->delete("ci_countries", ["id" => urldecrypt($id)]);

        $this->session->set_flashdata(
            "success",
            "Country has been Deleted Successfully!"
        );

        redirect(base_url("admin/location"));
    }

    // ---------------------------------------------------

    //                     STATE

    //-----------------------------------------------------

    function state()
    {
        $data["title"] = "State List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/location/state_list", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    //-------------------------------------------------------

    public function state_datatable_json()
    {
        $records = $this->location_model->get_all_states();

        $data = [];

        $count = 0;

        foreach ($records["data"] as $row) {
            $status = $row["status"] == 0 ? "Inactive" : "Active" . "<span>";

            $data[] = [
                ++$count,

                get_country_name($row["country_id"]),

                $row["name"],

                '<span class="btn btn-xs btn-success" title="status">' .
                $status .
                "<span>",

                '<a title="Edit" class="update btn btn-sm btn-warning" href="' .
                base_url(
                    "admin/location/state/edit/" . urlencrypt($row["id"])
                ) .
                '"> <i class="fa fa-pencil-square-o"></i></a>



                 <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url("admin/location/state/del/" . urlencrypt($row["id"])) .
                '" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records["data"] = $data;

        echo json_encode($records);
    }

    //-----------------------------------------------------

    public function state_add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                "country",
                "country",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "state",
                "state",
                "trim|is_unique[ci_states.name]|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/state_add", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $data = [
                "name" => ucfirst($this->input->post("state")),

                "slug" => make_slug($this->input->post("state")),

                "country_id" => $this->input->post("country"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->add_state($data);

            $this->session->set_flashdata(
                "success",
                "State has been added successfully"
            );

            redirect(base_url("admin/location/state"));
        } else {
            $data["countries"] = $this->location_model->get_countries_list();

            $data["title"] = "Add State";

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/state_add", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function state_edit($id = 0)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                "country",
                "country",
                "trim|required"
            );

            $this->form_validation->set_rules(
                "state",
                "state",
                "trim|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/state_edit", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            // print_r(urldecrypt($id)); die();

            if (!empty($_FILES["state_symbol"]["name"])) {
                // $config['upload_path'] = 'uploads/images/state_logo/';

                $config["upload_path"] = "assets/dist/img/";

                // print_r($config['upload_path']); die();

                $config["file_name"] = urldecrypt($id);

                $config["allowed_types"] = "gif|jpg|png";

                // $config['max_size']      = 100;

                // $config['max_width']     = 100;

                // $config['max_height']    = 100;

                // print_r($config['file_name']); die();

                $config["max_size"] = 1024 * 1024;

                //Load upload library and initialize configuration

                $this->load->library("upload", $config);

                $this->upload->initialize($config);

                if ($this->upload->do_upload("state_symbol")) {
                    $uploadData = $this->upload->data();

                    $state_symbol = $uploadData["file_name"];
                } else {
                    $error = ["error" => $this->upload->display_errors()];

                    $this->session->set_flashdata("error", $error["error"]);

                    $state_symbol = "";
                }
            } else {
                $state_symbol = "";
            }

            $data = [
                "name" => ucfirst($this->input->post("state")),

                "slug" => make_slug($this->input->post("state")),

                "country_id" => $this->input->post("country"),

                "state_symbol" => $state_symbol,
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->edit_state($data, urldecrypt($id));

            if ($result) {
                $this->session->set_flashdata(
                    "success",
                    "State has been updated successfully"
                );

                redirect(base_url("admin/location/state"));
            }
        } else {
            $data["title"] = "Update State";

            $data["countries"] = $this->location_model->get_countries_list();

            $data["state"] = $this->location_model->get_state_by_id(
                urldecrypt($id)
            );

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/state_edit", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function state_del($id = 0)
    {
        $this->db->delete("ci_states", ["id" => urldecrypt($id)]);

        $this->session->set_flashdata(
            "success",
            "State has been Deleted Successfully!"
        );

        redirect(base_url("admin/location/state"));
    }

    // ---------------------------------------------------

    //                     CITY

    //-----------------------------------------------------

    function city()
    {
        $data["title"] = "City List";

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/location/city_list", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    function get_city_by_state_id()
    {
        $district_id = $this->input->post("district_id");

        $query = $this->db->query(
            "SELECT * from ci_cities c INNER JOIN ci_sub_cities cs ON c.id = cs.cities_id where cs.cities_id = $district_id and cs.status = 1"
        );

        $query->result();

        $options = '<option value="">' . "Select City" . "</option>";

        foreach ($query->result() as $r) {
            $options .=
                '<option value="' .
                $r->id .
                '">' .
                $r->subcityname .
                "</option>";
        }

        echo $options;
    }

    function get_city_by_state_idForAllcationState()
    {
        $district_id = $_GET["state_id"];

        $query = $this->db->query(
            "SELECT * from ci_cities c INNER JOIN ci_sub_cities cs ON c.id = cs.cities_id where cs.cities_id = $district_id and cs.status = 1"
        );

        $query->result();

        $options = '<option value="">' . "Select City" . "</option>";

        foreach ($query->result() as $r) {
            $options .=
                '<option value="' .
                $r->id .
                '">' .
                $r->subcityname .
                "</option>";
        }

        echo $options;
    }

    function get_city_by_state_id1()
    {
        // print_r($_SESSION['admin_role_id']); die();

        $district_id = $this->input->post("district_id");

        // $query = $this->db->query("SELECT * from ci_cities where id = $district_id");

        // $query = $this->db->query("SELECT * from ci_cities c INNER JOIN ci_sub_cities cs where cs.cities_id = $district_id");

        $query = $this->db->query(
            "SELECT * from ci_cities c INNER JOIN ci_sub_cities cs ON c.id = cs.cities_id where cs.cities_id = $district_id and cs.status = 1"
        );

        $query->result();

        // $arr = [];

        // foreach ($query->result() as $key=>$r) {

        //     $arr[$r->id] = $r->subcityname;

        // }

        // echo json_encode($arr);

        $options = '<option value="">' . "Select City" . "</option>";

        // $options = '';

        foreach ($query->result() as $r) {
            // $options .= '<option value="' . $r->id . '">' . $r->city . '</option>';

            $options .=
                '<option value="' .
                $r->id .
                '">' .
                $r->subcityname .
                "</option>";
        }

        echo $options;

        // exit;
    }

    //-------------------------------------------------------

    public function city_datatable_json()
    {
        $records = $this->location_model->get_all_cities();

        $data = [];

        $count = 0;

        foreach ($records["data"] as $row) {
            $status = $row["status"] == 0 ? "Inactive" : "Active" . "<span>";

            $data[] = [
                ++$count,

                get_state_name($row["state_id"]),

                $row["name"],

                '<span class="btn btn-xs btn-success" title="status">' .
                $status .
                "<span>",

                '<a title="Edit" class="update btn btn-sm btn-warning" href="' .
                base_url("admin/location/city/edit/" . urlencrypt($row["id"])) .
                '"> <i class="fa fa-pencil-square-o"></i></a>



        <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url("admin/location/city/del/" . urlencrypt($row["id"])) .
                '" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records["data"] = $data;

        echo json_encode($records);
    }

    public function town_json()
    {
        $records = $this->location_model->get_all_towns();

        $data = [];

        $count = 0;

        foreach ($records["data"] as $row) {
            $status = $row["status"] == 0 ? "Inactive" : "Active" . "<span>";

            $data[] = [
                ++$count,

                get_district_name($row["district_id"]),

                $row["name"],

                '<span class="btn btn-xs btn-success" title="status">' .
                $status .
                "<span>",

                '<a title="Edit" class="update btn btn-sm btn-warning" href="' .
                base_url("admin/location/city/edit/" . urlencrypt($row["id"])) .
                '"> <i class="fa fa-pencil-square-o"></i></a>



        <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url("admin/location/city/del/" . urlencrypt($row["id"])) .
                '" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records["data"] = $data;

        echo json_encode($records);
    }

    //-----------------------------------------------------

    public function city_add()
    {
        $data = [];

        if ($this->input->post()) {
            $this->form_validation->set_rules(
                "city",
                "city",
                "trim|is_unique[ci_cities.name]|required"
            );

            $this->form_validation->set_rules(
                "state",
                "state",
                "trim|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/city_add", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $data = [
                "name" => ucfirst($this->input->post("city")),

                "slug" => make_slug($this->input->post("city")),

                "state_id" => $this->input->post("state"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->add_city($data);

            $this->session->set_flashdata(
                "success",
                "City has been added successfully"
            );

            redirect(base_url("admin/location/city"));
        } else {
            $data["title"] = "Add City";

            $data["states"] = $this->location_model->get_states_list();

            $data["city"]["state_id"] = [];

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/city_add", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function city_edit($id = 0)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules("city", "city", "trim|required");

            $this->form_validation->set_rules(
                "state",
                "state",
                "trim|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/city_edit", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $data = [
                "name" => ucfirst($this->input->post("city")),

                "slug" => make_slug($this->input->post("city")),

                "state_id" => $this->input->post("state"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->edit_city($data, urldecrypt($id));

            $this->session->set_flashdata(
                "success",
                "City has been updated successfully"
            );

            redirect(base_url("admin/location/city"));
        } else {
            $data["title"] = "Update City";

            $data["states"] = $this->location_model->get_states_list();

            $data["city"] = $this->location_model->get_city_by_id(
                urldecrypt($id)
            );

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/city_edit", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function city_del($id = 0)
    {
        $this->db->delete("ci_cities", ["id" => urldecrypt($id)]);

        $this->session->set_flashdata(
            "success",
            "City has been Deleted Successfully!"
        );

        redirect(base_url("admin/location/city"));
    }

    // ---------------------------------------------------

    //                     TOWNS

    //-----------------------------------------------------

    function town()
    {
        $data["title"] = "Town List";

        $data["info"] = $this->location_model->get_all_towns();

        // print_r($data['info']); die();

        $this->load->view("admin/includes/_header", $data);

        $this->load->view("admin/location/town_list", $data);

        $this->load->view("admin/includes/_footer", $data);
    }

    //-------------------------------------------------------

    // public function town_datatable_json() {

    //     $records = $this->location_model->get_all_towns();

    //     // print_r($records); die();

    //     $data = array();

    //     $count = 0;

    //     foreach ($records['data'] as $row) {

    //         $status = ($row['status'] == 0) ? 'Inactive' : 'Active' . '<span>';

    //         $data[] = array(

    //             ++$count,

    //             get_district_name($row['district_id']),

    //             $row['name'],

    //             '<span class="btn btn-xs btn-success" title="status">' . $status . '<span>',

    //             '<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/location/town/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>

    //             <a title="Delete" class="delete btn btn-sm btn-danger" href="' . base_url('admin/location/town/del/' . $row['id']) . '" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'

    //         );

    //     }

    //     $records['data'] = $data;

    //     echo json_encode($records);

    // }

    //-----------------------------------------------------

    public function town_add()
    {
        if ($this->input->post()) {
            // $this->form_validation->set_rules('town', 'town', 'trim|is_unique[ci_cities.name]|required');

            // $this->form_validation->set_rules('state', 'state', 'trim|required');

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            $data = [
                "name" => ucfirst($this->input->post("name")),

                "slug" => make_slug($this->input->post("city")),

                "district_id" => $this->input->post("name"),

                "city" => $this->input->post("city"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->add_town($data);

            $this->session->set_flashdata(
                "success",
                "Town has been added successfully"
            );

            redirect(base_url("admin/location/town"));
        } else {
            $data["title"] = "Add City/Town";

            $data["town"] = $this->location_model->get_towns_list();

            // print_r($data['town'] ); die();

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/town_add", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function town_edit($id = 0)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules("town", "town", "trim|required");

            $this->form_validation->set_rules(
                "state",
                "state",
                "trim|required"
            );

            $this->form_validation->set_error_delimiters(
                '<div class="alert alert-danger">',
                "</div>"
            );

            if ($this->form_validation->run() === false) {
                $this->load->view("admin/includes/_header", $data);

                $this->load->view("admin/location/town_edit", $data);

                $this->load->view("admin/includes/_footer", $data);

                return;
            }

            $data = [
                "name" => ucfirst($this->input->post("town")),

                "slug" => make_slug($this->input->post("town")),

                "state_id" => $this->input->post("state"),
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->location_model->edit_town($data, $id);

            $this->session->set_flashdata(
                "success",
                "Town has been updated successfully"
            );

            redirect(base_url("admin/location/town"));
        } else {
            $data["title"] = "Update Town";

            $data["states"] = $this->location_model->get_states_list();

            $data["town"] = $this->location_model->get_town_by_id($id);

            $this->load->view("admin/includes/_header", $data);

            $this->load->view("admin/location/town_edit", $data);

            $this->load->view("admin/includes/_footer", $data);
        }
    }

    //-----------------------------------------------------

    public function town_del($id = 0)
    {
        $this->db->delete("ci_towns", ["id" => $id]);

        $this->session->set_flashdata(
            "success",
            "Town has been Deleted Successfully!"
        );

        redirect(base_url("admin/location/town"));
    }
}

?>
