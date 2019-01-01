<?php 

class http_client {

    public $props = ["device_type", "ip_via_browser", "hostname", "org", "city", "country", "region", "postal", "location", "phone_code"];

    public $ip_via_server;

    public $ip_via_browser;

    public $hostname;

    public $org;

    public $city;

    public $country;

    public $region;

    public $postal;

    public $location;

    public $phone_code;

    public $REMOTE_ADDR;

    public $HTTP_CLIENT_IP;

    public $HTTP_X_FORWARDED_FOR;

    public $USER_IP;

    public $device_type;

    public function __construct(  $useragent ){

        $this->USER_IP = $this->getUserIP();

        if( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $useragent, 0, 4) ) ){
            
            $this->device_type = "mobile";

        }else{

            $this->device_type = "fixed";
            
        }        

    }

    public function log_visit(){

        global $database;

        $effort = array();

        $effort["device_type"] = $this->device_type;

        $effort["ip_via_server"] = $this->USER_IP;

        $effort["ip_via_browser"] = $this->ip_via_browser;

        $effort["hostname"] = $this->hostname;

        $effort["org"] = $this->org;

        $effort["city"] = $this->city;

        $effort["country"] = $this->country;

        $effort["region"] = $this->region;

        $effort["postal"] = $this->postal;

        $effort["location"] = $this->location;

        $effort["phone_code"] = $this->phone_code;

        if ( $database->insert("visits", $effort) ){

            return $database->id();

        }else{

            return false;

        }

    }

    public function getUserIP(){
    // Get real visitor IP behind CloudFlare network
        if( isset( $_SERVER["HTTP_CF_CONNECTING_IP"] ) ){

            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        
        }

        $this->HTTP_CLIENT_IP = @$_SERVER['HTTP_CLIENT_IP'];

        $this->HTTP_X_FORWARDED_FOR = @$_SERVER['HTTP_X_FORWARDED_FOR'];

        $this->REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];

        if( filter_var( $this->HTTP_CLIENT_IP, FILTER_VALIDATE_IP ) ){

            $ip = $client;

        }else if( filter_var( $this->HTTP_X_FORWARDED_FOR, FILTER_VALIDATE_IP ) ){
            
            $ip = $this->HTTP_X_FORWARDED_FOR;
        
        }else{

            $ip = $this->REMOTE_ADDR;
        
        }
    
        return $ip;

    }
    
}
//$user_ip = getUserIP();
//echo $user_ip; // Output IP address [Ex: 123.11.222.123]

/**
 * Provides simple method to register new users of the system
 *
 * @category   Registration Entry, Authorization, User Validation
 * @package    PackageName
 * @author     Original Author <robertlamberson@msn.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      Class available since Release 1.2.0
 * @deprecated Class deprecated in Release 2.0.0
 */
class registration {
    
    public $id;

    public $email;
    
    public $username;
    
    public $password;
    
    public $ip_address;
    
    public $reg_code;
    
    private $error;
    
    public $errors;
    
    private $error_i;
    
    private $status;
    
    private $reqs;
    
    // the registration class __construct drives the entire registration process

    // the function executes a series of tests against the supplied parameters to make 
    // sure the information is acceptable to use in our table.

    // i'm still not convinced that i'm not going to want to have an option to instantiate the 
    // class without any parameters, so I'm leaving the current declaration's $params as it is.
    public function __construct( $params = false ){ // change params to array once false is irrelevant
        
        $this->reqs = ["email", "username", "password"];        
        
        $this->status = false;
        
        $this->error_i = 0;
        
        if( is_array( $params ) ){
            
            if( array_intersect_key( $this->reqs, array_keys( $params ) ) == $this->reqs ){
              // all required parameters were passed
                // Make sure the email "looks" okay
                // and if so:
                //          - check that domain makes sense
                //          - check for conflicts in db
                if( $this->validifyEMail( $params["email"] ) ){
            
                   if( !$this->qUsersEmails( $params["email"], $this->status ) ){
                        // Check that username is fit
                        if( $this->chkUsernameChars( $params["username"] ) ){
                            
                            if( !$this->qUsername( $params["username"], $this->status ) ){
                                //  username is not found in db
                                
                                // Check the password to make sure it's okay
                                // before permitting insert
                                if( $this->chkPwd( $params["username"], $params["password"] ) ){
                                    
                                    $this->username = $params["username"];

                                    $this->password = $params["password"];

                                    $this->email = $params["email"];

                                    $this->reg_code = $this->generateCode();
                                    
                                    $this->id = $this->status = $this->entry();

                                }
                                
                            }else{
                                
                                // username is found in db
                            }
                            
                        }else{
                            
                        }
                        
                   }
                    
                }else{
                    
                }                 
              
            }            

        }else if( is_string( $params ) ){
        // for now we will use this option to provide login support for the site_user class
            // set the email value for registration lookup
            // to potentially hold for impending qUsersEmail() usage


            if( strpos( $params, "@" ) ){

                $basics = $this->qUsersEmails( $params );
            //    $this->email = $basics[0]["email"];
                $this->password = $basics[0]["password"];
               // $this->password = $this->email->password;
                $this->password = $basics[0]["password"];

            }else{
//"id", "registered", "password", "email", "last_login"
                $basics = $this->qUsername( $params );
                $this->last_login = $basics[0]["last_login"];
                $this->registered = $basics[0]["registered"];
                $this->password = $basics[0]["password"];
                $this->email = $basics[0]["email"];
                $this->id = $basics[0]["id"];

            }

        }

    }
    
