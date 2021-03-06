@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Imported Orders</h1>
        <h1 class="pull-right">
            <a class="btn btn-danger pull-left" style="margin-top: -10px;margin-right: 10px;margin-bottom: 5px" href="{{ route('datas.deleteAll') }}" onclick="return confirm('Are you sure?')">Delete All</a>

           <a class="btn btn-success pull-left" style="margin-top: -10px;margin-bottom: 5px;margin-right: 5px" href="{{ route('import_csv') }}">Import</a>
           {{-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('data.create') }}">Add New</a> --}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data.table')
                    <h1 class="pull-left"></h1>
                    <h1 class="pull-right">
                        <a class="btn btn-success pull-left" style="margin-top: -10px;margin-bottom: 5px;margin-right: 5px" href="{{ route('data_distribution') }}">
                            Confirm & Distribute
                        </a>
                    </h1>
            </div>

            
        
        </div>
        <div class="text-center">
        
        </div>

    </div>
    
@endsection

