
$(document).ready(function () {
    $('#myTable').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.eliminar', function (event) {
        event.preventDefault();
        var userURL = $(this).attr('href');
        Swal.fire({
            title: 'Confirmar eliminación',
            text: '¿Estás seguro de que quieres eliminar a este usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(userURL)
                    .then(function (response) {
                        Swal.fire({
                            title: 'Eliminado',
                            text: response.data.success,
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(function (error) {
                        alert('Error: ' + error.response.data.message);
                    });
            } else {
                console.log('cancelo');
            }
        });
    });

});
