<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                {{-- <th>Name</th> --}}
                <th>Mobile</th>
                <th>Service Type Id</th>
                {{-- <th>Supllier Id</th> --}}
                <th>Orderstatus Id</th>
                <th>Remarks</th>
                <th>Amount</th>
                <th>Date Time</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        {!! Form::model($order, ['route' => ['supplier.update_status', $order->id], 'method' => 'post']) !!}
        

        
            <tr>
                {{-- <td>{{ $order->name }}</td> --}}
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->serviceType->service_name }}</td>
                {{-- <td>{{ $order->supllier->name }}</td> --}}
                <td>
                    <select name="orderstatus_id" id="" onchange="checkStatus(this,'{{$order->id}}')">
                        <option value="{{null}}" hidden>Select Status</option>
                        @foreach ($order_status as $single_order_status)
                            <option value="{{$single_order_status->id}}" {{($order->orderstatus->id == $single_order_status->id )? "selected" : ""}}>
                                {{$single_order_status->status_name}}
                            </option>
                        @endforeach
                    </select>
                    {{-- {{ $order->orderstatus->status_name }} --}}
                </td>
                <td>{{ $order->remarks }}</td>
                <td>
                    <input type="number" value="{{ $order->amount }}" name="order_amount"  disabled id="order_amount{{$order->id}}">
                    {{--{{ $order->amount }}--}}
                </td>
                <td>{{ $order->date_time }}</td>
                <td>

                    <input type="submit" value="Submit" class="btn btn-success" id="btn_submit{{$order->id}}" disabled >
                </td>
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
                btn.disabled = false;
            }else if(text.toLowerCase() == "delivered"){
                order_amount.disabled = false;
                order_amount.required = true;
                btn.disabled = false;
            }
            else if(text.toLowerCase() == "pending"){
                btn.disabled = false;
            }
            else if(text.toLowerCase() == "cancelled"){
                btn.disabled = false;
            }else{
                //Can't delivered
                // alert('cant');
                btn.disabled = false;
            }
            
        } 
            
    </script>
</div>
