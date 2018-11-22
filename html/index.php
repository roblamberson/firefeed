<?php	session_start();

include_once("../php/client.php");
$client = new http_client( $_SERVER['HTTP_USER_AGENT'] );

if( isset( $_SESSION["logged_in"] ) && isset( $_SESSION["username"] ) && isset( $_SESSION["userid"] ) ){
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




}else{
// call $client->USER_IP;
// call $client->device_type;


/**
 *  DISPLAY THE PUBLIC PAGE
 * 
 *  */



}




?>