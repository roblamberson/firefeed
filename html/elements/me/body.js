console.log( "me body" );

$("#btn_save_details").on("click", function( event ){
    /**
     * Remember to create a data-variable on each of the tags 
     * so that it'll be easier to compare if there are changes
     * when the update buttons is clicked.
     */

    user_id = $("#b-user-id").data( "user-id" );
    let user = new User( user_id );
    user.first_name = $("#first_name").val();
    user.last_name = $("#last_name").val();
    user.organization = $("#organization").val();
    user.titles = $("#titles").val();
    user.city = $("#city").val();
    user.country = $("#country").val();
    user.about_me = $("#about_me").val();
    user.email = $("#email").val();
    user.website = $("#website").val();
    user.telephone = $("#telephone").val();
    user.cellular = $("#cellular").val();
    user.social_profile_url = $("#social_profile_url").val();
    user.sendInData();

    //console.log( "sending to server now" );
    // $.post("../../home.php", details, function( data ){

    //     console.log( data );

    // }, "json");



} );