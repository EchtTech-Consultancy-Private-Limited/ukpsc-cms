<?php



defined('BASEPATH') OR exit('No direct script access allowed');



/*

  |--------------------------------------------------------------------------

  | Display Debug backtrace

  |--------------------------------------------------------------------------

  |

  | If set to TRUE, a backtrace will be displayed along with php errors. If

  | error_reporting is disabled, the backtrace will not display, regardless

  | of this setting

  |

 */

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);



/*

  |--------------------------------------------------------------------------

  | File and Directory Modes

  |--------------------------------------------------------------------------

  |

  | These prefs are used when checking and setting modes when working

  | with the file system.  The defaults are fine on servers with proper

  | security, but you may wish (or even need) to change the values in

  | certain environments (Apache running a separate process for each

  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should

  | always be used to set the mode correctly.

  |

 */

defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);

defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);

defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);

defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);



/*

  |--------------------------------------------------------------------------

  | File Stream Modes

  |--------------------------------------------------------------------------

  |

  | These modes are used when working with fopen()/popen()

  |

 */

defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');

defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');

defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care

defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care

defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');

defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');

defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');

defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');



/*

  |--------------------------------------------------------------------------

  | Exit Status Codes

  |--------------------------------------------------------------------------

  |

  | Used to indicate the conditions under which the script is exit()ing.

  | While there is no universal standard for error codes, there are some

  | broad conventions.  Three such conventions are mentioned below, for

  | those who wish to make use of them.  The CodeIgniter defaults were

  | chosen for the least overlap with these conventions, while still

  | leaving room for others to be defined in future versions and user

  | applications.

  |

  | The three main conventions used for determining exit status codes

  | are as follows:

  |

  |    Standard C/C++ Library (stdlibc):

  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html

  |       (This link also contains other GNU-specific conventions)

  |    BSD sysexits.h:

  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits

  |    Bash scripting:

  |       http://tldp.org/LDP/abs/html/exitcodes.html

  |

 */

defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors

defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error

defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error

defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found

defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class

defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member

defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input

defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error

defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code

defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



defined('IDPROOFLIST') OR define('IDPROOFLIST', array(1 => 'Aadhar Card', 2 => 'Driving Licence ', 3 => 'Pan Card ', 4 => 'Passport',5 => 'Voter Id'));



defined('ALLOWED_ROLE_ID') OR define('ALLOWED_ROLE_ID', array(

            1 => array(2, 3, 4, 5, 6,7),

            2 => array(3, 4, 5, 6,7),

            3 => array(4, 5, 6,7),

            4 => array(5, 6,7),

            5 => array(6,7),

            6 => array(7)

        ));



defined('SYSTEMS_OF_MEDICINE') OR define('SYSTEMS_OF_MEDICINE', array(

            1 => "Allopathy",

            2 => "Ayurveda",

            3 => "Unani",

            4 => "Siddha",

            5 => "Homoeopathy",

            6 => "Yoga",

            7 => "Naturopathy",

            8 => "Sowa-Rigpa"

        ));



defined('CLINICAL_SERVICES') OR define('CLINICAL_SERVICES', array(

            1 => "General",

            2 => "Single Specialty",

            3 => "Multi Specialty",

            4 => "Super Specialty",

            5 => "Others"

        ));





defined('FILE_MOVEMENT') OR define('FILE_MOVEMENT', array(

    1 => "Draft",

    2 => "Applied", 

    3 => "Rejected", 

    4 => "Hold",

    5 => "Approved",

    6 => "Forword To Next Level",

    7 => "Forword To",

    8 => "Applied for Renew"));









defined('ALLOWED_FILE_MOVEMENT_ROLE_ID') OR define('ALLOWED_FILE_MOVEMENT_ROLE_ID', array(

            1 =>  array(1 => "A", 2 => "B",3 => "C", 4 => "Black Listed"),

            2 =>  array(1 => "A", 2 => "B",3 => "C", 4 => "Black Listed"),

            3 =>  array(1 => "A", 2 => "B",3 => "C", 4 => "Black Listed"),

            4 =>  array(1 => "A", 2 => "B",3 => "C", 4 => "Black Listed"),

            5 =>  array(1 => "A", 2 => "B",3 => "C", 4 => "Black Listed"),

            6 => array(1 => "Draft", 2 => "Applied")

        ));

