$(document).ready(function() {
	var premierChargement = true;

	function loadData()
	{

		var deviceMAC;
		var deviceName;
		var deviceOS;
		var deviceOSVersion;
		var deviceProcessor;

		var ipAddress_save;
		var netmask_save;
		var defaultGateway_save;
		var primaryDNS_save;
		var secondaryDNS_save;

		var usedRAM_save;
		var totalRAM_save;
		var percentUsedRAM_save;


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
			$('#availableProcessors').text(data['available_processors']);
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
			ipAddress_save = data['ip_address'];
			netmask_save = data['netmask'];
			defaultGateway_save = data['default_gateway'];
			primaryDNS_save = data['primary_dns'];
			secondaryDNS_save = data['secondary_dns'];

			$('#ipAddress').text(data['ip_address']);
			$('#ipAddressNetwork').text(data['ip_address']);
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

			usedRAM_save = data['used_ram'];
			totalRAM_save = data['total_ram'];
			percentUsedRAM_save = data['percent_used_ram'];

			var percentRAM = data['percent_used_ram'];
			$('#percentUsedRAMBar').css({
				'width': percentRAM + '%'
			});
			$('#percentUsedRAM').text(data['percent_used_ram']);

			if(data['percent_used_ram'] < 50) {
				$('#percentUsedRAMParent').addClass("success");
			}
			else if(data['percent_used_ram'] >= 80) {
				$('#percentUsedRAMParent').addClass("alert");
				var requestSendAlertRAM = $.ajax({
					url: "send-alertphp",
					type: 'POST',
					data: {
						deviceMac: deviceMAC,
						errorType: 'RAM'
					},
					dataType: 'text'
				});
			}
			$('#usedRAM').text(((data['used_ram']*1024)/1073741824).toFixed(2));
			$('#totalRAM').text(((data['total_ram']*1024)/1073741824).toFixed(2));
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
				listDisk += '<tr>';
				listDisk += '<td class="large-3">' + currentDisk['name'] +'</td>';
				listDisk += '<td class="large-3">' + currentDisk['disk_type'] + '/ ' + currentDisk['disk_type_name'] +'</td>';
				listDisk += '<td class="large-3">';
				if(currentDisk['percent_used'] < 70) {
					listDisk += '<div class="progress large-8 columns success">';
				}
				else if(currentDisk['percent_used'] < 90) {
					listDisk += '<div class="progress large-8 columns">';
				}
				else {
					listDisk += '<div class="progress large-8 columns alert">';
				}
				listDisk += '<span class="meter" style="width: '+ currentDisk['percent_used'] +'%;"></span>';
				listDisk += '</div>';
				listDisk += '<div class="progress large-4 columns">';
				listDisk +=  ''+ (currentDisk['percent_used']/1).toFixed(1) +' %';
				listDisk += '</div>';
				listDisk += '</td>';
				listDisk += '<td class="large-3">';
				listDisk += ((currentDisk['used_space']*1024)/1073741824).toFixed(2) + ' Go / ';
				listDisk += ((currentDisk['total_space']*1024)/1073741824).toFixed(2) + ' Go';
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
					deviceProcessor: ''+deviceProcessor,
					ipAddress: ''+ipAddress_save,
					netmask: ''+netmask_save,
					defaultGateway: ''+defaultGateway_save,
					primaryDNS: ''+primaryDNS_save,
					secondaryDNS: ''+secondaryDNS_save,
					usedRAM: ''+usedRAM_save,
					totalRAM: ''+totalRAM_save,
					percentUsedRAM: ''+percentUsedRAM_save
				}
			});

			requestSaveData.done(function(data) {
				
			});
		}, 4000);
	}

	if(premierChargement)
	{
		loadData();
		premierChargement = false;
	}

});

var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});