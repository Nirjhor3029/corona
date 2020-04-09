/**
 * Created by Sohel Rana on 25-Mar-20.
 */

$(document).ready( function () {
    // alert('load');   
    // $('.js-example-basic-single').select2();

    $('#orders-table').DataTable({
        "order": [[ 7, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    $('#supplier_view_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    $('#suppliers_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


function enableDistricts(ev,orderId) {
    // alert(ev.value);
    $.get("orders/getSelectOption/districts/"+ev.value, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        if(status=="success"){
            document.getElementById("district"+orderId).innerHTML = data;
        }
    });
    document.getElementById("district"+orderId).disabled = false;
    document.getElementById("district"+orderId).style.display = "block";
}
function enableUpazilla(ev,orderId) {
    $.get("orders/getSelectOption/upazilla/"+ev.value, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        if(status=="success"){
            document.getElementById("upazilla"+orderId).innerHTML = data;
        }
    });
    document.getElementById("upazilla"+orderId).disabled = false;
    document.getElementById("upazilla"+orderId).style.display = "block";

}
function enableUnion(ev,orderId) {
    $.get("orders/getSelectOption/unions/"+ev.value, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        if(status=="success"){
            document.getElementById("union"+orderId).innerHTML = data;
        }
    });
    document.getElementById("union"+orderId).disabled = false;
    document.getElementById("union"+orderId).style.display = "block";

}