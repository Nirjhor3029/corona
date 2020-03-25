<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Mobile</th>
        <th>Service Type Id</th>
        <th>Supllier Id</th>
        <th>Orderstatus Id</th>
        <th>Remarks</th>
        <th>Amount</th>
        <th>Date Time</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
            <td>{{ $order->mobile }}</td>
            <td>{{ $order->serviceType->service_name }}</td>
            <td>{{ $order->supllier->name }}</td>
            <td>{{ $order->orderstatus->status_name }}</td>
            <td>{{ $order->remarks }}</td>
            <td>{{ $order->amount }}</td>
            <td>{{ $order->date_time }}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
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
