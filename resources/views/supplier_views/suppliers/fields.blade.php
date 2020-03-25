<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $supplier->name, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('capacity', 'Capacity:') !!}
    {!! Form::number('capacity', $supplier->capacity, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    {{-- {!! Form::number('service_type_id', null, ['class' => 'form-control']) !!} --}}
    <select name="service_type_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select Service type</option>
        @foreach ($service_types as $service_type)
            <option value="{{$service_type->id}}" {{($supplier->service_type_id==$service_type->id)? "selected" : ""}}>{{$service_type->service_name}}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    
</div>
