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

	goalInput.keydown(function(e) {

		// Restricts the characters to only numbers.
		if (e.keyCode == 46 || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 27 || e.keyCode == 13 ||
			(e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 39)) {
			return;
        }
        else {
            if (e.shiftKey || (e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105 )) {
                e.preventDefault();
            }
        }

        // Appends dollar sign to the front of the number.
        goalInput.val(function(i,v) {
			this.value = this.value.replace(/[^0-9\.]/g,'');
			return '$' + v.replace('$','');
		});
	});
};

var initWizardOfOz = function(){

};