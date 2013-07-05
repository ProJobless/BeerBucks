/* Author: Kolby Sisk */

var initUpload = function(){
	$('.filebutton').change(function(e){
		$("form").submit();
	});
};

var initDatePicker = function(){
	var datePickerInput   =   $('form div:nth-of-type(2) input');

	datePickerInput.datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: "hh:mm:00 tt Z",
		timezoneList: [
			{ value: -5, label: 'Eastern'},
			{ value: -6, label: 'Central' },
			{ value: -7, label: 'Mountain' },
			{ value: -8, label: 'Pacific' }
		]
	}).keydown(function(e){
		return false;
	});
};

var initDollarSign = function(){
	var goalInput = $('form div:nth-of-type(3) input');

	goalInput.keydown(function(e){

		// Restricts the characters to only numbers.
		if (e.keyCode == 46 || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 27 || e.keyCode == 13 ||
			(e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 39)){
			return;
        }else{
            if (e.shiftKey || (e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105 )) return false;
        }

        // Appends dollar sign to the front of the number.
        goalInput.val(function(i,v){
			this.value = this.value.replace(/[^0-9\.]/g,'');
			return '$' + v.replace('$','');
		});
	});
};

var initWizardOfOz = function(){

};

var initScroller = function(){
	var cta            =   $('#cta'),
		win            =   $(window),
		ctaHeight      =   cta.height(),
		scrollAmount   =   0,
		scrollLeft     =   0
	;

	win.on('scroll', function(e){
		scrollAmount   =   $(this).scrollTop();
		scrollLeft     =   ctaHeight - scrollAmount;

		scrollAmount > 0 ? cta.height(scrollLeft) : cta.height(ctaHeight);
	});
};

var initTimeKeeper = function(){
	var days      =   $('#party .time li:nth-of-type(1) h2'),
		hours     =   $('#party .time li:nth-of-type(2) h2'),
		minutes   =   $('#party .time li:nth-of-type(3) h2'),
		seconds   =   $('#party .time li:nth-of-type(4) h2'),
		day       =   days.text() || 0,
		hor       =   hours.text() || 0,
		min       =   minutes.text() || 0,
		sec       =   seconds.text() || 0,
		reset     =   false
	;

	var countDown = function(){
		if(days.text() == '0' && hours.text() == '0' && minutes.text() == '0' && seconds.text() == '0'){
			clearInterval(timer);
		}else{

			seconds.text(--sec);

			if(sec === 0 || sec == '0') sec = 60;

			if(sec == 59) reset = true;

			if(reset && minutes.text() == '0' && hours.text() == '0'){
				hours.text('23');
				hor = 23;
				minutes.text('59');
				min = 59;
				days.text(--day);
				reset = false;
			}else if(reset && minutes.text() == '0'){
				minutes.text('59');
				min = 59;
				hours.text(--hor);
				reset = false;
			}else if(seconds.text() == '59'){
				minutes.text(--min);
				reset = false;
			}
		}
	};
	var timer = setInterval(countDown,1000);
};

var initTabs = function(){
	var tabs         =   $('#tabs>ul>a'),
		tabContent   =   $('#tabContent,#community,#people'),
		check        =   true
	;

	tabs.off('click').on('click', function(e){
		var that            =   $(this),
			url             =   that.attr('href'),
			contentHeight   =   tabContent.height()
		;

		tabs.find('li').removeClass('selected');

		tabContent.find('*').animate({opacity: 0}, 1000, function() {

			if(check){
				$.ajax({
					url: url,
					async: true,
					beforeSend: function(){
						tabContent.height(50);
						tabContent.empty();
						$(e.target).addClass('selected');
						tabContent.css('background-position', '45% 10px');
					}
				}).done(function(data){
					var newContent = $(data).find('#tabContent,#community,#people');
					tabContent.replaceWith(newContent);
					$(newContent).children().css('opacity', 0);
					$(newContent).children().animate({opacity: 1}, 600, function(){initTabs();});
				});
				check = false;
			}

		});
		return false;
	});

};