<!-- Name Field -->

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Type Id Field -->

<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    <select name="service_type_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select Service type</option>
        @foreach ($service_types as $service_type)
            @if (isset($order))
                <option  value="{{$service_type->id}}" {{( $order->service_type->id == $service_type->id ) ? "selected" : "" }} >{{$service_type->service_name}}</option>
            @else
                <option  value="{{$service_type->id}}"  >{{$service_type->service_name}}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Supllier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supllier_id', 'Supllier Id:') !!}

    {{-- {!! Form::number('supllier_id', null, ['class' => 'form-control']) !!} --}}

    <select name="supllier_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select Supplier</option>
        @foreach ($suppliers as $supplier)
        @if (isset($order))
            <option  value="{{$supplier->id}}" {{( $order->supplier->id == $supplier->id ) ? "selected" : "" }} >{{$supplier->name}}</option>
        @else
            <option  value="{{$supplier->id}}"  >{{$supplier->name}}</option>
        @endif
        @endforeach
    </select>
</div>

<!-- Orderstatus Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderstatus_id', 'Orderstatus Id:') !!}
    {{-- {!! Form::number('orderstatus_id', null, ['class' => 'form-control']) !!} --}}
    
    <select name="orderstatus_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select Status</option>
        @foreach ($order_statuses as $orderstatus)
        @if (isset($order))
            <option  value="{{$orderstatus->id}}" {{( $order->orderstatus->id == $orderstatus->id ) ? "selected" : "" }} >{{$orderstatus->status_name}}</option>
        @else
            <option  value="{{$orderstatus->id}}"  >{{$orderstatus->status_name}}</option>
        @endif
        @endforeach
    </select>
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Time Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('date_time', 'Date Time:') !!}
    {!! Form::text('date_time', null, ['class' => 'form-control','id'=>'date_time']) !!}
</div> --}}

@push('scripts')
    <script type="text/javascript">
        $('#date_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
</div>
