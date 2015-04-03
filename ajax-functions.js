$(document).ready(function() {
	var premierChargement = true;

	function loadData()
	{
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
			url: "getNumberDisks.php",
			//url: "getDiskSpaceUsage.php",
			method: 'POST',
			dataType: 'json'
		});
		
		requestDiskSpaceUsage.done(function(data) {
			var line = "<tr>";
			// alert(data);
			for(var value in data) {
				//alert("value : " + value);
			}
			list = "<ul><li>coucou</li><li>Bouh</li></ul>";
			$('#listDisk').html(list);
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