<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Users extends CI_Controller
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

                $config["max_size"] = "1000"; // max_size in kb

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

                    $numberOfFields = 4; // Total number of fields

                    $importData_arr = [];

                    while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                        $num = count($filedata);

                        if ($numberOfFields == $num) {
                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata[$c];
                            }
                        }

                        $i++;
                    }

                    fclose($file);

                    $skip = 0;

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
                    $data["response"] = "failed";
                }
            } else {
                $data["response"] = "failed";
            }

            // load view

            $this->load->view("users_view", $data);
        } else {
            // load view

            $this->load->view("users_view");
        }
    }
}
