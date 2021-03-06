<!DOCTYPE html>
<html>
	<head>
		<title>G4Monitor - Homepage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	</head>

	<body>

		<script>

			$(document).ready(function() {

				var line = "";
				var ip_start = 1;
				var ip_end = 254;
				var percent = 0;
				var coef = (ip_end / 100).toFixed(2);
				var current = 1;

				for (ip_start ; ip_start <= ip_end; ip_start++) {

					var request = $.ajax({
						url: "scanner.php",
						type: 'POST',
						data: {
							ip: '192.168.31.' + ip_start
						},
						dataType: 'text'
					});

					request.done(function(ip) {
						
						if(ip != '') {

							var line = '';
							var messageErreur = '';
							var ram;

							var request = $.ajax({
								url: "getRAM.php",
								type: 'POST',
								data: {
									ip_host: ip
								},
								dataType: 'text'
							});
							request.done(function(ram) {
								if (ram.indexOf("Could not") !=-1) {
								    messageErreur = 'Sonde de supervision indisponible';
								}
								else {
									ram = ram.replace(/[\n]/gi, "");
								}

								if(messageErreur != '') {
									line += '<div class="large-3 columns">';
								}
								else {
									line += '<div class="large-3 columns" onClick="document.location.href=\'index.php?ip_host='+ip+'\'">';
								}
									line += '<div class="panel radius">';
										line += '<div class="large-12">';
											line += '<h2 class="text-center"><i class="fi-monitor"></i></h2>';
										line += '</div>';
										line += '<div class="large-12">';
											line += '<div class="text-center">';
												line += '<span>'+ip+'</span><br/>';
												if(messageErreur != '') {
													line += messageErreur;
												}
												else {
													line += '<div class="progress large-12">';
													line +='<span id="percentUsedRAMBar" class="meter" style="width: '+ram+'%"></span>';
													line+= '</div>';
												}
											line += '</div>';
										line += '</div>';
									line += '</div>';
								line += '</div>';
								$('#devices').append(line);
							});

						}

						$('#percentLoaded').css({
							'width': current++/coef + '%'
						});
						$('#percentLoadedNumber').text((current/coef).toFixed(0));
					});
				}

			});

		</script>

		<div class="row">
			<div id="loader" class="large12 text-center">
				<div class="progress large-10 large-offset-1">
					<span id="percentLoaded" style="width: 0%" class="meter">
						<span id="percentLoadedNumber"></span> %
						<span ></span>
					</span>
				</div>
			</div>
		</dov>

		<div class="row">
			<div id="devices">
				
			</div>
		</div>
	</body>
</html>