/*
	intel object is for getting information about the visitors
	and providing that information to the server.
	


*/
$.getJSON("http://ipinfo.io", function (data) {

    intel.visit( data );

});

var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

function checkUserName( username ){

    var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
	
	if( pattern.test( username ) ){

        //alert("Please only use standard alphanumerics");
        return false;
    }else{

		return true; //good user input

	}
}


function register( email, username, password ){
    console.log("sending off data to server");
    $.post("../handler.php", {task:"registration", email:email, username:username, password:password},
    function( data ){

        console.log( data );

    }, "json");


}