    protected function chkUsernameChars( $string ){
        
        return ! preg_match( "/[^a-z\d_-]/i", $string );
    
    }

    public function recognizeByUsername( $password ){

        if( password_verify( $password, $this->password ) ){
            // Successful, return data.
            return [$this->username, $this->id, $this->email, $this->registered, $this->last_login];

        }else{
            // Invalid credentials
            return false;

        }

    }

    public function recognizeByEmail( $password ){

            if( password_verify( $password, $this->password ) ){
                // Success!
                return true;
            }else{
                // Invalid credentials
                return false;
            }

    }

    // private function logAccess( $user_id, ){



    // }

    private function entry(){

        global $database;

        $options = [
            'salt' => $this->reg_code, //write your own code to generate a suitable salt
            'cost' => 12 // the default cost is 10
        ];

        $hash = password_hash( $this->password, PASSWORD_DEFAULT, $options );

        $today = time();

        $inf = [    "email"         =>  $this->email,
                    "username"      =>  $this->username,
                    "password"      =>  $hash,
                    "reg_code"      =>  $this->reg_code,
                    "status"        =>  $options['cost'],
                    "verified"      =>  0,
                    "resettable"    =>  0,
                    "roles_mask"    =>  3310,
                    "registered"    =>  $today,
                    "last_login"    =>  $today,
                    "force_logout"  =>  0   ];

        $database->insert( "users", $inf );

        return $database->id();

    }
    
    function generateCode( $length = 22 ) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charsLength = strlen( $characters );

        $randomString = '';

        for ( $i = 0; $i < $length; $i++ ) {

            $randomString .= $characters[ rand( 0, $charsLength - 1 ) ];

        }

