<?php

session_start();

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

                     //$counter = 0;

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


  $home = new home_page( array( "username" => $_SESSION["username"], "email" => $_SESSION["email"], "user_id" => $_SESSION["user_id"] ) );

//    echo json_encode( $home->head_scripts );

    /**
     * The info that needs to be built up here 
     * 
     *  - head javascripts
     *  - body interfaces
     *  - body javascripts
     * 
     */



     $gui = array( "head" => $home->head_scripts, "module_ui" => $home->module_ui_files, "body" => $home->body_scripts, "modules" => $home->detected_modules );
     echo json_encode( $gui );


}else{ // the user is not logged in per session data

    // redirect to public/login page
//    echo file_get_contents("public-redirect.html");
    echo json_encode( "not" );
}

?>
