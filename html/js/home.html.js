
/**
 * Scripts to be ran before the 'me' ui is loaded. 
 *
 * Focusing mostly on the calls that need to be made to the server specically
 * and maybe some of the callbacks if they could be modulaized and eventually
 * objectified.
 * @since      x.x.x
 * @deprecated x.x.x Use new_function_name() instead.
 * @access     private
 *
 * @class
 * @augments parent
 * @mixes    mixin
 * 
 * @alias    realName
 * @memberof namespace
 *
 * @see  Function/class relied on
 * @link URL
 * @global
 *
 * @fires   eventName
 * @fires   className#eventName
 * @listens event:eventName
 * @listens className~event:eventName
 *
 * @param {type}   var           Description.
 * @param {type}   [var]         Description of optional variable.
 * @param {type}   [var=default] Description of optional variable with default variable.
 * @param {Object} objectVar     Description.
 * @param {type}   objectVar.key Description of a key in the objectVar parameter.
 * 
 * @return {type} Description.
 */ 
class User {

    constructor( id ) {
      this.id = id;
      console.log( "so i have to specify that this is for user "+id+" here inside this stupid function");

    }
  
    getDetails() {
        // console.log( "for some reason alerts do not work");
        // console.log( "so i have to specify that this is for user "+this.id+" here inside this stupid function");

        // alert( this.id );

        console.log( this.first_name );

        // $.post("../home.php", {task:"user-info", user_id:this.id}, function( _res_ ){



        // }, "json");


    }

    sendInData(){

        var data = {    task:"me-details",
                        first_name:this.first_name,
                        last_name:this.last_name,
                        organization:this.organization,
                        titles:this.titles,
                        city:this.city,
                        country:this.country,
                        about_me:this.about_me,
                        email:this.email,
                        website:this.website,
                        telephone:this.telephone,
                        cellular:this.cellular,
                        social_profile_url:this.social_profile_url,
                        user_id:this.id };
                        console.log("this is what we're going to send to the server");
                        console.log( data );

                        console.log("sending shit to server");
        $.post("../home.php", data, function( _res_ ){

            console.log( _res_ );

        }, "json");

    }

    setDetails(){



    }

  
  }  // end of class user



function _page_init(){

    // $("#publicity-view").hide();

    // $("#content-view").hide();

    // $("#blog-view").hide();

    // $("#boards-view").hide();

    // $("#chat-view").hide();


}

$( document ).ready(function() {

   // $("#publicity-page").hide();
    //content-page
    //blog-engine
    //boards-page
    //chat-server
    //
    //

});