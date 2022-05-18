$(document).ready(function() {
    if (typeof $('#user-table') != undefined) {
        $('#user-table').DataTable();
    }

    // $('.btn-delete').click(function() {
    //     var item = $(this).data('car');
    //     //console.log(item);
    //     Swal.fire({
    //             title: 'Are you sure?',
    //             text: "You want to delete this?",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 //console.log(item.id);

    //                 $.ajax({
    //                     url: "/cars/delete",
    //                     type: "post",
    //                     data: {
    //                         '_token': '{{ Session::token() }}',
    //                         'id': item.id
    //                     },
    //                     success: function(response) {
    //                         //console.log(response);
    //                         if (response != true) {
    //                             toastr.error('fail');
    //                         } else {
    //                             toastr.success('success');
    //                             setInterval(function() {
    //                                 location.reload();
    //                             }, 3000);
    //                         }
    //                     },
    //                     error: function(jqXHR, textStatus, errorThrown) {
    //                         console.log(textStatus, errorThrown);
    //                     }
    //                 });
    //             }
    //         })
    //         //alert('delete');
    // });


    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "You won't be able to edit this!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire(
    //             'Deleted!',
    //             'Your file has been deleted.',
    //             'success'
    //         )
    //     }
    // })
});