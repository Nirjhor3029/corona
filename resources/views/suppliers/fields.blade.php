<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::number('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacity', 'Capacity:') !!}
    {!! Form::number('capacity', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {{-- {!! Form::number('user_id', null, ['class' => 'form-control']) !!} --}}

    <select name="user_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select User</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    
</div>

<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    {{-- {!! Form::number('service_type_id', null, ['class' => 'form-control']) !!} --}}
    <select name="service_type_id" id="" class="form-control">
        <option value="{{null}}" hidden>Select Service type</option>
        @foreach ($service_types as $service_type)
            <option value="{{$service_type->id}}">{{$service_type->service_name}}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('suppliers.index') }}" class="btn btn-default">Cancel</a>
</div>
