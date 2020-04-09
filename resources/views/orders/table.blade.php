
<div class="table-responsive">

    <table class="table table_top" id="orders-table">
        <thead>
            <tr>
                {{-- <th>Name</th> --}}
                <th>Mobile</th>
                <th>Service Type </th>
                <th>supplier</th>
                <th>Status </th>
                <th>Remarks</th>
                <th>Area</th>
                <th>Amount</th>
                <th>Update Time</th>
                <th >Action</th>
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
        
            <tr>
                {{-- <td>{{ $order->name }}</td> --}}
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->service_type->service_name }}</td>
                <td>{{ $order->supplier['name'] }}</td>
                {{-- <td>{{ $order->supplier->name }}</td> --}}
                <td class="{{$class_name}}">{{ $order->orderstatus->status_name }}</td>
                <td>{{ $order->remarks }}</td>
                <td>
                    {{ ($order->division != null)? $order->division->name : "" }}
                    <br>
                    {{ ($order->district != null)? $order->district->name : "" }}
                    <br>
                    {{ ($order->upazilla != null)? $order->upazilla->name : "" }}
                    <br>
                    {{ ($order->union != null)? $order->union->name : "" }}
                    
                </td>
                <td>{{ $order->amount }}</td>
                <td>{{ date_format($order->updated_at,"M d, Y::h:i:s")}}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
