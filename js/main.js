/* Author: Kolby Sisk */

var initTools = function(){
	var tools     =   $('#tools'),
		toolBox   =   $('#toolBox'),
        element   =   $('#toolBox'),
        distance,
        mX,
		mY
	;

	function calculateDistance(elem, mouseX, mouseY){
		return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left+(elem.width()/2)), 2) + Math.pow(mouseY - (elem.offset().top+(elem.height()/2)), 2)));
	}

	if(toolBox.length){
		toolBox.on('click', function(e){
			$(this).height($(this).height() == 210 ? 0 : 210);
		});
		$(document).mousemove(function(e) {
			mX = e.pageX;
			mY = e.pageY;
			if(calculateDistance(element, mX, mY) > 200) toolBox.height(0);
		}).on('scroll', function(e){
			toolBox.height(0);
			if($(window).scrollTop() > 1000){
				//if(!$('#toTop').length) $('#tabContent').after('<div id="toTop"><h1>Back to top</h1></div>');
			}
		});
	}
};

var initSuccessError = function(){
	var message = $('.success, .error, .message');

	function hideMessage(){
		message.animate({height:0},500,function(){
			message.animate({opacity:0},100,function(){
				message.remove();
			});
		});
	}

	message.on('click', function(e){
		hideMessage();
	});

	setTimeout(hideMessage, 3000);
};

var initUpload = function(){
	$('.filebutton').change(function(e){
		$("form").submit();
	});
};

