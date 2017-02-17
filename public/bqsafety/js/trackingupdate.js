function ReloadDataTable() {
    // reload
    var dataTable = $('#grid-reportsheets').DataTable();
    dataTable.ajax.reload(null, false);
}

function showWindowControl(btn) {
    // report sheet value
    $('#new_discussion').slideDown();
    $('#reportsheet_id').val(btn.value);
    $('#tracking_report_sheet_responsible').focus();
}

function view(option) {
    if (option == 1 || option == 2) {
        $('#field_tracking_report_sheet_image').hide();
    }
    if (option == 3) {
        $('#field_tracking_report_sheet_image').show();
    }
}

function showTrackingInModal(btn) {
    console.log('mostrar datos');
    $('#new_discussion').slideDown();
    var route = $('#formTrackingReportSheet').data('url') + '/' + btn.value + "/edit";
    $.get(route, function (res) {
        $("#idTracking").val(res.id);
        $("#reportsheet_id").val(res.reportsheet_id);
        $("#tracking_report_sheet_responsible").val(res.tracking_report_sheet_responsible);
        $("#tracking_report_sheet_status").val(res.tracking_report_sheet_status);

        if (res.tracking_report_sheet_status == 3) {
            $('#field_tracking_report_sheet_image').show();
        }

        var date1 = formatDate(res.tracking_report_sheet_start_date);
        var date2 = formatDate(res.tracking_report_sheet_end_date);

        $('#tracking_report_sheet_start_date').datepicker('update', date1);
        $('#tracking_report_sheet_end_date').datepicker('update', date2);
        $("#tracking_report_sheet_description").val(res.tracking_report_sheet_description);
    });
}

function formatDate(input) {
    var datePart = input.match(/\d+/g),
        //year = datePart[0].substring(0), // get only two digits
        year = datePart[0],
        month = datePart[1],
        day = datePart[2];

    return day + '/' + month + '/' + year;
}

$("#formTrackingReportSheet").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formTrackingReportSheet').data('url') + '/' + $('#idTracking').val();

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            console.log('actualizado');
            ReloadDataTable();
            resetAll(formTrackingReportSheet);
            $('#new_discussion').slideUp();
            notificationSuccess(data);
        },
        error: function (data) {
            console.log('error de actualizacion');
            cleanAlert(formTrackingReportSheet);
            ReloadDataTable();
            dangerAlert(data);
        }
    });
}));