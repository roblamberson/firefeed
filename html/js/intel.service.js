
var intel = {

	/*
		intel.visit
		Recieves information from browser and data sources (currently from ipinfo.io)
		and sends that data to the server. 
	*/
    visit: function( info ){   info["task"] = "visit";

        $.post("intel.php", info, function( _d_ ){

            console.log( _d_ );

        }, "json");

    }


};