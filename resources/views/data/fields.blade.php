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

<!-- Service Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type', 'Service Type:') !!}
    {!! Form::text('service_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Living Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('living_area', 'Living Area:') !!}
    {!! Form::text('living_area', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_time', 'Date Time:') !!}
    {!! Form::text('date_time', null, ['class' => 'form-control','id'=>'date_time']) !!}
</div>

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
    <a href="{{ route('data.index') }}" class="btn btn-default">Cancel</a>
</div>
