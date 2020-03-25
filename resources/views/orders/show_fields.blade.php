<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $order->name }}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $order->mobile }}</p>
</div>

<!-- Service Type Id Field -->
<div class="form-group">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    <p>{{ $order->service_type_id }}</p>
</div>

<!-- Supllier Id Field -->
<div class="form-group">
    {!! Form::label('supllier_id', 'Supllier Id:') !!}
    <p>{{ $order->supllier_id }}</p>
</div>

<!-- Orderstatus Id Field -->
<div class="form-group">
    {!! Form::label('orderstatus_id', 'Orderstatus Id:') !!}
    <p>{{ $order->orderstatus_id }}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $order->remarks }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $order->amount }}</p>
</div>

<!-- Date Time Field -->
<div class="form-group">
    {!! Form::label('date_time', 'Date Time:') !!}
    <p>{{ $order->date_time }}</p>
</div>

