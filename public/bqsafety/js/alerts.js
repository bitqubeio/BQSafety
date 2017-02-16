// show errors
function dangerAlert(msg) {
    var errorText = '';
    var errors = msg.responseJSON;
    if (errors) {
        $.each(errors, function (i) {
            errorText = errors[i];
            $('#field_' + i).addClass('has-danger');
            $('#field_' + i + ' .form-control-feedback').html(errorText);
        });
    }
}

// clear errors
function cleanAlert(oForm) {
    for (var i = 1; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        if (field) {
            //console.log(field);
            $('#field_' + field).removeClass('has-danger');
            $('#field_' + field + ' .form-control-feedback').html('');
        }
    }
}

// reset form
function resetAll(oForm) {
    var frm = oForm.getAttribute('id');
    $('#' + frm)[0].reset();
    for (var i = 1; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        if (field) {
            //console.log(field);
            $('#field_' + field).removeClass('has-danger');
            $('#field_' + field + ' .form-control-feedback').html('');
        }
    }
}
