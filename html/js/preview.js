// Terrible code written in a terrible hurry

// Basic Table Search
try {
	var options = {
		valueNames: ["company", "contact", "city", "website", "name"]
	};

	new List('inventory-search', options);
} catch (e) {}

$(function() {
	// Example links should alert a message
	$('.example-link').click(function(event) {
		event.preventDefault();
		alert("This link does not go anywhere. It's only an example.");
	});
});


$(function() {
	if (!$('#example-graph').length) {
		return;
	};
	// var rand = function(min, max) {
	// 	return Math.floor(Math.random() * (max - min)) + min
	// };
	// var i = 0;
	// var sample_data = [];
	// while (i < 100) {
	// 	var d = new Date();
	// 	d.setDate(d.getDate() - (100 - i));

	// 	sample_data.push({
	// 		y: d.getTime(),
	// 		a: rand(3000, 3600) + i * rand(20, 30),
	// 		b: rand(1500, 2000) + i * rand(30, 40)
	// 	});
	// 	i++;
	// }

	var sample_data = [{"y":1408871086519,"a":3077,"b":1813},{"y":1408957486519,"a":3046,"b":1834},{"y":1409043886519,"a":3469,"b":1673},{"y":1409130286519,"a":3198,"b":1802},{"y":1409216686519,"a":3550,"b":1979},{"y":1409303086519,"a":3428,"b":1901},{"y":1409389486519,"a":3356,"b":1775},{"y":1409475886519,"a":3314,"b":2088},{"y":1409562286519,"a":3690,"b":1935},{"y":1409648686519,"a":3246,"b":2285},{"y":1409735086519,"a":3425,"b":1883},{"y":1409821486519,"a":3634,"b":1981},{"y":1409907886519,"a":3576,"b":2298},{"y":1409994286519,"a":3523,"b":2009},{"y":1410080686519,"a":3559,"b":2073},{"y":1410167086519,"a":3506,"b":2147},{"y":1410253486519,"a":3992,"b":2595},{"y":1410339886519,"a":4007,"b":2260},{"y":1410426286519,"a":4067,"b":2198},{"y":1410512686519,"a":3679,"b":2656},{"y":1410599086519,"a":4058,"b":2290},{"y":1410685486519,"a":3824,"b":2534},{"y":1410771886519,"a":3978,"b":2267},{"y":1410858286519,"a":3949,"b":2450},{"y":1410944686519,"a":3667,"b":2437},{"y":1411031086519,"a":3923,"b":2659},{"y":1411117486519,"a":3693,"b":2466},{"y":1411203886519,"a":3791,"b":2928},{"y":1411290286519,"a":4091,"b":2711},{"y":1411376686519,"a":4377,"b":2628},{"y":1411463086519,"a":4083,"b":3124},{"y":1411549486519,"a":3926,"b":2735},{"y":1411635886519,"a":4159,"b":2563},{"y":1411722286519,"a":3804,"b":3043},{"y":1411808686519,"a":4347,"b":2952},{"y":1411895086519,"a":4172,"b":2764},{"y":1411981486519,"a":4270,"b":2994},{"y":1412067886519,"a":4297,"b":2978},{"y":1412154286519,"a":4334,"b":3046},{"y":1412240686519,"a":4080,"b":3135},{"y":1412327086519,"a":4419,"b":3064},{"y":1412413486519,"a":4523,"b":3034},{"y":1412499886519,"a":4521,"b":3400},{"y":1412586286519,"a":4349,"b":3305},{"y":1412672686519,"a":4218,"b":3287},{"y":1412759086519,"a":4235,"b":3550},{"y":1412845486519,"a":4601,"b":3511},{"y":1412931886519,"a":4232,"b":3440},{"y":1413018286519,"a":4727,"b":3292},{"y":1413104686519,"a":4770,"b":3608},{"y":1413191086520,"a":4808,"b":3296},{"y":1413277486520,"a":4480,"b":3577},{"y":1413363886520,"a":4832,"b":3673},{"y":1413450286520,"a":4354,"b":3498},{"y":1413536686520,"a":4904,"b":3777},{"y":1413623086520,"a":4320,"b":4061},{"y":1413709486520,"a":4747,"b":3734},{"y":1413795886520,"a":4406,"b":3779},{"y":1413882286520,"a":4508,"b":3832},{"y":1413968686520,"a":5036,"b":3372},{"y":1414055086520,"a":5140,"b":3865},{"y":1414141486520,"a":5147,"b":3714},{"y":1414227886520,"a":4408,"b":4263},{"y":1414314286520,"a":5307,"b":3621},{"y":1414400686520,"a":5093,"b":3452},{"y":1414487086520,"a":4921,"b":4254},{"y":1414573486520,"a":4880,"b":3871},{"y":1414659886520,"a":4538,"b":4003},{"y":1414746286520,"a":4705,"b":3963},{"y":1414832686520,"a":5091,"b":4194},{"y":1414919086520,"a":4680,"b":3932},{"y":1415005486520,"a":4884,"b":3750},{"y":1415091886520,"a":5402,"b":4099},{"y":1415178286520,"a":5592,"b":4175},{"y":1415264686520,"a":5001,"b":4391},{"y":1415351086520,"a":5427,"b":4204},{"y":1415437486520,"a":5108,"b":4333},{"y":1415523886520,"a":5521,"b":4837},{"y":1415610286520,"a":5305,"b":4207},{"y":1415696686520,"a":5280,"b":4755},{"y":1415783086520,"a":5338,"b":4530},{"y":1415869486520,"a":4832,"b":4501},{"y":1415955886520,"a":5066,"b":4677},{"y":1416042286520,"a":5944,"b":4316},{"y":1416128686520,"a":5815,"b":4287},{"y":1416215086520,"a":4955,"b":4256},{"y":1416301486520,"a":5382,"b":4711},{"y":1416387886520,"a":5350,"b":4983},{"y":1416474286520,"a":5900,"b":4715},{"y":1416560686520,"a":5311,"b":4938},{"y":1416647086520,"a":5313,"b":5284},{"y":1416733486520,"a":5844,"b":4699},{"y":1416819886520,"a":5783,"b":5497},{"y":1416906286520,"a":5738,"b":5482},{"y":1416992686520,"a":5497,"b":4795},{"y":1417079086520,"a":5866,"b":5253},{"y":1417165486520,"a":5229,"b":5409},{"y":1417251886520,"a":6006,"b":4581},{"y":1417338286520,"a":5914,"b":5490},{"y":1417424686520,"a":5433,"b":4787}];

	Morris.Line({
		element: 'example-graph',
		data: sample_data,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Revenue', 'Units Sold'],
		smooth: false,
		ymin: 1000,
		xLabels: 'month',
		resize: true,
		xLabelFormat: function(d) {
			var curr_date = d.getDate();
			var curr_month = d.getMonth();
			var curr_year = d.getFullYear();
			var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

			return monthNames[curr_month] + ' ' + curr_year;
		}
	});
});

// Add an active class to the currently used link in the navigation
$(function() {
	// Sometimes 'html' does not exist in the path
	var file_name = document.location.pathname.match(/[^\/]+$/)[0];
	var current_navigation = $('.flakes-navigation ul li a[href="' + file_name + '"]');

	current_navigation.parent().addClass('active');

	var nav_items = $('.flakes-navigation ul li a');
	nav_items.each(function() {
		var text = $(this).text();
		$(this).attr('title', text);
	});
});