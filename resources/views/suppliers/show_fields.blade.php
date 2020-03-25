<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $supplier->name }}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{{ $supplier->priority }}</p>
</div>

<!-- Capacity Field -->
<div class="form-group">
    {!! Form::label('capacity', 'Capacity:') !!}
    <p>{{ $supplier->capacity }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $supplier->user_id }}</p>
</div>

<!-- Service Type Id Field -->
<div class="form-group">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    <p>{{ $supplier->service_type_id }}</p>
</div>

