<div class="modal fade malert" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="modalQuestion" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Eliminar</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <table style="width:100%" align="center">
                    <tbody>
                    <tr>
                        <td class="text-right">
                            <small><i class="fa fa-exclamation-circle fa-3x" aria-hidden="true"></i></small>
                        </td>
                        <td class="align-middle">
                            ¿Está seguro de eliminar el registro?<br>Esta acción no se puede deshacer.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-create" id="deleteRow" value="" onclick="DeleteRow(this); return false;">Si</button>
                <button type="button" class="btn" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>