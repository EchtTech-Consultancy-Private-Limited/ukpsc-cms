<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Users_upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url

        $this->load->helper("url");

        // Load Model

        $this->load->model("Main_model");
    }

    public function index()
    {
        // Check form submit or not

        if ($this->input->post("upload") != null) {
            $data = [];

            if (!empty($_FILES["file"]["name"])) {
                // Set preference

                $config["upload_path"] = "assets/files/";

                $config["allowed_types"] = "csv";

                $config["max_size"] = 0; // max_size in kb

                $config["file_name"] = $_FILES["file"]["name"];

                // Load upload library

                $this->load->library("upload", $config);

                // File upload

                if ($this->upload->do_upload("file")) {
                    // Get data about the file

                    $uploadData = $this->upload->data();

                    $filename = $uploadData["file_name"];

                    // Reading file

                    $file = fopen("assets/files/" . $filename, "r");

                    $i = 0;

                    $numberOfFields = 75; // Total number of fields

                    $importData_arr = [];

                    while (
                        ($filedata = fgetcsv($file, 100000, ",")) !== false
                    ) {
                        $num = count($filedata);

                        /*print_r($num);


                        print_r(' ');


                        print_r($numberOfFields);


                         // die();*/

                        // if($numberOfFields == $num){

                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }

                        // }

                        $i++;
                    }

                    fclose($file);

                    $skip = 0;

                    // print_r(count($importData_arr));

                    //  print_r($importData_arr); die();

                    // insert import data

                    foreach ($importData_arr as $userdata) {
                        // Skip first row

                        if ($skip != 0) {
                            $this->Main_model->insertRecord($userdata);
                        }

                        $skip++;
                    }

                    $data["response"] = "successfully uploaded " . $filename;
                } else {
                    $data["response"] = "failed ";
                }
            } else {
                $data["response"] = "5454545454failed";
            }

            $this->session->set_flashdata("response", $data["response"]);

            $this->load->view("admin/users/users_view", $data);
        } else {
            $this->load->view("admin/users/users_view");
        }
    }
}
