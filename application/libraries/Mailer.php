<?php



class Mailer 



{



	function __construct()



	{



		$this->CI =& get_instance();



        $this->CI->load->helper('email');



	}



     //=============================================================



    // Eamil Templates



    function mail_template($to = '',$slug = '',$mail_data = '')
    {

        $template =  $this->CI->db->get_where('ci_email_templates',array('slug' => $slug))->row_array();

        // var_dump($template);exit();
        $body = $template['body'];
        $template_id = $template['id'];
        $data['head'] = $subject = $template['subject'];
        $data['content'] = $this->mail_template_variables($body,$slug,$mail_data);
     //print_r($data);die;
        $data['title'] = $template['name'];
        $template =  $this->CI->load->view('admin/general_settings/email_templates/email_preview', $data,true); 
        send_email($to,$subject,$template);
        return true;



    }
 








    //=============================================================



    // GET Eamil Templates AND REPLACE VARIABLES



    function mail_template_variables($content,$slug,$data = '')



    {



        switch ($slug) {



            case 'email-verification':



                $content = str_replace('{FULLNAME}',$data['fullname'],$content);



                $content = str_replace('{EMAIL}',$data['email'],$content);



                $content = str_replace('{VERIFICATION_LINK}','Verify your email: <a href="'.$data['verification_link'].'" style="text-decoration: underline;color: #3F51B5;">Click Here</a>',$content);

                

                return $content;



            break;

            

            

            case 'exam-schedule':



                $content = str_replace('{FULLNAME}',$data['fullname'],$content);



                $content = str_replace('{EMAIL}',$data['email'],$content);



                $content = str_replace('{VERIFICATION_LINK}',$data['verification_link'],$content);



                return $content;



            break;







            case 'email-otp-verification':



                $content = str_replace('{FULLNAME}',$data['fullname'],$content);



                $content = str_replace('{VERIFICATION_OTP}',$data['email-otp-verification'],$content);



                return $content;



            break;







            case 'forget-password':



                $content = str_replace('{FULLNAME}',$data['fullname'],$content);


                $content = str_replace('{RESET_LINK}','Reset Password: <a href="'.$data['reset_link'].'" style="text-decoration: underline;color: #3F51B5;">Click Here</a>',$content);
                // $content = str_replace('{RESET_LINK}',$data['reset_link'],$content);



                return $content;



            break;







            case 'general-notification':



                $content = str_replace('{CONTENT}',$data['content'],$content);



                return $content;



            break;



        



            case 'welcome-email':



                $content = str_replace('{FULLNAME}',$data['fullname'],$content);



                $content = str_replace('{USERNAME}',$data['username'],$content);



                $content = str_replace('{PASSWORD}',$data['password'],$content);
                return $content;
            break;
            case 'primary-registration':
                return $content;
            break;
            case 'registration-completed':
                return $content;
            break;
            case 'send-consent':
                $content = str_replace('{examname}',$data['examname'],$content);
                return $content;
            break;
            case 'send-consent-1':
                $content = str_replace('{examname}',$data['examname'],$content);
                return $content;
            break;
            case 'allocation-sent':
                $content = str_replace('{examname}',$data['examname'],$content);
                return $content;
            break;
            case 'consent-not-send':
                return $content;
            break;
            case 'apply-consent-school':
                $content = str_replace('{examname}',$data['examname'],$content);
                $content = str_replace('{Centre}',$data['Centre'],$content);
                return $content;
            break;
            case 'apply-consent-school-1':
                $content = str_replace('{examname}',$data['examname'],$content);
                return $content;
            break;

            default:



                # code...



                break;



        }



    }







	//=============================================================



	function registration_email($username, $email_verification_link)



	{



    $login_link = base_url('auth/login');  







		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>



            <p>Welcome to LightAdmin!</p>



            <p>Active your account with the link above and start your Career :</p>  



            <p>'.$email_verification_link.'</p>







            <br>



            <br>







            <p>Regards, <br> 



               CodeGlamoour Team <br> 



            </p>



    ';



		return $tpl;		



	}







	//=============================================================



	function pwd_reset_email($username, $reset_link)



	{



		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>



            <p>Welcome to LightAdmin!</p>



            <p>We have received a request to reset your password. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p> 



            <p>To reset your password, please click the link below:</p> 



            <p>'.$reset_link.'</p>







            <br>



            <br>







            <p>© 2018 CodeGlamoour - All rights reserved</p>



    ';



		return $tpl;		



	}







}



?>