var initDatePicker = function(){
	var datePickerInput   =   $('.end, .startTime');

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

	function countDown(){
		if(days.text() == '0' && hours.text() == '0' && minutes.text() == '0' && seconds.text() == '0'){
			clearInterval(timer);
		}else{

			if(sec === 0 || sec == '0') sec = 60;

			seconds.text(--sec);

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
	}

	var timer = setInterval(countDown,1000);
};

var initTabs = function(type){
	var currentURL         =   window.location.pathname.split('/'),
		currentParameter   =   type ? currentURL[currentURL.length -3] + '/' + currentURL[currentURL.length -2] + '/' + currentURL.pop() : currentURL.pop()
	;

	window.onpopstate = function(event) {
		if(event.state){

			var newParameter   =   event.state.title,
				url            =   type ? base + 'index.php/' + newParameter : base + 'index.php/' + currentURL[currentURL.length -1] + '/' + newParameter,
				ele            =   type ? newParameter.split('/')[1].substr(0,1).toUpperCase() + newParameter.split('/')[1].substr(1) : newParameter.substr(0,1).toUpperCase() + newParameter.substr(1)
			;

			changePage(url, ele);
		}
	};

	if(currentURL.length == 6) currentParameter = currentURL[currentURL.length-3] +'/'+ currentParameter;

	if(window.history.state === null) type ? history.replaceState({title:currentParameter}, currentParameter, base + "index.php/" + currentParameter) : history.replaceState({title:currentParameter}, currentParameter, currentParameter);

	function runInits(type){
		var location = window.location.pathname.split('/');
		var locationPop = location.pop();

		initTabs(type);
		if(location[location.length-1] == 'comments' || locationPop == 'comments') initComments(type);
		initPagination(type);
	}

	function changePage(url, ele){
		var splitURL = url.split('/');
		var newURL = type ? splitURL[splitURL.length-3] + '/' + splitURL[splitURL.length-2] + '/' + splitURL[splitURL.length-1] : splitURL.pop();

		$.ajax({
			url: url,
			async: true,
			beforeSend: function(){
				if(window.history.state.title != newURL) history.pushState({title:newURL}, newURL, type ? base + "index.php/" + newURL : newURL);
				tabContent.height(50);
				tabContent.empty();
				tabs.find('h1').removeClass('selected');
				tabs.find('h1:contains('+ele.replace( /([a-z])([A-Z])/g, "$1 $2")+')').attr('class', 'selected');
				tabContent.css('background-position', '45% 50%');
			}
		}).done(function(data){
			var newContent   =   $(data).find('#tabContent,#community,#people'),
				total        =   $(newContent).children().length
			;

			tabContent.replaceWith(newContent);
			$(newContent).children().css('opacity', 0).animate({opacity: 1},{ duration: 600,
				complete: function(){
					if (--total === 0) runInits(type);
				}
			});
		});
	}

	var tabs         =   $('#tabs>nav>a'),
		tabContent   =   $('#tabContent, #community, #people')
	;

	tabs.off('click').on('click', function(e){
		var that            =   $(this),
			url             =   that.attr('href'),
			contentHeight   =   tabContent.height(),
			total           =   tabContent.find('*').length
		;

		tabContent.find('*').animate({opacity: 0}, {duration: 500, complete: function(){
			if (--total === 0) changePage(url, that.text());
		}});
		return false;
	});
};

var initSettings = function(){
	var tabs         =   $('#settingsNav a'),
		tabContent   =   $('#settingsForms'),
		check        =   true
	;

	tabs.off('click').on('click', function(e){
		var that            =   $(this),
			url             =   that.attr('href'),
			contentHeight   =   tabContent.height()
		;

		tabContent.find('*').animate({opacity: 0}, 500, function() {

			if(check){
				$.ajax({
					url: url,
					async: true,
					beforeSend: function(){
						tabContent.height(contentHeight);
						tabContent.empty();
						tabs.removeClass('selected');
						$(e.target).addClass('selected');
						tabContent.css('background-position', '45% 10px');
					}
				}).done(function(data){
					var newContent = $(data).find('#settingsForms');
					tabContent.replaceWith(newContent);

					if(newContent.find("input[name='start']").length > 0){
						initDatePicker();
						initDollarSign();
					}

					$(newContent).children().css('opacity', 0).animate({opacity: 1}, 800, function(){initSettings();});
				});
				check = false;
			}
		});
		return false;
	});
	initAutoComplete();
};

var initComments = function(type){
	var deleteButton   =   $('.delete'),
		form           =   $('form'),
		textarea       =   $('textarea')
	;

	//Delete Comment
	deleteButton.off('click').on('click', function(e){
		var commentID   =   type ? $(this).attr('href').split('/')[$(this).attr('href').split('/').length - 2] : $(this).attr('href').split('/').pop(),
			comment     =   $(this).closest('article'),
			url         =   base + 'index.php/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-type ? 3 : 3] + '/ajaxDeleteComment'
		;

		$.ajax({
			url: url,
			type: "post",
			async: false,
			dataType: "json",
			data: {commentID: commentID}
		}).done(function(response){
			if(response)comment.fadeOut();
		});
		return false;
	});

	//Add Comment
	form.off('submit').on('submit', function(e){
		var comment   =   textarea.val(),
			url       =   base + 'index.php/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-type ? 3 : 3] + '/ajaxComment',
			user2ID   =   type ? window.location.pathname.split('/').pop() : 0
		;

		$.ajax({
			url: url,
			type: "post",
			async: false,
			dataType: "json",
			data: {
				comment: comment,
				user2ID: user2ID
			}
		}).done(function(response){
			if(response){
				var path = type ? base + 'index.php/' + window.history.state['title'] : base + 'index.php/profile/' + window.history.state['title'];

				textarea.val('');

				$.ajax({
					url: path,
					async: true
				}).done(function(data){

					var newPost   =   $(data).find('#tabContent article:nth-of-type(2)'),
						oldPost   =   $('#tabContent article:nth-of-type(2)')
					;

					if(oldPost.length === 0){
						$('#tabContent article:first-of-type').after(newPost);
						newPost.css('opacity', 0).animate({opacity: 1},{ duration: 800});
						initComments(type);
					}

					oldPost.animate({marginTop: 71},{ duration: 500,
						complete: function(){
							oldPost.css({marginTop: 13});
							$('#tabContent article:first-of-type').after(newPost);
							newPost.css('opacity', 0).animate({opacity: 1},{ duration: 800});
							initComments(type);
						}
					});
				});
			}
		});
		return false;
	});

	//Character Count
	textarea.on('keyup', function(e){
		var charCount = $('.char');

		charCount.text(400 - $(this).val().length);

		400 - $(this).val().length < 0 ? charCount.css('color', '#f2137b') : charCount.css('color', '#666666');
	});
};

var initPagination = function(type){

	$('.pagination').replaceWith('<div class="ajax"><button class="ajaxButton">See More</button></div>');

	var ajaxButton   =   $('.ajaxButton'),
		count        =   8,
		win          =   $(window),
		check        =   true
	;

	if(window.location.pathname.split('/')[window.location.pathname.split('/').length-1] == 'friends' || window.location.pathname.split('/')[window.location.pathname.split('/').length-1] == 'parties'){
		count = 6;
	}else if(window.location.pathname.split('/')[window.location.pathname.split('/').length-2] == 'friends' || window.location.pathname.split('/')[window.location.pathname.split('/').length-2] == 'parties'){
		count = 6;
	}

	function isInView(elem){
		var docViewTop      =   $(window).scrollTop(),
			docViewBottom   =   docViewTop + $(window).height(),
			elemTop         =   $(elem).offset().top,
			elemBottom      =   elemTop + $(elem).height()
		;

		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	}

	function loadMore(){
		var url = base + 'index.php/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-2] + '/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-1] + '/' + count;

		if(type) url = base + 'index.php/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-3] + '/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-2] + '/' + window.location.pathname.split('/')[window.location.pathname.split('/').length-1] + '/' + count;

		ajaxButton.addClass('loading');
		$.ajax({
			url: url,
			async: true
		}).done(function(data){

			var newContent = $(data).find('#tabContent .party, #people>a, .activity article, .friends>a, .comment');

			if(newContent.length){
				$('.ajax').before(newContent);
				newContent.css('opacity', 0);
				count += count;
				newContent.animate({opacity: 1}, 800, function(){
					check = true;
					ajaxButton.removeClass('loading');
				});
			}else{
				ajaxButton.remove();
			}
		});
	}

	ajaxButton.off('click').on('click', function(e){
		loadMore();
	});

	win.on('scroll', function(e){
		if(isInView(ajaxButton) && check){
			check = false;
			loadMore();
		}
	});
};

