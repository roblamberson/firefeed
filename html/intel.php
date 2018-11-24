<?php   session_start();
/**
 * intel.php is just for exhanging information between client and server
 * about non-application things like environment info, device details,
 * and location.
 * @category   Logging, Locations
 * @package    PackageName
 * @author     Original Author <robertlamberson.com>
 * @author     Another Author <another@example.com>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 * @link       http://pear.php.net/package/PackageName
 * @since      
 * @deprecated File deprecated in Release 2.0.0
 */

$config = include('../config.php');
//echo $config["php_dir"]."/data.php";
require $config["php_dir"]."/data.php";
require $config["php_dir"]."/client.php";



if( isset( $_POST["task"] ) ){

    switch( $_POST["task"] ){

        case "visit":

            $client = new http_client( $_SERVER ['HTTP_USER_AGENT'] );
            //$client = array();
            foreach( $client->props as $key ){

                if( $key == "phone_code" ){

                    $client->phone_code = $_POST["phone"];

                }else if( $key == "phone_code" ){

                    $client->location = $_POST["loc"];

                }else if( $key == "ip_via_browser" ){                    

                    $client->ip_via_browser = $_POST["ip"];

                }else if( $key == "location" ){    

                    $client->location = $_POST["loc"];

                }else if( $key == "device_type" ){                        
                    // don't need to do nothin' here...
                }else{

                    $client->$key = $_POST[ $key ];

                }

            }
        
            $id = $client->log_visit();
        
            echo json_encode( $id );
    
        break;

    }






}else{

    echo json_encode( false );


}

?>