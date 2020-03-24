<!-- Status Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_name', 'Status Name:') !!}
    {!! Form::text('status_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orderstatuses.index') }}" class="btn btn-default">Cancel</a>
</div>
