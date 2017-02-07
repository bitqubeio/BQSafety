/**
 * Created by edyde on 3/02/2017.
 */

function notificationSuccess(data) {
    // options
    toastr.options = {
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": 100,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 100,
        "showEasing": "swing",
        "hideEasing": "swing",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    };
    // render success
    toastr.success(data.message, data.title);
}

function notificationError(message, title) {
    // options
    toastr.options = {
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": 100,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 100,
        "showEasing": "swing",
        "hideEasing": "swing",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    };
    // render error
    toastr.error(message, title);
}