var initAutoComplete = function(){
	var location = $('input[name="partyLocation"], input[name="location"]');

	function log(message){
		message = message.replace(', United States', '');
		location.replaceWith('<input name="'+location.attr("name")+'" value="'+ message + '"/>');
		$('.partyLocation').text(message);
		initAutoComplete();
    }

	location.autocomplete({
		source: function( request, response ) {
			var that = $(this);

			$(this).addClass('loading');
			$.ajax({
				url: "http://ws.geonames.org/searchJSON",
				dataType: "jsonp",
				data: {
					country: 'US',
					featureClass: "P",
					style: "full",
					maxRows: 6,
					name_startsWith: request.term
				},
				success: function( data ) {
					response($.map(data.geonames, function(item){
						return {
							label: item.name + (item.adminName1 ? ", " + item.adminName1 : ""),
							value: item.name,
							lat: item.lat,
							lng: item.lng
						};
					}));
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			log(ui.item.label);
			$('.lat').val(ui.item.lat);
			$('.lng').val(ui.item.lng);
		},
		open: function() {
			$(this).removeClass('closed').addClass('opened');
		},
		close: function() {
			$(this).removeClass('opened').addClass('closed');
		}
	});
	if(location.length){
		$('.start form').on('submit', function(e){
			if($('.lat').val().length < 1 && $('.lng').val().length < 1){
				$('#cta').after('<p class="error sizer">Where is your party happening? Use autocomplete please.</p>');
				$("html, body").animate({ scrollTop: $('#cta')[0].scrollHeight}, 500);
				initSuccessError();
				return false;
			}
		});
	}
};

var initWizardOfOz = function(){
	var inputs     =   $('input, textarea'),
		preview    =   $('.party')
	;

	initAutoComplete();

	function updatePreview(where, what){
		preview.find('.'+where).text(what);
	}

	inputs.on('keyup', function(e){
		var that   =   $(this),
			val    =   that.val(),
			name   =   that.attr('name')
		;

		updatePreview(name, val);
	}).on('keypress', function(e){if(e.which == 13) return false;});
};