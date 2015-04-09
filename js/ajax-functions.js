$(document).ready(function() {
	var premierChargement = true;

	function loadData()
	{

		var deviceMAC;
		var deviceName;
		var deviceOS;
		var deviceOSVersion;
		var deviceProcessor;

		//System
		var systemRequest = $.ajax({
			url: "getSystemInfo.php",
			type: 'GET',
			data: {
				ip_host: $_GET['ip_host']
			},
			dataType: 'json'
		});
		systemRequest.done(function(data) {
			deviceOS = data['os_name'];
			deviceOSVersion = data['os_version'];
			deviceProcessor = data['processor'];
			$('#osName').text(data['os_name']);
			$('#osVersion').text(data['os_version']);
			$('#processeur').text(data['processor']);
		});

		//Network
		var systemRequest = $.ajax({
			url: "getNetworkInfo.php",
			type: 'GET',
			data: {
				ip_host: $_GET['ip_host']
			},
			dataType: 'json'
		});
		systemRequest.done(function(data) {
			deviceMAC = data['mac_address'];
			deviceName = data['host_name'];
			$('#ipAddress').text(data['ip_address']);
			$('#macAddress').text(data['mac_address']);
			$('#hostName').text(data['host_name']);
			$('#netmask').text(data['netmask']);
			$('#defaultGateway').text(data['default_gateway']);
			$('#primaryDNS').text(data['primary_dns']);
			$('#secondaryDNS').text(data['secondary_dns']);
		});

		// RAM
		var request = $.ajax({
			url: "getRAM.php",
			type: 'GET',
			data: {
				ip_host: $_GET['ip_host']
			},
			dataType: 'json'
		});

		request.done(function(data) {
			$('#percentUsedRAMBar').css({
				'width': data + '%'
			});
			$('#percentUsedRAM').text(data);

			if(data < 60) {
				$('#percentUsedRAMBar').addClass("alert");
			}
			else if(data < 80) {

			}
			else {

			}
		});

		// Uptime
		var requestUpTime = $.ajax({
			url: "getUpTime.php",
			type: 'GET',
			data: {
				ip_host: $_GET['ip_host']
			},
			dataType: 'json'
		});
		
		requestUpTime.done(function(data) {
			var date = new Date(data);
			$('#uptimeStartDate').text(date.toLocaleString());
		});

		// Disk space usage
		var requestDiskSpaceUsage = $.ajax({
			//url: "getNumberDisks.php",
			url: "getDiskSpaceUsage.php",
			type: 'GET',
			data: {
				ip_host: $_GET['ip_host']
			},
			dataType: 'json'
		});
		
		requestDiskSpaceUsage.done(function(data) {

			$('#listDisk').text('');
			var	listDisk = '';
			for (var i = 0; i < data.length; i++) {	

				currentDisk = data[i];
				listDisk += '<tr class="text-center">';
				listDisk += '<td>' + currentDisk['name'] +'</td>';
				listDisk += '<td>' + currentDisk['disk_type'] + '/ ' + currentDisk['disk_type_name'] +'</td>';
				if(currentDisk['percent_used'] < 70) {
					listDisk += '<td class="progress success has-tip" data-tooltip aria-haspopup="true" data-options="show_on:large" title="'+(currentDisk['used_space']/1000000).toFixed(2)+' Go / ' + (currentDisk['total_space']/1000000).toFixed(2) + ' Go">';
					listDisk += '<span class="meter" style="width: '+ currentDisk['percent_used'] +'%;"></span>';
				}
				else if(currentDisk['percent_used'] < 90) {
					listDisk += '<td class="progress has-tip" data-tooltip aria-haspopup="true" data-options="show_on:large" title="'+(currentDisk['used_space']/1000000).toFixed(2)+' Go / ' + (currentDisk['total_space']/1000000).toFixed(2) + ' Go">';
					listDisk += '<span class="meter" style="width: '+ currentDisk['percent_used'] +'%;"></span>';
				}
				else {
					listDisk += '<td class="progress alert has-tip" data-tooltip aria-haspopup="true" data-options="show_on:large" title="'+(currentDisk['used_space']/1000000).toFixed(2)+' Go / ' + (currentDisk['total_space']/1000000).toFixed(2) + ' Go">';
					listDisk += '<span class="meter" style="width: '+ currentDisk['percent_used'] +'%;"></span>';
				}
				listDisk += '</td>';
				listDisk += '</tr>';
			}
			
			$('#listDisk').append(listDisk);
		});

		setTimeout(function(){
			var requestSaveData = $.ajax({
				url: "saveDevice.php",
				type: 'POST',
				dataType: 'text',
				data: {
					deviceMAC: ''+deviceMAC,
					deviceName: ''+deviceName,
					deviceOS: ''+deviceOS,
					deviceOSVersion: ''+deviceOSVersion,
					deviceProcessor: ''+deviceProcessor
				}
			});

			requestSaveData.done(function(data) {
				alert('ok!');
			});
		}, 1000);
	}

	if(premierChargement)
	{
		loadData();
		premierChargement = false;
	}

	$('#refresh').click(function() {

		$('#refreshLogo').animateRotate(360, {
			duration: 500,
			easing: 'linear',
			complete: function () {},
			step: function () {}
		});

		loadData();

	});

});

$.fn.animateRotate = function(angle, duration, easing, complete) {
  var args = $.speed(duration, easing, complete);
  var step = args.step;
  return this.each(function(i, e) {
    args.complete = $.proxy(args.complete, e);
    args.step = function(now) {
      $.style(e, 'transform', 'rotate(' + now + 'deg)');
      if (step) return step.apply(e, arguments);
    };

    $({deg: 0}).animate({deg: angle}, args);
  });
};

var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});