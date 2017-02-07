function ReloadDataTable() {
    // reload
    var dataTable = $('#grid-locations').DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDelete(btn) {
    // confirm
    $("#deleteRow").val(btn.value);
}

function DeleteRow(btn) {
    // delete
    var route = $("#grid-locations").data('url') + '/' + btn.value;
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function (data) {
            $("#modalQuestion").modal('toggle');
            ReloadDataTable();
            notificationSuccess(data);
        },
        error: function () {
            $("#modalQuestion").modal('toggle');
            ReloadDataTable();
            notificationError('¡No puede ser eliminado!', 'Ubicación');
        }
    });
}
