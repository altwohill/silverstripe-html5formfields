$(document).ready(function () {
	
	$(".birthdate").dateinput({

		// this is displayed to the user
		format: 'dd/mm/yyyy',
		selectors: true,
		editable: true,
		yearRange: [-120, 1],
		change: function() {
				var isoDate = this.getValue('yyyy-mm-dd');

				$("#backendValue").val(isoDate);
			}
	});
	
	//Updating language
	$.tools.validator.localize("en", {
		':email'  		: 'This doesn\'t look like an email address',
		'[required]' 	: 'We need you to fill this in'
	});
	
	//Function for checking if the values are the same as
	$.tools.validator.fn("[data-same-as]", function(el, value) {
		return $('#' + $(el.context).attr("data-same-as")).val() == value ? true: 'Whoops! Your passwords don\'t match.<br />Please retype them'; 
	});
	
	$.tools.validator.fn("[data-unique]", function(el, value){
		$.getJSON(location.pathname + '/check-valid?' + el.context.name + '=' + value, function(json) {
			if (json !== true)  {
				var form = $(el.context.form);
				form.data("validator").invalidate(json);
			}
		});
		return true;
	});
	
	$.tools.validator.fn(".date", function (el, value) {
		//accept in dd/mm/yyyy
		
		var nzdate = new RegExp(/^(([0-2]?\d)|(3[0-1]))\/((0?\d)|(1[0-2]))\/\d{4}$/);
		if (nzdate.test(value)) {
			var dateApi = $(el).data("dateinput");

			if (dateApi) {
				var parts = value.split('/');
				date = new Date(parts[2], (parts[1] - 1), parts[0]);
			
				dateApi.setValue(date);
			}
			return true;
		} else {
			return "This date doesn't look right. <br />Please specify as dd/mm/yyyy";
		}
	});
	
	$('form').validator({ 
		position: 'bottom center', 
		singleError: true,
		inputEvent: 'blur',
		onBeforeFail: function(e, els) {
			//Stops multiple errors from showing on blur. works by comparing error positions
			if (els.data("msg.el")) {
				$('div.error').each(function(i) {
					if ($(this).css('top') != $(els.data("msg.el")).css('top')) {
						$(this).fadeOut('fast');
					}
					
				});
			} else {
				$('div.error').fadeOut('fast');
			}
		}
	 });

	$('input.cancel').click(function(e) {
		//This is a bit hacky, but allows the user to skip validation if they click cancel button
		form = $(this).closest('form');
		form.data('validator').reset().destroy();
		
		action = $(this).attr("name");
		$(form).append("<input class='hidden' name='" + action + "' value='" + action + "'>");
		
		form.submit();
	});
	


});
