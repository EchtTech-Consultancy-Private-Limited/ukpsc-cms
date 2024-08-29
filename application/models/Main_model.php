<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    function insertRecord($record){
        
        if(count($record) > 0 &&  !empty($record[0])){
            $this->db->select('*');
            $this->db->where('Old_cerrs_id', $record[0]);
            $q = $this->db->get('ci_certificate_provisional');
            $response = $q->num_rows();
            if($response == 0){
                $newuser = array(
                    "Old_cerrs_id" => trim($record[0]),  //CERRID   -0
                    "establishment" => trim($record[1]),  //EstName   -1
                    "address1" => trim($record[2]),  //EstAddress1   -2
                    "address2" => trim($record[3]),  //EstAddress2  -3
                    "city" => trim($record[4]),  //EstVillage  -
                    "pin" =>  trim($record[5]),  //EstPin  -5
                    "std" =>  trim($record[6]),  //EstSTD  -6
                    "telephone" =>  trim($record[7]),  //EstPhone  -7
                    "mobile" =>  trim($record[8]),  //EstMobile  -8
                    "fax" =>  trim($record[9]),  //EstFax  -9
                    "email" =>  trim($record[10]),  //EstEmail  -10
                    "website" =>  trim($record[11]),  //EstWebsite  -11
                    "district" =>  trim($record[12]),  //DistrictID  -12
                    "state" =>  trim($record[13]),  //StateID  -13
                    "fname_owner" =>  trim($record[14]),  //ApplicantName  -14
                    "mname_owner" =>  trim($record[15]),  //ApplicantMiddleName  -15
                    "lname_owner" =>  trim($record[16]),  //ApplicantLastName  -16
                    "add1_owner" =>  trim($record[19]),  //ApplicantAddress1  -17
                    "add2_owner" =>  trim($record[20]),  //ApplicantAddress2  -18
                    "city_owner" =>  trim($record[21]),  //ApplicantVillage  -19
                    "state_owner" =>  trim($record[22]),  //ApplicantStateID  -20
                    "district_owner" =>  trim($record[23]),  //ApplicantDistrictID  -21
                    "pin_owner" =>  trim($record[24]),  //ApplicantPin  -22
                    "std__owner" =>  trim($record[25]),  //ApplicantSTD  -23
                    "telephone_owner" =>  trim($record[26]),  //ApplicantPhone  -24
                    "mobile_owner" =>  trim($record[27]),  //ApplicantMobile  -25
                    "email_owner" =>  trim($record[28]),  //ApplicantEmail  -26
                    "website_owner" =>  trim($record[29]),  //ApplicantWebsite  -27
                    /*For System of medicine */
                    "systems_of_medicine" => trim($record[31]).','.trim($record[32]).','.trim($record[33]).','.trim($record[34]).','. trim($record[35]).','.trim($record[36]).','.trim($record[38]).','.trim($record[39]),  //Allopathy  28
                     /* For Clinical Establishment  */
                    "clinical_establishment" => trim($record[40]).','.trim($record[41]).','.trim($record[42]).','.trim($record[43]).','.trim($record[44]).','.trim($record[45]).','.trim($record[46]).','.trim($record[47]).','.trim($record[48]).','.trim($record[49]).','.trim($record[50]).','.trim($record[52]).','.trim($record[53]).','.trim($record[54]).','.trim($record[54]).','.trim($record[55]).','.trim($record[56]).','.trim($record[57]).','.trim($record[58]).','.trim($record[58]).','.trim($record[58]).','.trim($record[58]).','.trim($record[59]).','.trim($record[60]).','.trim($record[61]).','. trim($record[62]).','.trim($record[63]).','.trim($record[64]).','.trim($record[65]).','.trim($record[66]).','.trim($record[67]).','.trim($record[68]).','.trim($record[69]).','.trim($record[70]).','.trim($record[71]).','.trim($record[72]).','.trim($record[73]).','.trim($record[74]).','.trim($record[75]).','.trim($record[76]).','.trim($record[77]).','.trim($record[78]).','.trim($record[79]).','.trim($record[80]).','.trim($record[81]).','.trim($record[82]).','.trim($record[83]),
                     /* For Clinical Establishment ends */
                    "certificate_number" =>  trim($record[86]), //CertificateNO  -79
                    /*Person in Charge details */
                    "fname_person" =>  trim($record[108]),//PersonInchargeName  -80
                    "mname_person" =>  trim($record[109]),//PersonInchargeMiddleName  -81
                    "lname_person" =>  trim($record[110]),//PersonInchargeLastName  -82
                    "person_registration" =>  trim($record[111]),//PersonRegNum  -83
                    "person_central_cauncil" =>  trim($record[112]),//PersonRegOrg  -84
                    "std_person" =>  trim($record[113]),//PersonSTD  -85
                    "telephone_person" =>  trim($record[114]),//PersonPhone  -86
                    "mobile_person" =>  trim($record[115]),//PersonMobile  -87
                    "email_person" =>  trim($record[116]),//PersonEmail  -88
                     /*Person in Charge details */
                    "remark_dra" =>  trim($record[92]), //RemarkDRA  -89
                    "created_by" =>  trim($record[98]),//CreatedBy  -90
                    "created_at" =>  trim($record[97]),//CreatedDate  -91
                    "updated_by" =>  trim($record[99]),//ModifiedBy  -92
                    "updated_at" =>  trim($record[100]),//ModifiedDate  -93
                );
                $this->db->insert('ci_certificate_provisional', $newuser);
            }
            
        }
        
    }

/*for uploading districts in database */
    // function insertRecord($record){

    //     if(count($record) > 0){
    //         $this->db->select('*');
    //         $this->db->where('name', $record[0]);
    //         $q = $this->db->get('ci_towns');
    //         $response = $q->result_array();
    //         if(count($response) == 0){
    //             $newuser = array(
    //                 "name" => trim($record[0]),  //CERRID   -0
    //                 "slug" => trim($record[1]),  //EstName   -1
    //                 "state_id" => trim($record[2]),  //EstAddress1   -2
    //                 "status" => trim($record[3]),  //EstAddress2  -3
    //                 // "city_id" => trim($record[4]),  //EstAddress2  -3                   
    //             );

    //             $this->db->insert('ci_towns', $newuser);
    //         }
            
    //     }
        
    // }
}