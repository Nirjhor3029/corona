/**
 * Created by Sohel Rana on 25-Mar-20.
 */

$(document).ready( function () {
    //alert('load');
    $('#orders-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );