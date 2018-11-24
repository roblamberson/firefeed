<?php	session_start();

include_once("../php/client.php");
$client = new http_client( $_SERVER['HTTP_USER_AGENT'] );

if( isset( $_SESSION["email"] ) && isset( $_SESSION["username"] ) && isset( $_SESSION["user_id"] ) ){
    // call $client->USER_IP;
    // call $client->device_type;

/** 
 *  Check to see if the user is intentionally logged in
 * 
 * 
*/  //if( $_SESSION["userid"] ){

    /**
     * - check that the details provided in session data seem to make sense
     * - check the user's account type and provide appropriate options
     *   to access interfaces for that account type
     */

    //}

    echo "Public Content";
    echo " Plus User Options";


}else{
// call $client->USER_IP;
// call $client->device_type;

echo "Public Content";

/**
 *  DISPLAY THE PUBLIC PAGE
 * 
 *  */



}




?>