import toastr from 'toastr';
window.$(document).ready(function () {
    toastr.options = {
    "positionClass": "toast-bottom-right",
    "progressBar": true
    };
    window.addEventListener('data-added', function (event) {
        toastr.success(event.detail.message, 'Validation');
        $('#formPatientPrive').modal('hide');
        $('#formPatientAbonne').modal('hide');
        $('#formPatientPersonnel').modal('hide');
        $('#formAbonnemnt').modal('hide');
        $('#formService').modal('hide');
        $('#formType').modal('hide');
        $('#formCommune').modal('hide');
        $('#formTarification').modal('hide');
    });
    window.addEventListener('data-updated', function (event) {
        toastr.info(event.detail.message, 'Validation');
        $('#formPatientPrive').modal('hide');
        $('#formEditFicheNumber').modal('hide');
        $('#formPatientAbonne').modal('hide');
        $('#formPatientPersonnel').modal('hide');
        $('#formAbonnemnt').modal('hide');
        $('#formService').modal('hide');
        $('#formType').modal('hide');
        $('#formCommune').modal('hide');
        $('#formTarification').modal('hide');
    });
    window.addEventListener('data-deleted', function (event) {
        toastr.error(event.detail.message, 'Alert !');
    });


});

$("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

