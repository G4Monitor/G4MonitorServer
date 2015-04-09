var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
			n = 0;
			$(document).keydown(function (e) {
			    if (e.keyCode === k[n++]) {
			        if (n === k.length) {
			        	$('#container').hide(500);
			            $('#RAMKonami').removeClass('large-3');
			            $('#RAMKonami').addClass('large-12');
			            $('#RAMKonami').show(500);
			            $('#RAMKonamiTitle').hide();
			            $('body').css({
							'background-image':'url(./img/daft_punk.jpeg)'
						});

						var audioElement = document.querySelector('#audioPlayer');
						audioElement.setAttribute('src', './music/get_lucky.mp3');
						audioElement.setAttribute('autoplay', 'autoplay');
						$.get();
						audioElement.addEventListener("load", function() {
							audioElement.play();
						}, true);
						$('#RAMKonamiPlay').click(function() {
							audioElement.play();
							$('#RAMKonamiPlayParent').hide();
							$('#RAMKonamiPauseParent').show();
						});
						$('#RAMKonamiPause').click(function() {
							audioElement.pause();
							$('#RAMKonamiPauseParent').hide();
							$('#RAMKonamiPlayParent').show();
						});

						setTimeout(function(){
							$('#RAMKonamiTitle').show(500);
						}, 1500);
						setTimeout(function(){
							$('#RAMKonamiReal').hide(500);
						}, 2000);

			            return !1
			        }
			    } else k = 0
			});

			function update(player) {
			    var duration = player.duration;    // Durée totale
			    var time     = player.currentTime; // Temps écoulé
			    var fraction = time / duration;
			    var percent  = Math.ceil(fraction * 100);

			    var progress = document.querySelector('#RAMKonamiProgressBar');
				
			    progress.style.width = percent + '%';
			    $('#RAMKonamiPercentPlayed').text(percent);

			    var mesureTime = '';
			    var mesureDuration = '';
			    if(time > 60) {
			    	time = time/60;
			    	mesureTime = 'm';
			    	$('#RAMKonamiTime').text(time.toFixed(2) + ' ' + mesureTime);
			    } else {
			    	mesureTime = 's';
			    	$('#RAMKonamiTime').text(time.toFixed(0) + ' ' + mesureTime);
			    }
			    if(duration > 60) {
			    	duration = duration/60;
			    	mesureDuration = 'm';
			    } else {
			    	mesureDuration = 's';
			    }
			    $('#RAMKonamiDuration').text(duration.toFixed(2) + ' ' + mesureDuration);
			}