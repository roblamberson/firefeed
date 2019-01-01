console.log( "me body" );

$.post("../home.php", { task:"user-session-info" }, function( info ){

  //  console.log( "session data from server from the module files this time." ); console.log( info );
    // this is where we can use the server's user session data to 
    // deal with whatever shit the interface can't do without.

    $( "#details_me" ).html( " " + info.username + "'s details" );
    //b-username
    $("#b-username").html( info.username );

    $("#b-user-id").html( info.user_id );

    $("#b-user-id").data( "user-id", info.user_id );

    $("#email").val( info.email );

    if( info.first_name !== false ){

        $("#first_name").val( info.first_name );
        $("#last_name").val( info.last_name );
        $("#organization").val( info.organization );
        $("#titles").val( info.titles );
        $("#city").val( info.city );
        $("#country").val( info.country );
        $("#about_me").text( info.about_me );
        $("#email").val( info.email );
        $("#website").val( info.website );
        $("#telephone").val( info.telephone );
        $("#cellular").val( info.cellular );
        $("#social_profile_url").val( info.social_profile_url );

    }else{

        console.log( "that's all the shit we've got" );

    }

}, "json");							


$("#btn_save_details").on("click", function( event ){
    /**
     * Remember to create a data-variable on each of the tags 
     * so that it'll be easier to compare if there are changes
     * when the update buttons is clicked.
     */
console.log("saving the shit");
    user_id = $("#b-user-id").data( "user-id" );
    //let user = new User( user_id );
    first_name = $("#first_name").val();
    last_name = $("#last_name").val();
    organization = $("#organization").val();
    titles = $("#titles").val();
    city = $("#city").val();
    country = $("#country").val();
    about_me = $("#about_me").val();
    email = $("#email").val();
    website = $("#website").val();
    telephone = $("#telephone").val();
    cellular = $("#cellular").val();
    social_profile_url = $("#social_profile_url").val();

    var data = {    task:"me-details",
                    first_name:first_name,
                    last_name:last_name,
                    organization:organization,
                    titles:titles,
                    city:city,
                    country:country,
                    about_me:about_me,
                    email:email,
                    website:website,
                    telephone:telephone,
                    cellular:cellular,
                    social_profile_url:social_profile_url,
                    user_id:user_id
};
    console.log("this is what we're going to send to the server");
    console.log( data );

    console.log("sending shit to server");
$.post("../home.php", data, function( _res_ ){

console.log( _res_ );

}, "json");


} );