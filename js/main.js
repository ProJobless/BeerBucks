/* Author: Kolby Sisk */

var initDatePicker = function(){
	var datePickerInput = $('#details div:nth-of-type(2) input');

	datePickerInput.datetimepicker({
		timeFormat: "hh:mm tt z",
		timezoneList: [
			{ value: -300, label: 'Eastern'},
			{ value: -360, label: 'Central' },
			{ value: -420, label: 'Mountain' },
			{ value: -480, label: 'Pacific' }
		]
	}).keydown(function (evt) {
		return false;
	});
};

var initDollarSign = function(){
	var goalInput = $('#details div:nth-of-type(3) input');

	goalInput.keydown(function() {

		// Restricts the characters to only numbers.
		if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
			(event.keyCode == 65 && event.ctrlKey === true) ||
            (event.keyCode >= 35 && event.keyCode <= 39)) {
			return;
        }
        else {
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }

        // Appends dollar sign to the front of the number.
        goalInput.val(function(i,v) {
			this.value = this.value.replace(/[^0-9\.]/g,'');
			return '$' + v.replace('$','');
		});
	});
};

