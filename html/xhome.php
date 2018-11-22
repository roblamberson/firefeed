<?php

session_start();
/**
 * I intend to make it an option to render
 * the interface and it's data primarily
 * using javascript as an alternative to php.
 * Somewhere in the admin settings will be
 * an option to render home in browser vs. server
 * so that there is a more asynchronous option
 * available.
 * 
 * This variable is what I will currently put in
 * the place of having that mechanism in place.
 */ $anon_var_4_rendering_options = "server";

/**
 * I want home to access:
 * - user account info
 * - page creation / editing
 * - document creation / editing
 * - post creation / editing
 * - message service
 * 
 * 
 *  */  class home_page {

    public $username;
    public $user_id;
    public $email;
    
    public $module_head_scripts;
    public $poss_mods;
    public $xml_test;
    public $head;
    public $head_scripts;
    public $head_script_tags;
    public $ui_files;

    public $menu;

    public function __construct( $params = false ){

        global $anon_var_4_rendering_options;

        if( is_string( $params ) ){

            $this->username = $params;

        }

        if( $anon_var_4_rendering_options == "server" ){

            $this->module_head_scripts = array();
            
            $this->ui_files = array();
            
            $this->scan_elements_dir();
            
            $this->buildHeadMarkup();
            
            $this->formMenu();

        }

    }

    public function scan_elements_dir(){

        $dir    = 'elements';
        
        $files1 = scandir($dir);
        
        $this->poss_mods = array(); 
        
        $this->xml_test = array();    $s=0;
        
        $this->head_scripts = array();
        
        foreach( $files1 as $key => $value ){

            if( is_dir( $dir . DIRECTORY_SEPARATOR . $value ) ){

                if ( strpos( $value, ".") === false) {
                    
                    if( file_exists($dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR . $value . ".xml") ){

                        $this->poss_mods[$value] = $value;

                        $this->xml_test[$value] = simplexml_load_file( $dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR . $value . ".xml" );
                        
                        $str = "";

                        foreach( $this->xml_test[$value]->head_js_files->head_js_file as $val ){

                            $str = $dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR .$val;

                            $this->head_scripts[$s++] = $str;

                        }

                        $this->ui_files[$value] = $dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR .$this->xml_test[$value]->ui_file;

                    }

                }

            }

        }

    }

    /**
     * buildHeadMarkup
     * 
     * Builds the head markup needed by home
     * 
     *  Uses $this->head_scripts array to form
     *  the script tags needed by the application.
     *
     * @return string
     */
    public function buildHeadMarkup(){

        echo file_get_contents("head/home.html");

        $this->head_script_tags = "";

        foreach( $this->head_scripts as $value ){

           $this->head_script_tags .= "<script src=\"" . $value . "\"></script>";

        }

        $this->head = file_get_contents("head/home.html").$this->head_script_tags."</head>";

    }

    public function formMenu(){

        $this->menu = "<ul id=\"ul-home-menu\">";

        foreach( $this->poss_mods as $key => $value ){

            $this->menu .= "<li id='".$value."_li'><a href='#' title='".$value."'>".$value."</a></li>";

        }

        $this->menu .= "</ul>";

    }


}

if( isset( $_SESSION["username"] ) && isset( $_SESSION["email"] ) && isset( $_SESSION["user_id"] ) ){

    // run a check to make sure this user makes sense here
    $page = new home_page( $_SESSION["username"] );

    $page->user_id  = $_SESSION["user_id"];

    $page->email    = $_SESSION["email"];

    echo $page->head;

    echo "<body data-userid=\"".$page->user_id."\" data-username=\"". $_SESSION["username"]."\" data-email=\"".$page->email."\">";
    
    ?>
    <div class="flakes-frame">
    <div class="flakes-navigation">
        <a href="home.php" class="logo"><img src="img/logo.png" width="120"></a>
<?php    echo $page->menu;  ?>
    <p class="foot">Hello <b> 
        <?php echo $_SESSION["username"]; ?> 
    </b><br>
    <a href="#">Logout</a></p>
</div>
<div class="flakes-content">
    <div class="flakes-mobile-top-bar">
        <a href="" class="logo-wrap"><img src="img/logo.png" height="30px"></a>
        <a href="" class="navigation-expand-target"><img src="img/site-wide/navigation-expand-target.png" height="26px"></a>
    </div>
<?php // This is grabbing each of the module's UI files and spitting them out into the content area
foreach( $page->ui_files as $v ){ 
    echo file_get_contents( $v );
    echo "<br>";
 }
?>
        </div><!-- /flakes-content -->";
    </div><!-- /flakes-frame -->";
<?php // print out some hidden elements that give us some info about what we're working with
foreach( $page->poss_mods as $key => $value ){ echo "<input type=\"hidden\" name=\"view-names\" value=\"".$value."\" >"; }

echo file_get_contents("body/home-lower.html");

}else{ // the user is not logged in per session data

    // redirect to public/login page
    echo file_get_contents("public-redirect.html");

}

?>
