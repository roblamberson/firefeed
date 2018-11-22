<?php session_start();


$config = include('../config.php');

require $config["php_dir"]."/data.php";
require $config["php_dir"]."/client.php";

if( isset( $_POST["task"] ) ){

    switch( $_POST["task"] ){

        case "registration":

            $creds= array( "email"      =>  $_POST["email"],
                            "username"  =>  $_POST["username"],
                            "password"  =>  $_POST["password"] );
    
            $reg = new registration( $creds );

            if( $reg->getState() ){

                echo json_encode( true );

            }else{

                //echo json_encode( false );
                echo json_encode( $reg->errors[0] );

            }

        break;
        case "login":

            $reg = new registration( $_POST["username"] );
            if( $reg->recognizeByUsername( $_POST["password"] ) ){

                $_SESSION["username"] = $_POST["username"];
                $_SESSION["email"] = $reg->email;
                $_SESSION["user_id"] = $reg->id;
                echo json_encode( true );

            }else{

                echo json_encode( false );
            }


        break;

    }


}


?>
