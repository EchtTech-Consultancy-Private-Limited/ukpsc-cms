<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Import extends CI_Controller
{
    // construct

    public function __construct()
    {
        parent::__construct();

        // load model

        // $this->load->model('Emport_model', 'import');

        $this->load->helper(["url", "html", "form"]);

        $this->load->model("admin/Certificate_model", "Certificate_model");
    }

    public function index()
    {
        $this->load->view("import");
    }

    public function importFile()
    {
        if ($this->input->post("submit")) {
            // print_r("hiiiiiiiiiiiiiiiiii"); die();

            $path = "uploads/";

            // require_once APPPATH . "/third_party/PHPExcel.php";

            // $config['upload_path'] = $path;

            $config["upload_path"] = "uploads/";

            $config["allowed_types"] = "xlsx|xls|csv";

            $config["remove_spaces"] = true;

            $this->load->library("upload", $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("uploadFile")) {
                $error = [
                    "error" => $this->upload->display_errors(),
                ];
            } else {
                $data = [
                    "upload_data" => $this->upload->data(),
                ];
            }

            if (empty($error)) {
                if (!empty($data["upload_data"]["file_name"])) {
                    $import_xls_file = $data["upload_data"]["file_name"];
                } else {
                    $import_xls_file = 0;
                }

                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify(
                        $inputFileName
                    );

                    $objReader = PHPExcel_IOFactory::createReader(
                        $inputFileType
                    );

                    $objPHPExcel = $objReader->load($inputFileName);

                    $allDataInSheet = $objPHPExcel
                        ->getActiveSheet()
                        ->toArray(null, true, true, true);

                    $flag = true;

                    $i = 0;

                    foreach ($allDataInSheet as $value) {
                        if ($flag) {
                            $flag = false;

                            continue;
                        }

                        $inserdata[$i]["id"] = $value["A"];

                        $inserdata[$i]["name"] = $value["B"];

                        $inserdata[$i]["place"] = $value["C"];

                        $inserdata[$i]["number"] = $value["D"];

                        $i++;
                    }

                    // $result = $this->Certificate_model->insert($inserdata);

                    $result = $this->db->insert("test", $inserdata);

                    if ($result) {
                        echo "Imported successfully";
                    } else {
                        echo "ERROR !";
                    }
                } catch (Exception $e) {
                    die(
                        'Error loading file "' .
                            pathinfo($inputFileName, PATHINFO_BASENAME) .
                            '": ' .
                            $e->getMessage()
                    );
                }
            } else {
                echo $error["error"];
            }
        }

        $this->load->view("import");
    }
}
?>


