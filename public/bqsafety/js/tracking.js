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

$("#formTrackingReportSheet").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formTrackingReportSheet').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            ReloadDataTable();
            resetAll(formTrackingReportSheet);
            $('#new_discussion').slideUp();
            notificationSuccess(data);
        },
        error: function (data) {
            cleanAlert(formTrackingReportSheet);
            ReloadDataTable();
            dangerAlert(data);
        }
    });
}));