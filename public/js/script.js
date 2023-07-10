
$(document).ready(function () {
    $('#myTable').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.eliminar').click(function (event) {
        event.preventDefault();
        var userURL = $(this).attr('href');
        console.log(userURL);
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
                $.ajax({
                    url: userURL,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (response) {                        
                        Swal.fire({
                            title: 'Eliminado',
                            text: response.success,
                            icon: 'success'
                        }).then(() => {
                            // Puedes redirigir a otra página o realizar cualquier acción adicional después de eliminar el archivo
                            location.reload();
                        });
                    },
                    error: function (response) {
                        alert('Error: ' + response.statusText);
                    }
                });
            }
        });
    });

});