defined('ALLOWED_FILE_MOVEMENT_ROLE_ID_DEACTIVATION') OR define('ALLOWED_FILE_MOVEMENT_ROLE_ID_DEACTIVATION', array(

            1 => array(1 => "Draft", 2 => "Applied",3 => "Reject", 4 => "Hold", 5 => "Approved"),

            2 => array(3 => "Rejected", 4 => "Hold", 5 => "Approved",7=>"Forword To" ),

            3 => array(3 => "Rejected", 4 => "Hold", 5 => "Approved",6 => "Forword To Next Level"),

            4 => array(3 => "Rejected", 4 => "Hold", 5 => "Approved",6 => "Forword To Next Level"),

            5 => array(3 => "Rejected", 5 => "Approved"),

            6 => array(1 => "Draft", 2 => "Applied")

        ));



defined('USER_NAME') OR define('USER_NAME', array(

    1 => "Super Admin",

    2 => "National Council", 

    3 => "State Council", 

    4 => "State Admin",

    5 => "District Registering Authority",

    6 => "Clincal User"));



defined('ALLOWED_OFFICER_ROLE_ID') OR define('ALLOWED_OFFICER_ROLE_ID', array(

            1 => array(1 => "District Registering Authority", 2 => "State Council",3 => "National Council", 4 => "Hold", 5 => "Approved"),

            2 => array(5 => "District Registering Authority", 4 => "State Admin",3 => "State Council"),

            3 => array(2 => "National Council"),

            4 => array(3 => "State Council", 4 => "National Council"),

            5 => array(3 => "State Admin", 4 => "State Council", 5 => "National Council"),

            6 => array(1 => "District Registering Authority"),

            // 6 => array(1 => "Draft", 2 => "Applied")

        ));

// defined('ALLOWED_OFFER_NC') OR define('ALLOWED_OFFER_NC', array(

//             2 => array(1 => "District Registering Authority", 2 => "State Admin",3 => "State Council"),

//                 ));  



		

defined('GRIEVANCE_STATUS') OR define('GRIEVANCE_STATUS', array(

            1 => array(1 => "All Complaints", 2 => "Pending",3 => "In process", 4 => "Solved", 5 => "Rejected"),

            

        ));







defined('APPLICATION_MODE') OR define('APPLICATION_MODE', array(0 => "Offline", 

    1 => "Online"));



defined('ID_PROOF_LIST') OR define('ID_PROOF_LIST', array(

  "1" => 

          "Driving License",

            "7" => "Others",

            "3" => "PAN Card",

            "2" => "Passport",

            "5" => "Ration Card",

            "4" => "Voter I-Card"));



define('ENCRYPT_METHOD', 'AES-256-CBC');

define('SECRET_KEY', '291E39C6B7654E6DAE2945B898C37');

define('SECRET_IV', 'F537D27BC81A69B3B3F631A51D699');



defined('PAYMENT_OPTIONS') OR define('PAYMENT_OPTIONS', array("1" => "Online Payment",

            "2" => "Demand Draft",

            "3" => "Bank Challan"));



defined('POLLUTION_CONTROL') OR define('POLLUTION_CONTROL', array("1" => "Yes",

            "2" => "No",

            "3" => "Applied For",

            "4" => "Not Applicable"));



defined('BIOMEDICAL_WASTE') OR define('BIOMEDICAL_WASTE', array("1" => "Through Common Facility",

            "2" => "Onsite Facility",

            "3" => "Any other"));



defined('FILE_UPLOAD') OR define('FILE_UPLOAD', array(

            "1" => "Registration Certificate of the society/trust/company if applicable",

            "2" => "Registration Certificate from the Council of Doctors/for person-in charge if applicable",

            "3" => "Bio-medical authorization Certificate from SPCB/PCC",

            "4" => "Staff Details",

            "5" => " Employee list"));





