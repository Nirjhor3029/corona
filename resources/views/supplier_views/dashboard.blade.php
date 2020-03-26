@extends('layouts.app')
@section('title',config('app.dev_com')."- Profile Settings")

@section('content')
<section class="content-header">
    <h1>
        Supplier
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($supplier, ['route' => ['supplier.update_own', $supplier->id], 'method' => 'post']) !!}
                    @include('supplier_views.suppliers.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
