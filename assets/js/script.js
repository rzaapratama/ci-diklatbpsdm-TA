$(document).ready(function () {
	$('#form-checkbox').click(function () {
		if ($('#password').attr('type') == 'text') {
			$('#password').attr('type', 'password');
		} else {
			$('#password').attr('type', 'text');
		}
	});
});
