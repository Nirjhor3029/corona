@extends('layouts.app')
@section('title',config('app.dev_com')."-Create Order")

@section('content')
    <section class="content-header">
        <h1>
            Order
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'orders.store']) !!}

                        @include('orders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