        return $randomString;

    }    

    protected function incErrorCount( $e ){
        //$this->error_i++;
        if( !is_array( $this->errors ) ){ $this->errors = array(); }
        
        $this->errors[ $this->error_i++ ] = $e;
        
    }
    
    /*
        Checks for DNS availability
        &$status should be given ref result of operation
        
  */private function domainCheck( $domain, &$status ){
        
            if( !checkdnsrr( $domain, 'MX' ) ){
                // domain is not valid
                return $status = false;

            }else{ return true; }
        
    }
    
    
    public function qUsersEmails( $email, &$status = false ){
        
        global $database;
        // rowCount is still broken
        $info = $database->select("users", ["id", "password", "username", "registered", "last_login"], ["email"=>$email]);
        
        if( $info ){
            
            $status = false;
            
            return $info;
            
        }else{
            
            $status = true; 
            
            return false;
            
        }
        
    }
    
    public function qUsername( $username, &$status = false ){
        
        global $database;
        // rowCount is still broken
        $info = $database->select("users", ["id", "registered", "password", "email", "last_login"], ["username"=>$username]);
        
        if( $info ){
            
            $status = false;
            
            return $info;
            
        }else{
            
            $status = true; 
            
            return false;
            
        }
        
    }    
    
    
    protected function validifyEMail( $email ){
        
        if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
            // invalid emailaddress
            $this->status = false;
            
            $this->incErrorCount( "Malformed Email Provided" );
            
            return false;
            
        }else{
            
            $domain = substr(strrchr($email, "@"), 1);

            if( $this->domainCheck( substr( strrchr( $email, "@" ), 1 ), $this->status ) ){
                
                return true;
                
            }else{
                
                return $this->status;
                
                $this->incErrorCount( "Unrecognized Domain Per DNS" );
                
            }
            
        }
        
    }
    
    public function chkPwd( $user, $pass ) {
        
        $word_file = '10k-most-common.txt';
        
        $lc_pass = strtolower( $pass );
        // also check password with numbers or punctuation subbed for letters
        $denum_pass = strtr( $lc_pass, '5301!', 'seoll' );
        
        $lc_user = strtolower( $user );
    
        // the password must be at least six characters
        if ( strlen( $pass ) < 6 ) {
            
            $this->status = false;
            
            $this->incErrorCount( "NEEDS MORE CHARACTERS" );
            
            return false;
        
        }
    
        // the password can't be the username (or reversed username) 
        if( ( $lc_pass == $lc_user ) || ( $lc_pass == strrev( $lc_user ) ) ||
            ( $denum_pass == $lc_user ) || ( $denum_pass == strrev( $lc_user ) ) ) {

            $this->status = false;
            
            $this->incErrorCount( "USERNAME IN PASSWORD" );
            
            return false;
        
        }
    
        // count how many lowercase, uppercase, and digits are in the password 
        $uc = 0; $lc = 0; $num = 0; $other = 0;

        for( $i = 0, $j = strlen( $pass ); $i < $j; $i++ ) {
            
            $c = substr( $pass, $i, 1 );

            if( preg_match( '/^[[:upper:]]$/', $c) ) {

                $uc++;

            }elseif( preg_match( '/^[[:lower:]]$/', $c) ) {

                $lc++;

            }elseif( preg_match( '/^[[:digit:]]$/', $c) ) {

                $num++;

            }else{

                $other++;

            }

        }
    
        // the password must have more than two characters of at least 
        // two different kinds 
        $max = $j - 2;
        if( $uc > $max ){

            $this->status = false;
            
            $this->incErrorCount( "EXCESSIVE CAPITALIZATIONS" );
            
            return false;
        
        }
        if( $lc > $max ){

            $this->status = false;
            
            $this->incErrorCount( "MORE CAPITAL LETTERS NEEDED" );
            
            return false;
        
        }
        if( $num > $max ){

            $this->status = false;
            
            $this->incErrorCount( "EXCESSIVE NUMERALS" );
            
            return false;
        
        }
        if( $other > $max ){

            $this->status = false;
            
            $this->incErrorCount( "EXCESSIVE SPECIAL CHARACTERS" );
            
            return false;
        
         }
    
        // the password must not contain a dictionary word 
        if( is_readable( $word_file ) ){
            
            if( $fh = fopen( $word_file, 'r') ){
                
                $found = false;
                
                while( !( $found || feof( $fh ) ) ) {
                
                    $word = preg_quote( trim( strtolower( fgets( $fh, 1024) ) ), '/');
                
                    if( preg_match( "/$word/", $lc_pass ) || preg_match( "/$word/", $denum_pass ) ){
                
                        $found = true;
                
                    }
                
                }
                
                fclose( $fh );
                
                if( $found ) {

                    $this->status = false;
                    
                    $this->incErrorCount( "PASSWORD PRESENCE IN DICTIONARY" );
                    
                    return false;
        
                }
        
            }
        
        }
    
        return true;
    
    }

    public function getState(){
        
        return $this->status;
        
    }
    
}

class ff_user {

    public $first_name;
    public $last_name;
    public $organization;
    public $titles;
    public $city;
    public $country;
    public $about_me;
    public $email;
    public $website;
    public $telephone;
    public $cellular;
    public $social_profile_url;
    public $user_id;
    public $info;

    public function __construct(){

        $this->info = array(    "first_name",       "last_name",
                                "organization",     "titles",
                                "city",             "country",
                                "about_me",         "email",
                                "website",          "telephone",
                                "cellular",         "social_profile_url",
                                "user_id"   );

    } 



    public function chk4userDetails(){

        global $database;

        $us = $database->select("users_details", $this->info, ["user_id"=>$this->user_id]);

        if( $us ){      return $us;
        }else{          return false;
        }

    }

    public function saveDetails(){

        global $database;

        $details = array();

        foreach( $this->info as $key ){

            $details[ $key ] = $this->$key;

        }

        $database->insert("users_details", $details);

        return true;


    }

    public function updateDetails(){
        global $database;
        $database->update("users_details", [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "organization" => $this->organization,
            "titles" => $this->titles,
            "city" => $this->city,
            "country" => $this->country,
            "about_me" => $this->about_me,
            "email" => $this->email,
            "website" => $this->website,
            "telephone" => $this->telephone,
            "cellular" => $this->cellular,
            "social_profile_url" => $this->social_profile_url,
        ], [
            "user_id" => $this->user_id
        ]);
         
            return true;


    }

}

// class ff_user {

//     private $password;
//     public $username;
//     public $id;
//     public $email;
//     private $register_record;
//     public $results;

//     public function __construct( $params ){

//         if( is_array( $params ) ){

//             if( isset( $params["username"] ) && isset( $params["password"] ) ){
//                 $this->username = $_POST["username"];
//                 $this->register_record = new registration( $params["username"] );
//                 $results = $this->register_record->recognizeByUsername( $params["password"] );
//                 if( $restuls ){

//                     $this->email = $results["email"];
//                     $this->id = $results["id"];

//                 }else{

//                     $this->email = false;
//                 }
//                 //$this->email = $this->results["email"];

//             }

//         }


//     }


// }


?>