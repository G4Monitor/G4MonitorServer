$(document).ready(function() {
	var premierChargement = true;

	function loadData()
	{

		//System
		var systemRequest = $.ajax({
			url: "getSystemInfo.php",
			type: 'POST',
			dataType: 'json'
		});
		systemRequest.done(function(data) {
			$('#osName').text(data['os_name']);
			$('#osVersion').text(data['os_version']);
		});

		//Network
		var systemRequest = $.ajax({
			url: "getNetworkInfo.php",
			type: 'POST',
			dataType: 'json'
		});
		systemRequest.done(function(data) {
			$('#ipAddress').text(data['ip_address']);
			$('#macAddress').text(data['mac_address']);
		});

		// RAM
		var request = $.ajax({
			url: "getRAM.php",
			method: 'POST',
			dataType: 'json'
		});

		request.done(function(data) {
			$('#percentUsedRAMBar').css({
				'width': data + '%'
			});
			$('#percentUsedRAM').text(data);
		});

		// Uptime
		var requestUpTime = $.ajax({
			url: "getUpTime.php",
			method: 'POST',
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
			method: 'POST',
			dataType: 'json'
		});
		
		requestDiskSpaceUsage.done(function(data) {
			// var name_disk = data['name'];
			// var total_space = data['total_space'];

			// alert(name_disk);
			// alert(total_space);

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
				else if(currentDisk['percent_used'] < 95) {
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