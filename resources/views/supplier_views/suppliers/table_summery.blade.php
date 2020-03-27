<div class="table-responsive">
    <table class="table" id="supplier_view_table">
        <thead>
            <tr>
                {{-- <th>Name</th> --}}
                <th>Mobile</th>
                <th>Service Type</th>
                {{-- <th>Supllier Id</th> --}}
                <th>Status</th>
                <th>Remarks</th>
                <th>Amount</th>
                <th>Update Time</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <?php
            $class_name = "";
            if(strtolower($order->orderstatus->status_name) == "pending" )
            {
                $class_name = "pending";
            }elseif (strtolower($order->orderstatus->status_name) == "processing" ) {
                $class_name = "processing";
            }
            elseif (strtolower($order->orderstatus->status_name) == "delivered" ) {
                $class_name = "delivered";
            }elseif (strtolower($order->orderstatus->status_name) == "cancelled" ) {
                $class_name = "Cancelled";
            }else {
                $class_name = "cannot_delivered";
            }
        ?>
        {!! Form::open(['route' => ['supplier.update_status', $order->id], 'method' => 'post']) !!}
            <tr>
                {{-- <td>{{ $order->name }}</td> --}}
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->service_type->service_name }}</td>
                {{-- <td>{{ $order->supllier->name }}</td> --}}
                <td class="{{$class_name}}">
                    {{-- <select class="{{$class_name}}" name="orderstatus_id" id="" onchange="checkStatus(this,'{{$order->id}}')">
                        <option value="{{null}}" hidden>Select Status</option>
                        @foreach ($order_status as $single_order_status)
                            <option value="{{$single_order_status->id}}" {{($order->orderstatus->id == $single_order_status->id )? "selected" : ""}}>
                                {{$single_order_status->status_name}}
                            </option>
                        @endforeach
                    </select> --}}
                    {{ $order->orderstatus->status_name }}
                </td>
                <td>
                    {{-- <input type="text" value="{{ $order->remarks }}" name="order_remarks"  > --}}

                    {{ $order->remarks }}
                </td>
                <td>
                    {{-- <input type="number" value="{{ $order->amount }}" name="order_amount"  disabled id="order_amount{{$order->id}}"> --}}
                    {{ $order->amount }}
                </td>
                <td>{{date_format($order->updated_at,"M d, Y")  }}</td>
                
            </tr>
            {!! Form::close() !!}
        @endforeach
        </tbody>
    </table>

    <script>
        function checkStatus(ev,orderId) {

            let btn = document.getElementById("btn_submit"+orderId);
            let order_amount = document.getElementById("order_amount"+orderId);

            let value = ev.value;
            let text = ev.options[ev.selectedIndex].text;
            console.log(text.toLowerCase());
            
            if(text.toLowerCase() == "processing"){
                order_amount.disabled = true;
                order_amount.required = false;
                btn.disabled = false;
            }else if(text.toLowerCase() == "delivered"){
                order_amount.disabled = false;
                order_amount.required = true;
                btn.disabled = false;
            }
            else if(text.toLowerCase() == "pending"){
                order_amount.disabled = true;
                order_amount.required = false;
                btn.disabled = false;
            }
            else if(text.toLowerCase() == "cancelled"){
                order_amount.disabled = true;
                order_amount.required = false;
                btn.disabled = false;
            }else{
                //Can't delivered
                // alert('cant');
                order_amount.disabled = true;
                order_amount.required = false;
                btn.disabled = false;
            }
            
        } 
            
    </script>
</div>
