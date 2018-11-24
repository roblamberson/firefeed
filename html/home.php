<?php session_start();

$config = include('../config.php');

require $config["php_dir"]."/data.php";
require $config["php_dir"]."/client.php";



// class me {

//     public $user_id;
//     public $first_name;
//     public $last_name;
//     public $organization;
//     public $titles;
//     public $city;
//     public $country;
//     public $about_me;
//     public $email;
//     public $website;
//     public $telephone;
//     public $cellular;
//     public $social_profile_ur;
//     public $details;
//     public $info;

//     public function __construct(){

//         $this->info = array(    "first_name",       "last_name",
//                                 "organization",     "titles",
//                                 "city",             "country",
//                                 "about_me",         "email",
//                                 "website",          "telephone",
//                                 "cellular",         "social_profile_url"   );

//     }

//     public function TableUpdate(){




//     }

//     public function TableInsert(){



//     }

//     public function UpdateOrInsert(){

//         global $database;

//         $pres = $database->select
        

//     }


// }

class home_page {

    public $head_scripts;
    public $body_scripts;
    public $detected_modules;
    public $module_ui_files;
    public $xml_files;

    /**
     * Home Page User Details
     *  */
    public $username;
    public $user_id;
    public $email;

    /**
     * The construct expects $params to be an array that contains
     * user info that will eventually be used to determine which
     * or what content or options are built into the UI for
     * the user.  Mostly, it will figure out whether or not
     * to offer adminitrative options or user-specific calls
     * from plugins or extensions.
     */
    public function __construct( $params = false ){

        if( $params ){
            /** */
            $this->username     = $params["username"];
            $this->user_id      = $params["user_id"];
            $this->email        = $params["email"];

            $this->head_scripts     = array();
            $this->detected_modules = array();
            $this->module_ui_files  = array();
            $this->xml_files        = array();

            $this->scan_modules_dir();

        }

    }

     public function scan_modules_dir(){

        $hcounter = 0; $bcounter = 0;

        $modules_container = "elements";

        $folder = scandir( $modules_container );

        foreach( $folder as $module ){

            if( is_dir( $modules_container . DIRECTORY_SEPARATOR . $module ) && !strpos( $module, ".") ){

                 if( file_exists($modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $module . ".xml") ){

                     $this->detected_modules[ $module ] = $module;

                     $this->xml_files[ $module ] = simplexml_load_file( $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $module . ".xml" );
                    
                    $str = "";

                     foreach( $this->xml_files[ $module ]->head_js_files->head_js_file as $val ){

                         $str = $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR .$val;

                         $this->head_scripts[ $hcounter ] = $str; $hcounter++;

                     }

                     foreach( $this->xml_files[ $module ]->end_body_js_files->end_body_js_file as $val ){

                        $str = $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR .$val;

                        $this->body_scripts[ $bcounter ] = $str; $bcounter++;

                    }                     

                    $this->module_ui_files[ $module ] = $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR .$this->xml_files[ $module ]->ui_file;


                 }


            }


        }

    }

}

if( isset( $_SESSION["username"] ) && isset( $_SESSION["email"] ) && isset( $_SESSION["user_id"] ) ){

     if( isset( $_POST["load"] ) ){

        $home = new home_page( array( "username" => $_SESSION["username"], "email" => $_SESSION["email"], "user_id" => $_SESSION["user_id"] ) );

        $ui = array( "head" => $home->head_scripts, "module_ui" => $home->module_ui_files, "body" => $home->body_scripts, "modules" => $home->detected_modules );
        
        echo json_encode( $ui );

     }else if( isset( $_POST["task"] ) ){ 

        switch( $_POST["task"] ){

            case "user-session-info":

            $details = array(    "user_id"   =>  $_SESSION["user_id"], 
                                 "username"  =>  $_SESSION["username"],
                                 "email"     =>  $_SESSION["email"] );

            $user = new ff_user();
            $user->user_id = $details["user_id"];

            $more = $user->chk4userDetails();

            if( $more ){

                echo json_encode( $more[0] );

            }else{

                echo json_encode( array(    "user_id"       =>  $_SESSION["user_id"], 
                                            "username"      =>  $_SESSION["username"],
                                            "email"         =>  $_SESSION["email"],
                                            "first_name"    =>  false ) );

            }


            // echo json_encode( array(    "user_id"   =>  $_SESSION["user_id"], 
            //                             "username"  =>  $_SESSION["username"],
            //                             "email"     =>  $_SESSION["email"] ) );

            break;
            case "me-details":
                //  We need to at least count our posted variables before trying to insert them
                //  into the database.
                //  We're also going to need to instantiate the ff_user to use for saving details
                $counter = 0; $user = new ff_user();
                //  use the expected params to check for, then assign key variables from $_POST
                foreach( $user->info as $key ){

                    if( isset( $_POST[ $key ] ) ){ $counter++; $user->$key = $_POST[ $key ]; }

                }

                if( $counter >= 12 ){

                    if( $user->chk4userDetails() ){ $user->updateDetails(); echo json_encode( "updated" );

                    }else{                          $user->saveDetails(); echo json_encode( "inserted" );

                    }

                }else{ echo json_encode( false ); }

            break;

        }

    }

}else{ // the user is not logged in per session data
      
    echo json_encode( "no-sessions" );

  }
  

?>
