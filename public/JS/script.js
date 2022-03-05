$(document).ready(function(){

});

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success ms-2 inputsTxt border-rounded',
      cancelButton: 'btn btn-danger me-2 inputsTxt border-rounded'
    },
    buttonsStyling: false
});

$("#form-delete").submit(function(e){
    e.preventDefault();
    confirmation(2, this);
});

function confirmation (action, form) {

    if (action == 1) {
        swalWithBootstrapButtons.fire({
            showClass: { popup: 'animate__animated animate__fadeInDown animate__delay-0.5s' },
            hideClass: { popup: 'animate__animated animate__fadeOutUp animate__delay-0.5s' },
            title: '¿Estás seguro de actualizar el registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, actualizar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })

    } else if (action == 2) {
        
        swalWithBootstrapButtons.fire({
        showClass: { popup: 'animate__animated animate__fadeInDown animate__delay-0.5s' },
        hideClass: { popup: 'animate__animated animate__fadeOutUp animate__delay-0.5s' },
        title: '¿Estás seguro de eliminar el usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
}
