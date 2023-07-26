
$(document).ready(function () {
    $('#myTable').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.eliminarrrrr').click(function (event) {
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
              console.log( userURL);
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
            }else{
                console.log('cancelo ');
            }
        });
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
