<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_name', 'Service Name:') !!}
    {!! Form::text('service_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('serviceTypes.index') }}" class="btn btn-default">Cancel</a>
</div>
