$(document).ready(function() {

	$('#loader').hide();

	$('#launchScanNetwork').click(function() {

		var host = $('#currentIPAddress').val();
		host = host.split('.');
		host = host[0] + '.' + host[1] + '.' + host[2] + '.';


		$('#launchScanNetwork').text('Scan in progress...');
		$('#launchScanNetwork').prop("disabled", true);
		$('#devices').text('');
		//$('#devices').removeClass('panel');
		$('#devices').switchClass('panel', '', 500, 'easeInOutQuad');
		$('#scanLauncher').switchClass('large-3', 'large-4 large-push-4', 1000, 'easeInOutQuad');
		$('#loader').show(500);

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
					ip: host + ip_start
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
						    messageErreur = '<i class="fi-lock text-alert"></i><span class="text-alert"> Unavailable supervision sensor</span>';
						}
						else {
							ram = ram.replace(/[\n]/gi, "");
						}

						if(messageErreur != '') {
							line += '<div class="large-3 columns" style="opacity: 0.8;" data-equalizer-watch>';
						}
						else {
							line += '<div class="large-3 columns cursor-pointer" onClick="document.location.href=\'device-details.php?ip_host='+ip+'\'" data-equalizer-watch>';
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
											line += '<i class="fi-unlock text-success"></i><span class="text-success"> Check the device</span>';
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
				if(current/coef < 100) {
					$('#loaderBar').removeClass('success');
				}
				else {
					$('#scanLauncher').removeClass('large-4 large-push-4');
					$('#scanLauncher').addClass('large-3');
					$('#loaderBar').addClass('success');
					$('#launchScanNetwork').text('Scan the network');
					$('#launchScanNetwork').prop("disabled", false);
				}
			});
		}

	});

});