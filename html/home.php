<?php

session_start();

class home_page {

    public $head_script_tags;
    public $detected_modules;
    public $module_ui_files;
    public $xml_files;

    /**
     * Home Page User Details
     *  */
    public $username;
    public $user_id;
    public $email;

    public function __construct( ){

  

            $this->head_script_tags = array();
            $this->detected_modules = array();
            $this->module_ui_files = array();
            $this->xml_files = array();


        $this->scan_modules_dir();
    }

     public function scan_modules_dir(){

        $counter = 0;

        $modules_container = "elements";

        $folder = scandir( $modules_container );

        foreach( $folder as $module ){

            if( is_dir( $modules_container . DIRECTORY_SEPARATOR . $module ) && !strpos( $module, ".") ){

                 if( file_exists($modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $module . ".xml") ){

                     $this->detected_modules[ $module ] = $module;
// //simplexml_load_file( $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $module . ".xml" );
                     $this->xml_files[ $module ] = simplexml_load_file( $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $module . ".xml" );
                    
                    $str = "";

                     foreach( $this->xml_files[ $module ]->head_js_files->head_js_file as $val ){

                         $str = $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR .$val;

                         $this->head_script_tags[ $counter ] = $str; $counter++;

                     }

                     $this->module_ui_files[ $module ] = $modules_container . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR .$this->xml_files[ $module ]->ui_file;


                 }


            }


        }

    }

}


if( isset( $_SESSION["username"] ) && isset( $_SESSION["email"] ) && isset( $_SESSION["user_id"] ) ){

    // run a check to make sure this user makes sense here
    //$page = new home_page( $_SESSION["username"] );

    //$page->user_id  = $_SESSION["user_id"];

  //  $page->email    = $_SESSION["email"];
  $home = new home_page(  );

//   $home->user_id  = $_SESSION["user_id"];

//   $home->email    = $_SESSION["email"];
    echo json_encode( $home->head_script_tags );

    //echo json_encode( "fuck" );

}else{ // the user is not logged in per session data

    // redirect to public/login page
//    echo file_get_contents("public-redirect.html");
    echo json_encode( "not" );
}

?>
