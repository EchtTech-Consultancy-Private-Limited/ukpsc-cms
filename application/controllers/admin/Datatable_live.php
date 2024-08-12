  





<?php





//defined('BASEPATH') or exit('No direct script access allowed');





class Datatable_live extends MY_Controller


{


      public function __construct()


      {


            parent::__construct();


            // auth_check(); // check login auth


            $this->load->model('admin/admin_model', 'admin_model');


            $this->load->model('admin/location_model', 'location_model');


            $this->load->model('admin/Certificate_model', 'Certificate_model');


            $this->load->helper('date');


      }


      public function data_table()


      {


          


      // $que = $this->db->query('SELECT * FROM ci_certificate_provisional' )->result_array();


       


      $this->db->select('ci_certificate_provisional.*, ci_states.name as statename ');


      $this->db->from('ci_certificate_provisional');


      $this->db->join('ci_states',


                'ci_states.id =ci_certificate_provisional.state');


      // $this->db->where('ci_certificate_provisional.id', $id);


      $this->db->order_by('ci_states.name', 'asc');


      $this->db->group_by('state');


      $query = $this->db->get();


      $que = $query->result_array();?>


                 


      


     <title>table</title><style>.container{max-width:1100px;margin:auto}table{border-collapse:collapse;width:100%}table tr th{text-align:inherit;font-weight:400;height:auto;padding:15px;border:1px solid #ddd;background:#00a7b5;color:#fff}table tr td{text-align:inherit;font-weight:400;height:auto;padding:15px;border:1px solid #ddd}</style>


    


            <div class="container mt-2 mb-2">


			<h1 class="js-quickedit-page-title title page-title">National Register of Clinical Establishments</h1>


                  <table>


                        <tr class="HeaderStyle">


                              <th>State</th>


                              <th>Allopathy</th>


                              <th>Ayurveda</th>


                              <th>Unani</th>


                              <th>Siddha</th>


                              <th>Homoeo -pathy</th>


                              <th>Yoga</th>


                              <th>Natura -pathy</th>


                              <th>Sowa -Rigpa</th>


                        </tr>  


                 <?php       foreach ($que as $value) { $x=explode(',',$value['systems_of_medicine']); ?>      


                        <tr>


                              <td  align="center"><?=$value['statename'];?></td>





                              <td align="center"><?php 


                              $n = 0;


                              foreach( $x as $y){


                                    if($y == 1){


                                          $n += 1;


                                    }





                              }





                              echo $n;


                        ?></td>


                        <td align="center"><?php 


                              $n1 = 0;


                              foreach( $x as $y1){


                                    if($y1 == 2){


                                          $n1 += 1;


                                    }





                              }





                              echo $n1;


                        ?></td>


                        <td align="center"><?php 


                              $n2 = 0;


                              foreach( $x as $y2){


                                    if($y2 == 2){


                                          $n2 += 1;


                                    }





                              }





                              echo $n2;


                        ?></td>





                        <td align="center"><?php 


                              $n3 = 0;


                              foreach( $x as $y3){


                                    if($y3 == 3){


                                          $n3 += 1;


                                    }





                              }





                              echo $n3;


                        ?></td>


                        <td align="center"><?php 


                              $n4 = 0;


                              foreach( $x as $y4){


                                    if($y4 == 4){


                                          $n4 += 1;


                                    }





                              }





                              echo $n4;


                        ?></td>


                        <td align="center"><?php 


                              $n5 = 0;


                              foreach( $x as $y5){


                                    if($y5 == 5){


                                          $n5 += 1;


                                    }





                              }





                              echo $n5;


                        ?></td>


                        <td align="center"><?php 


                              $n6 = 0;


                              foreach( $x as $y6){


                                    if($y6 == 6){


                                          $n6 += 1;


                                    }





                              }





                              echo $n6;


                        ?></td>


                        <td align="center"><?php 


                              $n7 = 0;


                              foreach( $x as $y7){


                                    if($y7 == 7){


                                          $n7 += 1;


                                    }





                              }


                              echo $n7;


                        ?></td>                  


                        </tr>


                  <?php  } ?>           


                  </table>


                  <p align="center">* The difference in total is due to a Clinical Establsihments may have more than one system of medicine operational</p>


				 


            </div>